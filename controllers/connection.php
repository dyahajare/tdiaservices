<?php
$host = 'localhost';
$db_name = 'projetweb';
$user = 'root';
$password = '';

try {
    $dsn = "mysql:host=$host;dbname=$db_name;charset=utf8";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $user, $password, $options);
    echo "Connection successful!";
} catch (PDOException $e) {
    // Log the error message to a file
    error_log("Connection failed: " . $e->getMessage(), 3, "errors.log");
    die('Failed to connect with MySQL: ' . $e->getMessage());
}
?>