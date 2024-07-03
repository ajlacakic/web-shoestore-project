<?php
require_once __DIR__ . '/../services/cartservice.class.php';


 /**
     * @OA\Get(
     *      path="/cartitems/all",
     *      tags={"cart"},
     *      summary="Get all cart items",
     *      @OA\Response(
     *           response=200,
     *           description="Array of all cart items in the databases"
     *      )
     * )
     */

    Flight::route('GET /cartitems/all', function()  {
        $cartService=new CartService();
        $cart = $cartService->get_all_cart_items();
        Flight::json($cart);
    });
    /**
     * @OA\Get(
     *      path="/cartitems/cart",
     *      tags={"cart"},
     *      summary="Get cart item by ID",
     *      @OA\Response(
     *           response=200,
     *           description="Get cart item by ID"
     *      ),
     *      @OA\Parameter(@OA\Schema(type="number"), in="query", name="cartitem_id", example="1", description="cart item ID")
     * )
     */
    Flight::route('GET /cartitems/cart', function () {
        $body = Flight::request()->query;

        $cart_service = new CartService();
        $cart = $cart_service->get_cartitem_by_id($body['cartitem_id']);
        Flight::json($cart, 200);
    });
    /**
     * @OA\Post(
     *      path="/cartitems/add",
     *      tags={"cartitems"},
     *      summary="Add cart items",
     *      @OA\Response(
     *           response=200,
     *           description="Logged user"
     *      ),
     *      @OA\RequestBody(
     *          description="ID",
     *          @OA\JsonContent(
     *             required={"cart_id", "user_id", "shoe_id"},
     *             @OA\Property(property="cart_id", required=true, type="int", example=12),
     *             @OA\Property(property="user_id", required=true, type="int", example=34),
     *             @OA\Property(property="shoe_id", required=true, type="int", example=56)
     *           )
     *      ),
     * )
     */
    Flight::route('POST /cartitems/add', function () {
        $payload = Flight::request()->data->getData();
        
        if($payload['cart_id'] == NULL || $payload['user_id'] == NULL || $payload['shoe_id'] == NULL) {
            Flight::halt(500, "Required parameters are missing!");
        }
        unset($payload['id']);
        $cart_service = new CartService();
        $cart = $cart_service->add($payload);
        Flight::json(['data' => $cart, 'message' => "You have successfully added the item"]);
    });
     /**
     * @OA\Delete(
     *      path="/delete/{cartitem_id}",
     *      tags={"cart"},
     *      summary="Delete item by id",
     *      @OA\Response(
     *           response=200,
     *           description="Status message"
     *      ),
     *      @OA\Parameter(@OA\Schema(type="number"), in="path", name="cartitem_id", example="1", description="item id")
     * )
     */
    Flight::route('DELETE /delete/@cartitem_id', function ($cartitem_id) {
        if($cartitem_id == NULL || $cartitem_id == '') {
            Flight::halt(500, "Required parameters are missing!");
        }

        $cart_service = new CartService();
        $cart_service->delete_cartitem_by_id($cartitem_id);
        
        Flight::json(['data' => NULL, 'message' => "You have successfully deleted the item"]);
    });

    

    
