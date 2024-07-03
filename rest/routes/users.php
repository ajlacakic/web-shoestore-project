<?php
require_once __DIR__ . '/../services/userservice.class.php';


 /**
     * @OA\Get(
     *      path="/users/all",
     *      tags={"users"},
     *      summary="Get all men users",
     *      @OA\Response(
     *           response=200,
     *           description="Array of all users in the databases"
     *      )
     * )
     */

    Flight::route('GET /users/all', function()  {
        $userService=new UsersService();
        $user = $userService->get_all_users();
        Flight::json($user);
    });
    /**
     * @OA\Get(
     *      path="/users/user",
     *      tags={"users"},
     *      summary="Get user by ID",
     *      @OA\Response(
     *           response=200,
     *           description="Get user by ID"
     *      ),
     *      @OA\Parameter(@OA\Schema(type="number"), in="query", name="user_id", example="1", description="user ID")
     * )
     */
    Flight::route('GET /users/user', function () {
        $body = Flight::request()->query;

        $user_service = new UsersService();
        $user = $user_service->get_user_by_id($body['user_id']);
        Flight::json($user, 200);
    });
    /**
     * @OA\Post(
     *      path="/users/add",
     *      tags={"user"},
     *      summary="Add user",
     *      @OA\Response(
     *           response=200,
     *           description="Logged user"
     *      ),
     *      @OA\RequestBody(
     *          description="ID",
     *          @OA\JsonContent(
     *             required={"username", "email", "password"},
     *             @OA\Property(property="username", required=true, type="string", example="username1"),
     *             @OA\Property(property="email", required=true, type="string", example="username1@gmail.com"),
     *             @OA\Property(property="password", required=true, type="string", example="123456")
     * 
     *           )
     *      ),
     * )
     */
    Flight::route('POST /users/add', function () {
        $payload = Flight::request()->data->getData();
        
        if($payload['username'] == NULL || $payload['email'] == NULL || $payload['password'] == NULL) {
            Flight::halt(500, "Required parameters are missing!");
        }
        unset($payload['id']);
        $user_service = new UsersService();
        $user = $user_service->add_user($payload);
        Flight::json(['data' => $user, 'message' => "You have successfully added the shoe"]);
    });
     /**
     * @OA\Delete(
     *      path="/delete/{user_id}",
     *      tags={"user"},
     *      summary="Delete user by id",
     *      @OA\Response(
     *           response=200,
     *           description="Status message"
     *      ),
     *      @OA\Parameter(@OA\Schema(type="number"), in="path", name="user_id", example="1", description="user id")
     * )
     */
    Flight::route('DELETE /delete/@user_id', function ($user_id) {
        if($user_id == NULL || $user_id == '') {
            Flight::halt(500, "Required parameters are missing!");
        }

        $user_service = new UsersService();
        $user_service->delete_user_by_id($user_id);
        
        Flight::json(['data' => NULL, 'message' => "You have successfully deleted the user"]);
    });

    

    
