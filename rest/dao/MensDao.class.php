<?php

require_once __DIR__ . '/BaseDao.class.php';

class MenDao extends BaseDao {
    public function __construct() {
        parent::__construct('men_shoes');}
        public function get_all_men_shoes(){
            $query = "SELECT *
                      FROM men_shoes;";
            return $this->query($query, []);
        }
        public function get_menshoes_by_id($menshoes_id){
            return $this->query_unique("SELECT * FROM men_shoes WHERE shoe_id = :id", ["id" => $menshoes_id]);
          }
          public function add($men) {
            return $this->insert('men_shoes', $men);
          }
          public function delete_menshoe_by_id($menshoe_id) {
            $this->execute("DELETE FROM men_shoes WHERE shoe_id = :id", ["id" => $menshoe_id]);
          }
    }