<?php

require_once __DIR__ . '/../dao/WomensDao.class.php';

class WomenService {
	private $womenDao; 

	public function __construct() {
		$this->womenDao = new WomenDao();
	}

	
	public function get_all_women_shoes(){
		return $this->womenDao->get_all_women_shoes();
	}
    public function get_womenshoes_by_id($womenshoes_id) {
		return $this->womenDao->get_womenshoes_by_id($womenshoes_id);
  }
  public function add_womenshoe($women) {
	return $this->womenDao->add($women);
}
public function delete_womenshoe_by_id($womenshoe_id) {
	return $this->womenDao->delete_womenshoe_by_id($womenshoe_id);
}
}

