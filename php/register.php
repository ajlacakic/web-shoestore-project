<?php
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate passwords match
    if ($password !== $confirm_password) {
        header('Location: ../registerb.html?error=password_mismatch');
        exit();
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        $pdo = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT,
            DB_USER,
            DB_PASSWORD
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare and execute statement
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        if (!$stmt->execute([$first_name, $email, $hashed_password])) {
            throw new Exception("Error executing query");
        }

        header('Location: ../login.html?registration=success');
        exit();
    } catch (PDOException $e) {
        error_log('PDOException: ' . $e->getMessage()); // Log error to server logs
        header('Location: ../registerb.html?error=database_error');
        exit();
    } catch (Exception $e) {
        error_log('General Exception: ' . $e->getMessage()); // Log other errors
        header('Location: ../registerb.html?error=general_error');
        exit();
    }
} else {
    header('Location: ../registerb.html');
    exit();
}
