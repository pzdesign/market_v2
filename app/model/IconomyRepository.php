<?php

namespace Market;

class IConomyRepository extends Repository {
    
    public function __construct(\Nette\Database\Context $connection) {
	parent::__construct($connection);
	$this->tableName = "iConomy";
    }
    
    public function getBalance($username){
	$row = $this->findBy(array('username' => $username))->fetch();
	return $row['balance'];
    }
}
