<?php

require_once __DIR__ . '/../dao/MensDao.class.php';

class MenService {
	private $menDao; 

	public function __construct() {
		$this->menDao = new MenDao();
	}

	
	public function get_all_men_shoes(){
		return $this->menDao->get_all_men_shoes();
	}
    public function get_menshoes_by_id($menshoes_id) {
		return $this->menDao->get_menshoes_by_id($menshoes_id);
  }
  public function add_menshoe($men) {
	return $this->menDao->add($men);
}
public function delete_menshoe_by_id($menshoe_id) {
	return $this->menDao->delete_menshoe_by_id($menshoe_id);
}
}

