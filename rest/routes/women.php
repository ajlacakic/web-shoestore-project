<?php
require_once __DIR__ . '/../services/womenservice.class.php';
require_once __DIR__ . '/../services/userservice.class.php';

Flight::set('patient_service', new UsersService());

 /**
     * @OA\Get(
     *      path="/womenshoes/all",
     *      tags={"shoes"},
     *      summary="Get all women shoes",
     *      @OA\Response(
     *           response=200,
     *           description="Array of all women shoes in the databases"
     *      )
     * )
     */

    Flight::route('GET /womenshoes/all', function()  {
        $womenService=new WomenService();
        $womenShoes = $womenService->get_all_women_shoes();
        Flight::json($womenShoes);
    });
     /**
     * @OA\Get(
     *      path="/womenshoes/shoe",
     *      tags={"women shoes"},
     *      summary="Get womenshsoe by ID",
     *      @OA\Response(
     *           response=200,
     *           description="Get shoe by ID"
     *      ),
     *      @OA\Parameter(@OA\Schema(type="number"), in="query", name="womenshoes_id", example="1", description="shoe ID")
     * )
     */
    Flight::route('GET /womenshoes/shoe', function () {
        $body = Flight::request()->query;

        $women_service = new WomenService();
        $women = $women_service->get_womenshoes_by_id($body['womenshoes_id']);
        Flight::json($women, 200);
    });
    /**
     * @OA\Post(
     *      path="/womenshoes/add",
     *      tags={"womenshoes"},
     *      summary="Add women shoes",
     *      @OA\Response(
     *           response=200,
     *           description="Logged user"
     *      ),
     *      @OA\RequestBody(
     *          description="ID",
     *          @OA\JsonContent(
     *             required={"name", "price", "size"},
     *             @OA\Property(property="name", required=true, type="string", example="Nike Dunk low"),
     *             @OA\Property(property="price", required=true, type="string", example="94.60"),
     *             @OA\Property(property="size", required=true, type="string", example="39"),
     * @OA\Property(property="image_url1", required=false, type="string", example="images/ks66.jpg"),
     * @OA\Property(property="image_url2", required=false, type="string", example="images/ks77.jpg")
     *           )
     *      ),
     * )
     */
    Flight::route('POST /womenshoes/add', function () {
        $payload = Flight::request()->data->getData();
        
        if($payload['name'] == NULL || $payload['price'] == NULL || $payload['size'] == NULL) {
            Flight::halt(500, "Required parameters are missing!");
        }
        unset($payload['id']);
        $women_service = new WomenService();
        $women = $women_service->add_womenshoe($payload);
        Flight::json(['data' => $women, 'message' => "You have successfully added the shoe"]);
    });
    /**
     * @OA\Delete(
     *      path="/delete/{womenshoe_id}",
     *      tags={"womenshoes"},
     *      summary="Delete shoe by id",
     *      @OA\Response(
     *           response=200,
     *           description="Status message"
     *      ),
     *      @OA\Parameter(@OA\Schema(type="number"), in="path", name="womenshoe_id", example="1", description="shoe id")
     * )
     */
    Flight::route('DELETE /delete/@womenshoe_id', function ($womenshoe_id) {
        if($womenshoe_id == NULL || $womenshoe_id == '') {
            Flight::halt(500, "Required parameters are missing!");
        }

        $women_service = new WomenService();
        $women_service->delete_womenshoe_by_id($womenshoe_id);
        
        Flight::json(['data' => NULL, 'message' => "You have successfully deleted the item"]);
    });
    /**
     * @OA\Get(
     *      path="/details",
     *      tags={"userdetails"},
     *      summary="Get user by ID",
     *      @OA\Response(
     *           response=200,
     *           description="Get user by ID"
     *      ),
     *      
     * )
     */
    Flight::route('GET /details', function () {
    
        $user = Flight::get('user');
        if (!$user) {
            Flight::halt(404, 'User not found');
            return;
        }
    
        $userDetails = Flight::get('user_service')->get_user_by_id($user->id);
        if (!$userDetails) {
            Flight::halt(404, 'User details not found');
            return;
        }
    
        Flight::json($userDetails);
    });

