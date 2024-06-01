<?php
// model/OrientationModel.php

class OrientationModel {
    private $pdo;

    public function __construct() {
        $host = 'localhost';
        $db_name = 'projetweb';
        $user = 'root';
        $password = '';

        $dsn = "mysql:host=$host;dbname=$db_name;charset=utf8";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try {
            $this->pdo = new PDO($dsn, $user, $password, $options);
        } catch (PDOException $e) {
            die('Database connection failed: ' . $e->getMessage());
        }
    }

    public function saveChoices($choix1, $choix2, $choix3, $choix4, $choix5, $choix6, $choix7, $cne) {
        $sql = "INSERT INTO orientation (choix1, choix2, choix3, choix4, choix5, choix6, choix7, cne) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$choix1, $choix2, $choix3, $choix4, $choix5, $choix6, $choix7, $cne]);
    }
}
?>