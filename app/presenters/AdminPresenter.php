<?php
use Nette\Application\UI;

class AdminPresenter extends BasePresenter {
    
    private $ur;
    private $cr;
    private $itemsPaginator;
    private $couponToEdit = null;
    
    public function inject(Market\UserRepository $ur, Market\CouponRepository $cr){
	$this->ur = $ur;
	$this->cr = $cr;
    }
    
    public function startup() {
	parent::startup();
	if(!$this->getUser()->isInRole("admin")){
	    $this->flashMessage("Nemáš práva administrátora.", "danger");
	    $this->redirect("Homepage:");
	}
	
    }
    
    public function actionItems($page = 1){
	$paginator = new Nette\Utils\Paginator;
	$paginator->setItemCount($this->itr->getItemCount("default"));
	$paginator->setItemsPerPage(40);
	$paginator->setPage($page);
	$length = $paginator->getLength();
	
	if($page < 1 || $page > $length){
	    $this->flashMessage("Stránka musí být mezi 1 a $length.");
	    $paginator->setPage(1);
	}
	$this->itemsPaginator = $paginator;
    }
    
    public function renderItems(){
	$this->template->items = $this->itr->getAllItems("default", $this->itemsPaginator->getLength(), $this->itemsPaginator->getOffset());
	$this->template->paginator = $this->itemsPaginator;
    }
    
    public function renderAdmins(){
	$this->template->admins = $this->ur->getAdmins();
    }
    
    public function renderCoupons(){
	$this->template->coupons = $this->cr->getAllCoupons();
	$this->template->couponToEdit = $this->couponToEdit;
    }
    
    public function renderMotd(){
	$this->template->motd = $this->sr->getMOTD();
    }
    
    protected function createComponentAddAdminForm(){
	$form = new UI\Form;
	
	$form->addText("username")->setRequired("Musíte uvést nick.")->setAttribute('class', 'form-control')->setAttribute('placeholder', 'Uživatelské jméno');
	$form->addSubmit("submit", "Přidat")->setAttribute('class', 'btn btn-primary btn-sm')->setAttribute('style', 'float: right; margin-top: 5px');
	
	$form->onSuccess[] = $this->addAdminFormSubmitted;
	return $form;
    }
    
    public function addAdminFormSubmitted(UI\Form $form){
	$username = $form->getValues()->username;
	if(empty($username)){
	    $this->flashMessage("Nick nesmí být prázdný.", "danger");
	    return;
	}
	
	$this->ur->addAdmin($username);
	
	$this->flashMessage("Uživatel byl přidán.", 'success');
	if(!$this->isAjax()){
	    $this->redirect("this");
	}
	$this->redrawControl("adminsTable");
    }
    
    public function handleRemoveAdmin($adminId){
	if(!is_numeric($adminId)){
	    $this->flashMessage("Nehrabej se, prosím, v URL. Díky", 'danger');
	    return;
	}
	
	$this->ur->removeAdmin($adminId);
	
	$this->flashMessage("Administrátor byl odstraněn.", 'success');
	if(!$this->isAjax()){
	    $this->redirect("this");
	}
	$this->redrawControl("adminsTable");
    }
    
    protected function createComponentNewCouponForm(){
	$form = new UI\Form;
	
	$form->addText("token")->setRequired("Musíte uvést token (nebo ho vygenerovat).")->setAttribute('class', 'form-control randomString jstooltip')->setAttribute('data-original-title', 'Token zadává uživatel při uplatnení slevy')->setAttribute('placeholder', 'Kód kupónu');
	$form->addText("expiration")->setType("date")->setAttribute('class', 'form-control jstooltip')->setAttribute('data-original-title', "Do kdy kupón bude platný.<br>(Neměňte pokud nechcete aby měl kupón expiraci)");
	$form->addText("discount")->setType("number")->setAttribute('class', 'form-control jstooltip')->setAttribute('placeholder', 'Sleva v procentech')->setAttribute('data-original-title', 'Uveďte v procentech hodnotu o kolik se sníží cena nákupu.')->setAttribute('min', '0')->setAttribute('max', '100');
	$form->addSubmit("submit", "Vytvořit")->setAttribute('class', 'btn btn-primary btn-sm');
	
	$form->onSuccess[] = $this->newCouponFormSubmitted;
	return $form;
    }
    
