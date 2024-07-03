<?php
// Set response headers

require_once 'config.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require_once '../vendor/autoload.php';

header('Content-Type: application/json');

try {
    // Retrieve the Authorization header directly from the $_SERVER superglobal
    $authHeader = isset($_SERVER['HTTP_AUTHORIZATION']) ? $_SERVER['HTTP_AUTHORIZATION'] : null;

    $decoded_token = null;
    if ($authHeader) {
        // Extract the token part from the Authorization header
        list($jwt) = sscanf($authHeader, '%s');

        if ($jwt) {
            // Decode the JWT using your JWT library
            $decoded_token = JWT::decode($jwt, new Key(JWT_SECRET, 'HS256'));
            // Example response, replace with your application logic
            echo json_encode(['jwt_decoded' => $decoded_token, 'user_id' => $decoded_token->user->user_id]);
        }
    } else {
        throw new Exception("Authorization token not found.");
    }
} catch (Exception $e) {
    // If the token is not present or decoding fails, handle the error
    http_response_code(401); // Unauthorized
    echo json_encode(['error' => 'Authorization error', 'details' => $e->getMessage()]);
}

?>
