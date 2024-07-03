<?php

require_once __DIR__ . '/BaseDao.class.php';

class AuthDao extends BaseDao {
    public function __construct() {
        parent::__construct('users');}
        public function get_user_by_email($email) {
            $query = "SELECT *
                      FROM users
                      WHERE email = :email";
            return $this->query_unique($query, ['email' => $email]);
        }
        
    }