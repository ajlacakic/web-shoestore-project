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
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : null;

    
    if (!$shoe_id || !$quantity) {
        http_response_code(400); // Bad request
        exit(json_encode(['error' => 'Shoe ID and quantity are required.']));
    }

    try {
        
        $pdo = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,
            DB_USER,
            DB_PASSWORD
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        
        $stmt = $pdo->prepare("INSERT INTO cart (user_id, shoe_id, quantity) VALUES (?, ?, ?)");
        $stmt->execute([$user_id, $shoe_id, $quantity]);

        
        http_response_code(200); // OK
        exit(json_encode(['success' => true, 'debug' => [
            'user_id' => $user_id,
            'shoe_id' => $shoe_id,
            'quantity' => $quantity,
            'message' => 'Item added to cart successfully.'
        ]]));
    } catch (PDOException $e) {
        
        http_response_code(500); 
        exit(json_encode(['error' => 'Failed to add item to cart.', 'details' => $e->getMessage()]));
    }
} else {
    
    http_response_code(405); 
    exit(json_encode(['error' => 'Only POST requests are allowed.']));
}
?>
