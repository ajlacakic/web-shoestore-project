<?php
require_once 'config.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require_once '../vendor/autoload.php';


session_start();

$authHeader = isset($_SERVER['HTTP_AUTHORIZATION']) ? $_SERVER['HTTP_AUTHORIZATION'] : null;
list($token) = sscanf($authHeader, '%s');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    try {
        if($token){
            $decoded_token = JWT::decode($token, new Key(JWT_SECRET, 'HS256'));
            Flight::json([
                'jwt_decoded' => $decoded_token,
                'user' => $decoded_token->user
            ]);
        }
    } catch (\Exception $e){
        Flight::halt(401, $e->getMessage());
    }     

    try {


        $decoded_token = JWT::decode($token, new Key(JWT_SECRET, 'HS256'));
        
        $pdo = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,
            DB_USER,
            DB_PASSWORD
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $user_id = $decoded_token->user->user_id;
        
        $stmt = $pdo->prepare("SELECT shoe_id FROM favorites WHERE user_id = ?");
        $stmt->execute([$user_id]);
        $shoe_ids = $stmt->fetchAll(PDO::FETCH_COLUMN);

        
        $shoes = [];
        foreach ($shoe_ids as $shoe_id) {
           
            $stmt = $pdo->prepare("SELECT * FROM kids_shoes WHERE shoe_id = ?");
            $stmt->execute([$shoe_id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                $shoes[] = $result;
                continue; 
            }

            
            $stmt = $pdo->prepare("SELECT * FROM men_shoes WHERE shoe_id = ?");
            $stmt->execute([$shoe_id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                $shoes[] = $result;
                continue; 
            }

            
            $stmt = $pdo->prepare("SELECT * FROM women_shoes WHERE shoe_id = ?");
            $stmt->execute([$shoe_id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result) {
                $shoes[] = $result;
            }
        }

        
        exit(json_encode(['shoes' => $shoes])); 
    } catch (PDOException $e) {
        
        http_response_code(500); 
        exit(json_encode(['error' => 'Failed to fetch favorites.', 'details' => $e->getMessage()]));
    }
} else {
   
    http_response_code(405); 
    exit(json_encode(['error' => 'Only POST requests are allowed.']));
}
?>
