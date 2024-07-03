<?php

require_once __DIR__ . '/BaseDao.class.php';

class UsersDao extends BaseDao {
    public function __construct() {
        parent::__construct('users');}
        public function get_all_users(){
            $query = "SELECT *
                      FROM users;";
            return $this->query($query, []);
        }
        public function get_user_by_id($user_id){
            return $this->query_unique("SELECT * FROM users WHERE user_id = :id", ["id" => $user_id]);
          }
          public function add($users) {
            return $this->insert('users', $users);
          }
          public function delete_user_by_id($user_id) {
            $this->execute("DELETE FROM users WHERE user_id = :id", ["id" => $user_id]);
          }
    }