    public function newCouponFormSubmitted(UI\Form $form){
	$values = $form->getValues();
	
	if(empty($values->token)){
	    $this->flashMessage("Token nesmí být prázdný.", "danger");
	    return;
	}
	
	if(!$this->cr->createCoupon($values->token, $values->discount, null, strtotime($values->expiration))){
	    $this->flashMessage("Tento token již existuje.", "danger");
	    return;
	}
	
	$this->flashMessage("Token byl vytvořen.", "success");
	if(!$this->isAjax()){
	    $this->redirect("this");
	}
	$this->redrawControl("couponsTable");
    }
    
    public function handleRemoveCoupon($couponId){
	$this->cr->removeCoupon($couponId);
	
	$this->flashMessage("Kupón byl odstraněn.", "success");
	if(!$this->isAjax()){
	    $this->redirect("this");
	}
	$this->redrawControl("couponsTable");
    }
    
    public function handleClearCoupons(){
	$this->cr->clearCoupons();
	
	$this->flashMessage("Všechny kupóny byly odstraněny.", 'success');
	if(!$this->isAjax()){
	    $this->redirect("this");
	}
	$this->redrawControl("couponsTable");
    }
    
    protected function createComponentEditCouponForm(){	
	$form = new UI\Form;
	
	$form->addText("token")->setRequired("Musíte uvést token (nebo ho vygenerovat).");
	$form->addText("expiration")->setType("date");
	$form->addText("discount")->setType("number");
	$form->addHidden("id");
	$form->addSubmit("submit", "Editovat")->setAttribute("class", "btn btn-primary");
	
	$form->onSuccess[] = $this->editCouponFormSubmitted;
	return $form;
    }
    
    public function editCouponFormSubmitted(UI\Form $form){
	$values = $form->getValues();
	
	if(empty($values->token)){
	    $this->flashMessage("Token nesmí být prázdný.", "danger");
	    return;
	}
	
	$this->cr->editCoupon($values->id, $values->token, $values->discount, null, $values->expiration);
	
	$this->flashMessage("Kupón byl upraven.", "success");
	if(!$this->isAjax()){
	    $this->redirect("this");
	}
	$this->redrawControl("editCouponForm");
	$this->redrawControl("couponsTable");
    }
    
    protected function createComponentEditMotdForm() {
	$form = new UI\Form;
	
	$form->addTextArea("motd")->setAttribute('class', 'form-control');
	$form->addSubmit("submit")->setAttribute('class', 'btn btn-sm btn-primary')->setAttribute('style', 'margin-top: 5px; float:right');
	
	$form->onSuccess[] = $this->editMotdFormSubmitted;
	return $form;
    }
    
    public function editMotdFormSubmitted(UI\Form $form){
	$motd = $form->getValues()->motd;
	
	$this->sr->setMOTD($motd);
	
	$this->flashMessage("MOTD bylo změněno.", "success");
	if(!$this->isAjax()){
	    $this->redirect("this");
	}
	$this->redrawControl("actualMotd");
    }
    
    public function handleDisableMotd(){
	$this->sr->setMOTD(null);
	
	$this->flashMessage("MOTD bylo vypnuto.", "success");
	if(!$this->isAjax()){
	    $this->redirect("this");
	}
	$this->redrawControl("actualMotd");
    }
    
    public function handleVisible($itemId){
	if(!is_numeric($itemId)){
	    $this->flashMessage("Nehrabej se, prosím, v URL.", "danger");
	    return;
	}
	
	$this->itr->setVisible($itemId, 1);
	
	$this->flashMessage("Item s ID $itemId byl zviditelněn.", "success");
	if(!$this->isAjax()){
	    $this->redirect("this");
	}
	$this->redrawControl("itemsTable");
    }
    
    public function handleUnvisible($itemId){
	if(!is_numeric($itemId)){
	    $this->flashMessage("Nehrabej se, prosím, v URL.", "danger");
	    return;
	}
	
	$this->itr->setVisible($itemId, 0);
	
	$this->flashMessage("Item s ID $itemId byl zneviditelněn.", "success");
	if(!$this->isAjax()){
	    $this->redirect("this");
	}
	$this->redrawControl("itemsTable");
    }
    
