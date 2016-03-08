<?php

namespace Market;

class ItemsRepository extends Repository {
    
    public function __construct(\Nette\Database\Context $connection) {
	parent::__construct($connection);
	$this->tableName = "ws_items";
    }

    public function getItemsForServer($server, $limit, $offset) {
        return $this->findBy(array('server' => $server, 'visible' => '1'))->limit($limit, $offset);
    }
    
    public function getItemCount($server){
	return $this->findBy(array('server' => $server, 'visible' => '1'))->count();
    }
    
    public function  getItemName($id){
	return $this->findBy(array('id' => $id))->fetch()['item_name_en'];
    }
    
    public function setVisible($id, $visible){
	$this->findBy(array("id" => $id))->update(array("visible" => $visible));
    }
    
    public function getAllItems($server, $limit, $offset) {
        return $this->findBy(array('server' => $server))->limit($limit, $offset);
    }
    
    public function removeItem($id){
	$this->findBy(array('id' => $id))->delete();
    }
    
    public function editItem($id, $item_name_cs, $item_name_en, $item_id, $item_data, $image, $price, $price_discount){
	$this->findBy(array('id' => $id))->update(array("item_name_cs" => $item_name_cs, 'item_name_en' => $item_name_en, 'item_id' => $item_id, 'item_data' => $item_data, 'image' => $image, 'price' => $price, 'price_discount' => $price_discount));
    }
    
    public function addItem($item_name_cs, $item_name_en, $item_id, $item_data, $image, $price, $price_discount){
	$this->findAll()->insert(array("item_name_cs" => $item_name_cs, 'item_name_en' => $item_name_en, 'item_id' => $item_id, 'item_data' => $item_data, 'image' => $image, 'price' => $price, 'price_discount' => $price_discount));
    }
}