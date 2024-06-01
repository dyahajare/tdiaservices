<?php
// model/PfaModel.php

class PfaModel {
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

    public function savePfa($titre, $filiere, $resume, $etudiants, $promotion, $encadrant, $dest_path, $cne, $classe) {
        $sql = "INSERT INTO pfa (titre, filiere, pfa_resume, pfa_contributers_noms, promotion, pfa_encadrant, document, cne, classe_pfa) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$titre, $filiere, $resume, $etudiants, $promotion, $encadrant, $dest_path, $cne, $classe]);
    }
}
?>