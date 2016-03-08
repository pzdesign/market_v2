<?php
namespace Market;

class CouponRepository extends Repository {
    
    public function __construct(\Nette\Database\Context $connection) {
	parent::__construct($connection);
	$this->tableName = "ws_coupons";
    }
    
    public function createCoupon($token, $discount, $owner = null, $expiration = 0){
	if($this->findBy(array('token' => $token))->fetch()){
	    return false;
	}
	
	$this->findAll()->insert(array('token' => $token, 'discount' => $discount, 'owner' => $owner, 'create_time' => time(), 'expiration_time' => $expiration));
	return true;
    }
    
    public function getAllCoupons(){
	return $this->findAll()->order("create_time DESC");
    }
    
    public function removeCoupon($id){
	$this->findBy(array('id' => $id))->delete();
    }
    
    public function clearCoupons(){
	$this->findAll()->delete();
    }
    
    public function editCoupon($id, $token, $discount, $owner = null, $expiration = 0){
	if($owner == NULL){
	    $this->findBy(array("id" => $id))->update(array("token" => $token, "discount" => $discount, "expiration_time" => $expiration));
	}else{
	    $this->findBy(array("id" => $id))->update(array("token" => $token, "discount" => $discount, "owner" => $owner, "expiration_time" => $expiration));
	}
    }
    public function getCoupon($id){
	return $this->findBy(array('id' => $id));
    }
}
