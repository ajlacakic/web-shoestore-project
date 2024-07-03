<?php

require_once __DIR__ . '/BaseDao.class.php';

class WomenDao extends BaseDao {
    public function __construct() {
        parent::__construct('women_shoes');}
        public function get_all_women_shoes(){
            $query = "SELECT *
                      FROM women_shoes;";
            return $this->query($query, []);
        }
        public function get_womenshoes_by_id($womenshoes_id){
            return $this->query_unique("SELECT * FROM women_shoes WHERE shoe_id = :id", ["id" => $womenshoes_id]);
          }
          public function add($women) {
            return $this->insert('women_shoes', $women);
          }
          public function delete_womenshoe_by_id($womenshoe_id) {
            $this->execute("DELETE FROM women_shoes WHERE shoe_id = :id", ["id" => $womenshoe_id]);
          }
          public function get_womenshoes_details_by_id($womenshoes_id){
            // Example of adding more detailed query
            return $this->query_unique("SELECT ws.*, wd.detail_column
                                        FROM women_shoes ws
                                        LEFT JOIN women_shoes_details wd ON ws.shoe_id = wd.shoe_id
                                        WHERE ws.shoe_id = :id", ["id" => $womenshoes_id]);
        }
    }