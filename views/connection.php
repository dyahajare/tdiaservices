<?php
$host = "localhost";  
$user = "root";  
$password = '';  
$db_name = "projetweb";
try {
    $con = new PDO("mysql:host=$host;dbname=$db_name", $user, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $con->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Failed to connect with MySQL: " . $e->getMessage());
}
?>

 