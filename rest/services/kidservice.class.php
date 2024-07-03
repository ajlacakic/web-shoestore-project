<?php

require_once __DIR__ . '/../dao/KidsDao.class.php';

class KidsService {
	private $kidsDao; 

	public function __construct() {
		$this->kidsDao = new KidsDao();
	}

	
	public function get_all_kids_shoes(){
		return $this->kidsDao->get_all_kids_shoes();
	}
	public function get_kidshoes_by_id($kidshoes_id) {
		return $this->kidsDao->get_kidshoes_by_id($kidshoes_id);
  }
  public function add_kidsshoe($kids) {
	return $this->kidsDao->add($kids);
}
public function delete_kidsshoe_by_id($kidsshoe_id) {
	return $this->kidsDao->delete_kidsshoe_by_id($kidsshoe_id);
}

}

