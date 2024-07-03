<?php

require_once __DIR__ . '/BaseDao.class.php';

class KidsDao extends BaseDao {
    public function __construct() {
        parent::__construct('kids_shoes');}
        public function get_all_kids_shoes(){
            $query = "SELECT *
                      FROM kids_shoes;";
            return $this->query($query, []);
        }
        public function get_kidshoes_by_id($kidshoes_id){
            return $this->query_unique("SELECT * FROM kids_shoes WHERE shoe_id = :id", ["id" => $kidshoes_id]);
          }
          public function add($kids) {
            return $this->insert('kids_shoes', $kids);
          }
          public function delete_kidsshoe_by_id($kidsshoe_id) {
            $this->execute("DELETE FROM kids_shoes WHERE shoe_id = :id", ["id" => $kidsshoe_id]);
          }
    }