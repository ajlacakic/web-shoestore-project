<?php

require_once __DIR__ . '/../dao/FavoritesDao.class.php';

class FavoritesService {
	private $favoritesDao; 

	public function __construct() {
		$this->favoritesDao = new FavDao();
	}

	
	public function get_all_favorites(){
		return $this->favoritesDao->get_all_favorites();
	}
    public function get_favorites_by_id($favoriteitem_id) {
		return $this->favoritesDao->get_favorites_by_id($favoriteitem_id);
  }
  public function add($favoritesitem) {
	return $this->favoritesDao->add($favoritesitem);
}
public function delete_favoriteitem_by_id($favoriteitem_id) {
	return $this->favoritesDao->delete_favoriteitem_by_id($favoriteitem_id);
}
}

