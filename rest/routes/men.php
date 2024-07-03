<?php
require_once __DIR__ . '/../services/menservice.class.php';


 /**
     * @OA\Get(
     *      path="/menshoes/all",
     *      tags={"shoes"},
     *      summary="Get all men shoes",
     *      @OA\Response(
     *           response=200,
     *           description="Array of all men shoes in the databases"
     *      )
     * )
     */

    Flight::route('GET /menshoes/all', function()  {
        $menService=new MenService();
        $menShoes = $menService->get_all_men_shoes();
        Flight::json($menShoes);
    });
    /**
     * @OA\Get(
     *      path="/menshoes/shoe",
     *      tags={"men shoes"},
     *      summary="Get menshsoe by ID",
     *      @OA\Response(
     *           response=200,
     *           description="Get shoe by ID"
     *      ),
     *      @OA\Parameter(@OA\Schema(type="number"), in="query", name="menshoes_id", example="1", description="shoe ID")
     * )
     */
    Flight::route('GET /menshoes/shoe', function () {
        $body = Flight::request()->query;

        $men_service = new MenService();
        $men = $men_service->get_menshoes_by_id($body['menshoes_id']);
        Flight::json($men, 200);
    });
    /**
     * @OA\Post(
     *      path="/menshoes/add",
     *      tags={"menshoes"},
     *      summary="Add men shoes",
     *      @OA\Response(
     *           response=200,
     *           description="Logged user"
     *      ),
     *      @OA\RequestBody(
     *          description="ID",
     *          @OA\JsonContent(
     *             required={"name", "price", "size"},
     *             @OA\Property(property="name", required=true, type="string", example="NIKE AF1"),
     *             @OA\Property(property="price", required=true, type="string", example="94.60"),
     *             @OA\Property(property="size", required=true, type="string", example="30"),
     * @OA\Property(property="image_url1", required=false, type="string", example="images/ks66.jpg"),
     * @OA\Property(property="image_url2", required=false, type="string", example="images/ks77.jpg")
     *           )
     *      ),
     * )
     */
    Flight::route('POST /menshoes/add', function () {
        $payload = Flight::request()->data->getData();
        
        if($payload['name'] == NULL || $payload['price'] == NULL || $payload['size'] == NULL) {
            Flight::halt(500, "Required parameters are missing!");
        }
        unset($payload['id']);
        $men_service = new MenService();
        $men = $men_service->add_menshoe($payload);
        Flight::json(['data' => $men, 'message' => "You have successfully added the shoe"]);
    });
     /**
     * @OA\Delete(
     *      path="/delete/{menshoe_id}",
     *      tags={"menshoes"},
     *      summary="Delete shoe by id",
     *      @OA\Response(
     *           response=200,
     *           description="Status message"
     *      ),
     *      @OA\Parameter(@OA\Schema(type="number"), in="path", name="menshoe_id", example="1", description="shoe id")
     * )
     */
    Flight::route('DELETE /delete/@menshoe_id', function ($menshoe_id) {
        if($menshoe_id == NULL || $menshoe_id == '') {
            Flight::halt(500, "Required parameters are missing!");
        }

        $men_service = new MenService();
        $men_service->delete_menshoe_by_id($menshoe_id);
        
        Flight::json(['data' => NULL, 'message' => "You have successfully deleted the item"]);
    });

    

    
