<?php
namespace Market;

class UserRepository extends \Market\Repository {
    
    public function __construct(\Nette\Database\Context $connection) {
	parent::__construct($connection);
	$this->tableName = "ws_users";
    }
    
    public function isAdmin($username){
	return $this->findBy(array('username' => $username))->fetch() == false ? false : true;
    }
    
    public function getAdmins(){
	return $this->findAll();
    }
    
    public function addAdmin($username){
	$this->findAll()->insert(array("username" => $username, "role" => "admin"));
    }
    
    public function removeAdmin($id){
	$this->findBy(array('id' => $id))->delete();
    }
}