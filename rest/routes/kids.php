<?php
require_once __DIR__ . '/../services/kidservice.class.php';


 /**
     * @OA\Get(
     *      path="/kidsshoes/all",
     *      tags={"shoes"},
     *      summary="Get all kids shoes",
     *      @OA\Response(
     *           response=200,
     *           description="Array of all kids shoes in the databases"
     *      )
     * )
     */

    Flight::route('GET /kidsshoes/all', function()  {
        $kidsService=new KidsService();
        $kidsShoes = $kidsService->get_all_kids_shoes();
        Flight::json($kidsShoes);
    });
    /**
     * @OA\Get(
     *      path="/kidshoes/shoe",
     *      tags={"kids shoes"},
     *      summary="Get kidshsoe by ID",
     *      @OA\Response(
     *           response=200,
     *           description="Get shoe by ID"
     *      ),
     *      @OA\Parameter(@OA\Schema(type="number"), in="query", name="kidsshoes_id", example="1", description="shoe ID")
     * )
     */
    Flight::route('GET /kidshoes/shoe', function () {
        $body = Flight::request()->query;

        $kids_service = new KidsService();
        $kids = $kids_service->get_kidshoes_by_id($body['kidsshoes_id']);
        Flight::json($kids, 200);
    });
     /**
     * @OA\Post(
     *      path="/kidsshoes/add",
     *      tags={"kidsshoes"},
     *      summary="Add kids shoes",
     *      @OA\Response(
     *           response=200,
     *           description="Logged user"
     *      ),
     *      @OA\RequestBody(
     *          description="ID",
     *          @OA\JsonContent(
     *             required={"name", "price", "size"},
     *             @OA\Property(property="name", required=true, type="string", example="PUMA Fall"),
     *             @OA\Property(property="price", required=true, type="string", example="94.60"),
     *             @OA\Property(property="size", required=true, type="string", example="30"),
     * @OA\Property(property="image_url1", required=false, type="string", example="images/ks66.jpg"),
     * @OA\Property(property="image_url2", required=false, type="string", example="images/ks77.jpg")
     *           )
     *      ),
     * )
     */
    Flight::route('POST /kidsshoes/add', function () {
        $payload = Flight::request()->data->getData();
        
        if($payload['name'] == NULL || $payload['price'] == NULL || $payload['size'] == NULL) {
            Flight::halt(500, "Required parameters are missing!");
        }
        unset($payload['id']);
        $kids_service = new KidsService();
        $kids = $kids_service->add_kidsshoe($payload);
        Flight::json(['data' => $kids, 'message' => "You have successfully added the patient"]);
    });
     /**
     * @OA\Delete(
     *      path="/delete/{kidsshoe_id}",
     *      tags={"kidsshoes"},
     *      summary="Delete shoe by id",
     *      @OA\Response(
     *           response=200,
     *           description="Status message"
     *      ),
     *      @OA\Parameter(@OA\Schema(type="number"), in="path", name="kidsshoe_id", example="1", description="shoe id")
     * )
     */
    Flight::route('DELETE /delete/@kidsshoe_id', function ($kidsshoe_id) {
        if($kidsshoe_id == NULL || $kidsshoe_id == '') {
            Flight::halt(500, "Required parameters are missing!");
        }

        $kids_service = new KidsService();
        $kids_service->delete_kidsshoe_by_id($kidsshoe_id);
        
        Flight::json(['data' => NULL, 'message' => "You have successfully deleted the item"]);
    });


    
