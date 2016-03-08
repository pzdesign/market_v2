<?php
namespace Market;

abstract class Repository extends \Nette\Object {
    
    protected $connection;
    protected $tableName;
    
    public function __construct(\Nette\Database\Context $connection) {
	$this->connection = $connection;
    }
    
    protected function getTable(){
	//preg_match('#(\w+)Repository$#', get_class($this), $m);
        return $this->connection->table($this->tableName);
    }
    
    public function findAll(){
	return $this->getTable();
    }
    
    public function findBy(array $by){
	return $this->getTable()->where($by);
    }
}