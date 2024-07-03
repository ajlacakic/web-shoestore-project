<?php

require_once __DIR__ . '/BaseDao.class.php';

class FavDao extends BaseDao {
    public function __construct() {
        parent::__construct('favorites');}
        public function get_all_favorites(){
            $query = "SELECT *
                      FROM favorites;";
            return $this->query($query, []);
        }
        public function get_favorites_by_id($favoritesitem_id){
            return $this->query_unique("SELECT * FROM favorites WHERE favorite_id = :id", ["id" => $favoritesitem_id]);
          }
          public function add($favoritesitem) {
            return $this->insert('favorites', $favoritesitem);
          }
          public function delete_favoriteitem_by_id($favoriteitem_id) {
            $this->execute("DELETE FROM favorite WHERE favorite_id = :id", ["id" => $favoriteitem_id]);
          }
    }