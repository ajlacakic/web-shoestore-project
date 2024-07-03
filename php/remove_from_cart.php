<?php
require_once 'config.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require_once '../vendor/autoload.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $decoded_token = null;
    try {
        $token = Flight::request()->getHeader('Authentication');
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

    $user_id = $decoded_token->user->user_id;

    $shoe_id = isset($_POST['shoe_id']) ? $_POST['shoe_id'] : null;
    
if ($shoe_id === null) {
    http_response_code(400); // Bad Request
    exit(json_encode(['error' => 'Missing required parameter: shoe_id']));
}


    try {
        
        $pdo = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,
            DB_USER,
            DB_PASSWORD
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        
        $stmt = $pdo->prepare("DELETE FROM cart WHERE user_id = ? AND shoe_id = ?");
        $stmt->execute([$user_id, $shoe_id]);

        
        $rowsAffected = $stmt->rowCount();
        if ($rowsAffected > 0) {
            
            http_response_code(200); 
            exit(json_encode(['message' => 'Item removed from cart successfully.']));
        } else {
            
            http_response_code(404);
            exit(json_encode(['error' => 'Item not found in cart for the user.', 'shoe_id' => $shoe_id]));
        }
    } catch (PDOException $e) {
       
        http_response_code(500); 
        exit(json_encode(['error' => 'Failed to remove item from cart.', 'details' => $e->getMessage()]));
    }
} else {
    
    http_response_code(405); 
    exit(json_encode(['error' => 'Only POST requests are allowed.']));
}
?>
