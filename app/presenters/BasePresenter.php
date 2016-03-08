<?php
use Nette\Utils\Strings;
/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
    
    protected $amr;
    protected $icr;
    protected $cp;
    protected $parametry;
    protected $sr;
    protected $itr;
    
    public function injectBase(Market\IConomyRepository $icr, Market\CartRepository $cp, Market\SettingsRepository $sr, Market\ItemsRepository $itr){
	$this->icr = $icr;
	$this->cp = $cp;
	$this->sr = $sr;
	$this->itr = $itr;
    }
    
    public function startup() {
	parent::startup();
	$this->parametry = $this->context->getParameters();
	$pName = Strings::lower($this->getName());
	if(($pName != "sign") && (!$this->getUser()->isLoggedIn())){
	    $this->flashMessage("Musíš být přihlášen.", "warning");
	    $this->redirect("Sign:in");
	}

    }
    
    public function beforeRender(){
	if($this->isAjax()){
	    $this->redrawControl("flashMessages");
	}
	
	if($this->getUser()->isLoggedIn()){
	    $this->template->balance = $this->icr->getBalance($this->getUser()->getIdentity()->username);
	    $this->template->user = $this->getUser();
	    $this->template->totalCost = $this->cp->calculatePrice($this->getUser()->getIdentity()->username);
	}
	$this->template->parametry = $this->parametry;
    }
}
