<?php

require_once __DIR__ . '/../dao/UsersDao.class.php';

class UsersService {
	private $userDao; 

	public function __construct() {
		$this->userDao = new UsersDao();
	}

	
	public function get_all_users(){
		return $this->userDao->get_all_users();
	}
    public function get_user_by_id($user_id) {
		return $this->userDao->get_user_by_id($user_id);
  }
  public function add_user($user) {
	$user['password'] = password_hash($user['password'], PASSWORD_BCRYPT);
	return $this->userDao->add($user);
}
public function delete_user_by_id($user_id) {
	return $this->userDao->delete_user_by_id($user_id);
}
}

