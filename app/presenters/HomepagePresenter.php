<?php

/**
 * Homepage presenter.
 */
class HomepagePresenter extends BasePresenter
{
    private $paginator;
    
    public function actionDefault($page = 1){
	$paginator = new Nette\Utils\Paginator;
	$paginator->setItemCount($this->itr->getItemCount($this->getView()));
	$paginator->setItemsPerPage(40);
	$paginator->setPage($page);
	$length = $paginator->getLength();
	
	if($page < 1 || $page > $length){
	    $this->flashMessage("Stránka musí být mezi 1 a $length.");
	    $paginator->setPage(1);
	}
	$this->paginator = $paginator;
    }

    public function renderDefault() {	
    $this->template->items = $this->itr->getItemsForServer($this->getView(), $this->paginator->getLength(), $this->paginator->getOffset());
	$this->template->paginator = $this->paginator;
	$this->template->motd = $this->sr->getMOTD();
    }

    public function handleAddToCart($itemId, $itemCount){
	if((!is_numeric($itemCount)) || (!is_numeric($itemId))){
	    $this->flashMessage("Prosím, nehrabej se v URL. Díky ;-)", 'danger');
	    return;
	}
	if($itemCount < 1){
	    $this->flashMessage("Počet itemů musí být větší než 0!", 'danger');
	    return;
	}
	
	$this->cp->addToCart($this->getUser()->getIdentity()->username, $itemId, $itemCount);
	
	//$this->flashMessage("Item/y byl/y přidán/y do tvého košíku.","success");
	if(!$this->isAjax()){
		$this->flashMessage("Item/y byl/y přidán/y do tvého košíku.","success");
	    $this->redirect("this");
	}
	$payload = array();
	$payload["itemId"] = $itemId;
	$payload["itemName"] = $this->itr->getItemName($itemId);
	$payload["itemCount"] = $itemCount;
	
	$this->payload->buys = $payload;
	$this->redrawControl("totalCost");
    }
    
}
