<?php

require_once __DIR__ . '/../dao/CartDao.class.php';

class CartService {
	private $cartDao; 

	public function __construct() {
		$this->cartDao = new CartDao();
	}

	
	public function get_all_cart_items(){
		return $this->cartDao->get_all_cart_items();
	}
    public function get_cartitem_by_id($cartitem_id) {
		return $this->cartDao->get_cartitem_by_id($cartitem_id);
  }
  public function add($cartitem) {
	return $this->cartDao->add($cartitem);
}
public function delete_cartitem_by_id($cartitem_id) {
	return $this->cartDao->delete_cartitem_by_id($cartitem_id);
}
}

