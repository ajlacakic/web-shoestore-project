<?php
require_once 'config.php';
require_once '../vendor/autoload.php';

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

$authHeader = $_SERVER['HTTP_AUTHORIZATION'] ?? null;
if (!$authHeader) {
    Flight::halt(401, "Authorization header missing");
    exit;
}

list($token) = sscanf($authHeader, '%s');

try {
    
    $decoded_token = JWT::decode($token, new Key(JWT_SECRET, 'HS256'));

    // Check if the JWT contains the necessary data
    if (!isset($decoded_token->user->user_id)) {
        Flight::halt(400, "Invalid token data");
        exit;
    }

    $user_id = $decoded_token->user->user_id;

    // Database connection
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,
        DB_USER,
        DB_PASSWORD
    );

    $stmt = $pdo->prepare("SELECT * FROM users WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch();

    if ($user) {
        exit(json_encode(['status' => 'success', 'user' => $user]));
    } else {
        Flight::halt(404, $user_id);
     }

} catch (\Exception $e) {
    Flight::halt(401, $e->getMessage());
}

// Flight framework initialization (this should be at the start of your application)
// Flight::start();
?>
