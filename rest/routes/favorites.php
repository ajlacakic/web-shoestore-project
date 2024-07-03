<?php
require_once __DIR__ . '/../services/favorites.class.php';


 /**
     * @OA\Get(
     *      path="/favoritesitems/all",
     *      tags={"items"},
     *      summary="Get all items",
     *      @OA\Response(
     *           response=200,
     *           description="Array of all items in the databases"
     *      )
     * )
     */

    Flight::route('GET /favoritesitems/all', function()  {
        $favoritesService=new FavoritesService();
        $favorites = $favoritesService->get_all_favorites();
        Flight::json($favorites);
    });
    /**
     * @OA\Get(
     *      path="/favoritesitems/item",
     *      tags={"favorites"},
     *      summary="Get favorites by ID",
     *      @OA\Response(
     *           response=200,
     *           description="Get favorites by ID"
     *      ),
     *      @OA\Parameter(@OA\Schema(type="number"), in="query", name="favoritesitem_id", example="1", description="item ID")
     * )
     */
    Flight::route('GET /favoritesitems/item', function () {
        $body = Flight::request()->query;

        $favorites_service = new FavoritesService();
        $favorites = $favorites_service->get_favorites_by_id($body['favoritesitem_id']);
        Flight::json($favorites, 200);
    });
    /**
     * @OA\Post(
     *      path="/favoritesitem/add",
     *      tags={"favorites"},
     *      summary="Add favorites",
     *      @OA\Response(
     *           response=200,
     *           description="Logged user"
     *      ),
     *      @OA\RequestBody(
     *          description="ID",
     *          @OA\JsonContent(
     *             required={"favorite_id", "user_id", "shoe_id"},
     *             @OA\Property(property="favorite_id", required=true, type="int", example="12"),
     *             @OA\Property(property="user_id", required=true, type="int", example="34"),
     *             @OA\Property(property="shoe_id", required=true, type="int", example="56")
     *           )
     *      ),
     * )
     */
    Flight::route('POST /favoritesitem/add', function () {
        $payload = Flight::request()->data->getData();
        
        if($payload['favorite_id'] == NULL || $payload['user_id'] == NULL || $payload['shoe_id'] == NULL) {
            Flight::halt(500, "Required parameters are missing!");
        }
        unset($payload['id']);
        $favorites_service = new FavoritesService();
        $favorites = $favorites_service->add($payload);
        Flight::json(['data' => $favorites, 'message' => "You have successfully added the shoe"]);
    });
     /**
     * @OA\Delete(
     *      path="/delete/{favoritesitem_id}",
     *      tags={"favorites"},
     *      summary="Delete item by id",
     *      @OA\Response(
     *           response=200,
     *           description="Status message"
     *      ),
     *      @OA\Parameter(@OA\Schema(type="number"), in="path", name="favoritesitem_id", example="1", description="shoe id")
     * )
     */
    Flight::route('DELETE /delete/@favoritesitem_id', function ($favoritesitem_id) {
        if($favoritesitem_id == NULL || $favoritesitem_id == '') {
            Flight::halt(500, "Required parameters are missing!");
        }

        $favorites_service = new FavoritesService();
        $favorites_service->delete_favoriteitem_by_id($favoritesitem_id);
        
        Flight::json(['data' => NULL, 'message' => "You have successfully deleted the item"]);
    });

    

    
