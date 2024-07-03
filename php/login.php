<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        $pdo = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,
            DB_USER,
            DB_PASSWORD
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];

            // Return user data along with success status and redirect URL
            echo json_encode([
                'success' => true,
                'user' => $user, // Include user data in the response
                'redirect' => '../index.html'
            ]);
        } else {
            // Return a JSON response with error
            echo json_encode([
                'success' => false,
                'message' => 'Invalid credentials'
            ]);
        }
    } catch (PDOException $e) {
        // Return a JSON response with error
        echo json_encode([
            'success' => false,
            'message' => 'Database error'
        ]);
    }
} else {
    // Method not allowed
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method'
    ]);
}

// Set content type to JSON for all responses
header('Content-Type: application/json');
exit();
?>
