<?php
namespace Market;

class CartRepository extends \Market\Repository {
    
    public function __construct(\Nette\Database\Context $connection) {
	parent::__construct($connection);
	$this->tableName = "ws_cart";
    }
    
    public function getCartItems($username){
	return $this->findBy(array('owner' => $username));
    }

    public function getCountAll($username){
	return count($this->findBy(array('owner' => $username)));
    }


    public function getCartItemsForServer($username, $limit, $offset) {
        return $this->findBy(array('owner' => $username))->limit($limit, $offset);
    }
    
    public function getById($id){
	return $this->findBy(array('id' => $id));
    }

  public function getByItemId($id){
    return $this->findBy(array('item_id' => $id));
    }

    
    public function setCountOfItem($id, $count){
	$this->findBy(array('id' => $id))->update(array('count' => $count));
    }
    
    public function removeItemFromCart($itemId){
	$this->findBy(array('id' => $itemId))->delete();
    }
    
    public function clearCart($username){
	$this->findBy(array('owner' => $username))->delete();
    }
    
    public function addToCart($username, $id, $count){
	$row = $this->findBy(array('owner' => $username, 'item_id' => $id))->fetch();
	if($row){
	    $this->findBy(array('owner' => $username, 'item_id' => $id))->update(array('count' => $count + $row['count']));
	}else{
	    $this->findAll()->insert(array('owner' => $username, 'item_id' => $id, 'count' => $count));
	}
    }
    
    public function calculatePrice($username){
	$price = 0;
	foreach($this->findBy(array('owner' => $username)) as $row){
	    $price += ($row->item->price - (($row->item->price_discount / 100) * $row->item->price)) * $row->count;
	}
	return $price;
    }
}