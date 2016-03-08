<?php
use Nette\Application\UI;

class CartPresenter extends BasePresenter {
    
    private $items;
    private $jsonapi;
    private $paginator;

    public function inject(\Market\JSONAPI $jsonapi){
	$this->jsonapi = $jsonapi;
    }
    
    public function startup() {
	parent::startup();
	$this->items = $this->cp->getCartItems($this->getUser()->getIdentity()->username);
    }


    
    public function actionDefault($page = 1){
	$paginator = new Nette\Utils\Paginator;
	$paginator->setItemCount($this->cp->getCountAll($this->getUser()->getIdentity()->username));
	$paginator->setItemsPerPage(10);
	$paginator->setPage($page);
	$length = $paginator->getLength();
	
	if($page < 1 || $page > $length){
	    $this->flashMessage("Stránka musí být mezi 1 a $length.");
	    $paginator->setPage(1);
	}
	$this->paginator = $paginator;
    }

    
    public function renderDefault(){
	$this->template->items = $this->items;
    $this->template->items = $this->cp->getCartItemsForServer($this->getUser()->getIdentity()->username, $this->paginator->getLength(), $this->paginator->getOffset());
	$this->template->paginator = $this->paginator;	
	$this->template->price = $this->cp->calculatePrice($this->getUser()->getIdentity()->username);
    }
    
    public function handleRemoveFromCart($itemId){
	$inDb = $this->cp->getById($itemId)->fetch();
	
	if($inDb){
	    if($inDb->owner !== $this->getUser()->getIdentity()->username){
		$this->flashMessage("Tento item nepatří vám.", "danger");
		return;
	    }
	}else{
	    $this->flashMessage("Tento item není v databázi.", "danger");
	    return;
	}
	
	$this->cp->removeItemFromCart($itemId);
	
	$this->flashMessage("Item byl odstraněn z košíku.", 'success');
	if(!$this->isAjax()){
	    $this->redirect("this");
	}
	$this->redrawControl("obsahKosiku");
    }
    
    protected function createComponentCountForm(){
	$form = new UI\Form;
	
	$form->addText("count")->setType("number")->setAttribute("style", "width:50px; display:inline; height:auto; padding:0 12px;")->setAttribute("min", "0")->setAttribute('class', 'form-control');
	$form->addHidden("itemid");
	$form->addSubmit("submit", "Změnit")->setAttribute("style", "font-size:12px; margin-left:5px")->setAttribute('class', 'btn btn-xs btn-primary');
	$form->onSuccess[] = $this->countFormSubmitted;
	return $form;
    }
    
    public function countFormSubmitted(UI\Form $form){
	$count = $form->getValues()->count;
	$id = $form->getValues()->itemid;
	
	if((!is_numeric($count)) || (!is_numeric($id))){
	    $this->flashMessage("Id a počet musí být celé číslo!", "danger");
	    return;
	}

	if($count < 0){
	    $this->flashMessage("Číslo musí být větší než 0.", "danger");
	    return;
	}
	
	$inDb = $this->cp->getById($id)->fetch();
	
	if($inDb){
	    if($inDb->owner !== $this->getUser()->getIdentity()->username){
		$this->flashMessage("Tento item nepatří vám.", "danger");
		return;
	    }
	}else{
	    $this->flashMessage("Tento item není v databázi.", "danger");
	    return;
	}
	
	if($count == 0){
	    $this->cp->removeItemFromCart($id);
	    $this->flashMessage("Item byl odstraněn z vašeho košíku.", "success");
	    if(!$this->isAjax()){
		$this->redirect("this");
	    }
	    $this->redrawControl("obsahKosiku");
	    return;
	}else{
	    $this->cp->setCountOfItem($id, $count);
	    $this->flashMessage("Počet těchto itemů byl změněn na $count", 'success');
	    
	    if(!$this->isAjax()){
		$this->redirect("this");
	    }
	    $this->redrawControl("obsahKosiku");
	    return;
	}
    }
    
    public function handleClearCart(){
	$this->cp->clearCart($this->getUser()->getIdentity()->username);
	
	$this->flashMessage("Váš košík byl vyprázdněn.", 'success');
	if(!$this->isAjax()){
	    $this->redirect("this");
	}
	$this->redrawControl("obsahKosiku");
    }
    
    public function handleOrder(){
	$username = $this->getUser()->getIdentity()->username;
	$items = $this->cp->getCartItems($username);
	
	if(!$items->fetch){
	    $this->flashMessage("Tvůj košík je prázdný.", 'danger');
	    return;
	}
	
	//var_dump($this->jsonapi->call("players.online.names"));
	$isOnline = false;
	$call = $this->jsonapi->call("players.online.names");
	foreach($call[0]["success"] as $player){
	    if(strtolower($username) == strtolower($player)){
		$isOnline = true;
		break;
	    }
	}
	
	if(!$isOnline){
	    $this->flashMessage("Nejste online na serveru.", 'danger');
	    return;
	}
	
	$balance = $this->icr->getBalance($username);
	$price = $this->cp->calculatePrice($username);
	$zustatek = $balance - $price;
	
	if($price > $balance){
	    $this->flashMessage("Nemáš dostatek financí...", "danger");
	    return;
	}
	
	$this->jsonapi->call(array("server.run_command", "players.name.send_message"), array(array("money take $username $price"), array($username, "§a[WebShop] Z tveho uctu bylo odecteno $price ".$this->parametry['mena'].". Zustatek: $zustatek ".$this->parametry['mena'])));
	
	foreach($items as $item){
        if(is_numeric($item->item->item_id)) {
	        $this->jsonapi->call("players.name.inventory.give_item", array($username, $item->item->item_id, $item->count, $item->item->item_data));
        } else {
            foreach(explode("; ", $item->item->item_id) as $cmd){
                $this->jsonapi->call("server.run_command", array(str_replace("%nick%", $username, $cmd)));
            }
        }
    }
	$this->cp->clearCart($username);
	
	$this->flashMessage("Byly ti přidány koupené věci do inventáře a odečteno $price ".$this->parametry['mena']." z tvého účtu. Zůstatek: $zustatek ".$this->parametry['mena'], 'success');
	if(!$this->isAjax()){
	    $this->redirect("this");
	}
	$this->redrawControl("obsahKosiku");
	$this->redrawControl("userInfo");
    }
}