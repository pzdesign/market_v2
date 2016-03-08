<?php
namespace Market;

class SettingsRepository extends Repository {
    
    public function __construct(\Nette\Database\Context $connection) {
	parent::__construct($connection);
	$this->tableName = "ws_settings";
    }
    
    public function getMOTD(){
	return $this->findBy(array("option_name" => "motd"))->fetch()["option_value"];
    }
    
    public function setMOTD($motd){
	if(!$this->findBy(array("option_name" => "motd"))->fetch()){
	    $this->findAll()->insert(array("option_name" => "motd", "option_value" => $motd));
	}else{
	    $this->findBy(array("option_name" => "motd"))->update(array("option_value" => $motd));
	}
    }
}

