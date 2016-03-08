<?php

use Nette\Application\UI;


/**
 * Sign in/out presenters.
 */
class SignPresenter extends BasePresenter
{
	public function startup() {
	    switch($this->getView()){
		case "in":
		    if($this->getUser()->isLoggedIn()){
			$this->flashMessage("Již jsi přihlášen.", 'warning');
			$this->redirect("Homepage:");
		    }
		    break;
		case "out":
		    if(!$this->getUser()->isLoggedIn()){
			$this->flashMessage("Nejsi přihlášen.", 'warning');
			$this->redirect("in");
		    }
		    break;
	    }
	    parent::startup();
	}

	/**
	 * Sign-in form factory.
	 * @return Nette\Application\UI\Form
	 */
	protected function createComponentSignInForm()
	{
	    $form = new UI\Form;
	    
	    $form->addText('username', "Uživatelské jméno: ")->setRequired("Musíte zadat uživatelské jméno.")->setAttribute('class', 'form-control')->setAttribute('placeholder', 'Zadejte jméno ze hry');
	    $form->addPassword('password', "Heslo: ")->setRequired("Musíte zadat heslo.")->setAttribute('class', 'form-control')->setAttribute('placeholder', 'Zadejte heslo ze hry');
	    $form->addSubmit('submit', "Přihlásit se")->setAttribute('class', 'btn btn-lg btn-primary btn-block');
	    
	    $form->onSuccess[] = $this->signInFormSucceeded;
	    return $form;
	}


	public function signInFormSucceeded(UI\Form $form)
	{
		$values = $form->getValues();
		
		$this->getUser()->setExpiration(0, true);

		try {
		    $this->getUser()->login($values->username, $values->password, $this->context->parameters['authmeHash']);
		    $this->flashMessage("Přihlášení bylo úspěšné.", 'success');
		    $this->redirect('Homepage:');

		} catch (Nette\Security\AuthenticationException $e) {
		    $form->addError("Neznámé uživatelské jméno nebo heslo.");
		}
	}


	public function actionOut()
	{
		$this->getUser()->logout();
		$this->flashMessage('Byl jsi odhlášen.', 'success');
		$this->redirect('in');
	}

}