    public function handleRemoveItem($itemId){
	if(!is_numeric($itemId)){
	    $this->flashMessage("Nehrabej se, prosím, v URL.", "danger");
	    return;
	}
	
	$this->itr->removeItem($itemId);
	
	$this->flashMessage("Item byl odstraněn.",'success');
	if(!$this->isAjax()){
	    $this->redirect("this");
	}
	$this->redrawControl("itemsTable");
    }
    
    protected function createComponentEditItemForm(){
	$form = new UI\Form;
	
	$form->addHidden("id");
	$form->addText("item_name_cs")->setRequired("Nevyplnili jste všechna políčka");
	$form->addText("item_name_en")->setRequired("Nevyplnili jste všechna políčka");
	$form->addText("item_id")->setRequired("Nevyplnili jste všechna políčka");
	$form->addText("item_data")->setRequired("Nevyplnili jste všechna políčka");
	$form->addText("image")->setRequired("Nevyplnili jste všechna políčka");
	$form->addText("price")->setType("number")->setRequired("Nevyplnili jste všechna políčka");
	$form->addText("price_discount")->setType("number")->setRequired("Nevyplnili jste všechna políčka");
	$form->addSubmit("submit", "Editovat")->setAttribute("class", "btn btn-primary");
	
	$form->onSuccess[] = $this->editItemFormSubmitted;
	return $form;
    }
    
    public function editItemFormSubmitted(UI\Form $form){
	$values = $form->getValues();
	
	$this->itr->editItem($values->id, $values->item_name_cs, $values->item_name_en, $values->item_id, $values->item_data, $values->image, $values->price, $values->price_discount);
	
	$this->flashMessage("Item s ID $values->id byl editován.", "success");
	if(!$this->isAjax()){
	    $this->redirect("this");
	}
	$this->redrawControl("itemsTable");
    }
    
    protected function createComponentNewItemForm(){
	$form = new UI\Form;
	
	$form->addText("item_name_cs")->setRequired("Nevyplnili jste všechna políčka")->setAttribute('placeholder', 'Český název')->setAttribute('class', 'form-control');
	$form->addText("item_name_en")->setRequired("Nevyplnili jste všechna políčka")->setAttribute('placeholder', 'Anglický název')->setAttribute('class', 'form-control');
	$form->addText("item_id")->setRequired("Nevyplnili jste všechna políčka")->setAttribute('placeholder', 'ID itemu / Příkaz')->setAttribute('class', 'form-control');
	$form->addText("item_data")->setRequired("Nevyplnili jste všechna políčka")->setAttribute('placeholder', 'Data itemu')->setAttribute('class', 'form-control');
	$form->addText("image")->setRequired("Nevyplnili jste všechna políčka")->setAttribute('placeholder', 'Adresa obrázku')->setAttribute('class', 'form-control');
	$form->addText("price")->setType("number")->setRequired("Nevyplnili jste všechna políčka")->setAttribute('placeholder', 'Cena')->setAttribute('class', 'form-control')->setAttribute('min', '0');
	$form->addText("price_discount")->setType("number")->setRequired("Nevyplnili jste všechna políčka")->setAttribute('placeholder', 'Sleva')->setAttribute('class', 'form-control')->setAttribute('min', '0')->setAttribute('max', '100');
	$form->addSubmit("submit", "Přidat")->setAttribute('class', 'btn btn-primary btn-sm');
	
	$form->onSuccess[] = $this->newItemFormSubmitted;
	return $form;
    }
    
    public function newItemFormSubmitted(UI\Form $form){
	$values = $form->getValues();
	
	$this->itr->addItem($values->item_name_cs, $values->item_name_en, $values->item_id, $values->item_data, $values->image, $values->price, $values->price_discount);
	
	$this->flashMessage("Item $values->item_name_en byl přidán", "success");
	
	if(!$this->isAjax()){
	    $this->redirect("this");
	}
	$this->redrawControl("itemsTable");
    }
}
