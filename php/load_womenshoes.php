<?php
require_once 'config.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require_once '../vendor/autoload.php';

$authHeader = isset($_SERVER['HTTP_AUTHORIZATION']) ? $_SERVER['HTTP_AUTHORIZATION'] : null;
list($token) = sscanf($authHeader, '%s');
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
    
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,
        DB_USER,
        DB_PASSWORD
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $stmt = $pdo->query("SELECT * FROM women_shoes");
    $shoes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    
    echo json_encode(['shoes' => $shoes]);
} catch (PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]); 
}
?>
