<?php

require_once __DIR__ . '/BaseDao.class.php';

class CartDao extends BaseDao {
    public function __construct() {
        parent::__construct('cart');}
        public function get_all_cart_items(){
            $query = "SELECT *
                      FROM cart;";
            return $this->query($query, []);
        }
        public function get_cartitem_by_id($cartitem_id){
            return $this->query_unique("SELECT * FROM cart WHERE cart_id = :id", ["id" => $cartitem_id]);
          }
          public function add($cartitem) {
            return $this->insert('cart', $cartitem);
          }
          public function delete_cartitem_by_id($cartitem_id) {
            $this->execute("DELETE FROM cart WHERE cart_id = :id", ["id" => $cartitem_id]);
          }
    }