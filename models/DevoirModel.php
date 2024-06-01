<?php
// model/DevoirModel.php

class DevoirModel {
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

    public function saveDevoir($nom_classe, $gmail_prof, $dest_path, $cne, $nom_etudiant, $prenom_etudiant) {
        $sql = "INSERT INTO devoir (nom_classe, gmail_prof, document, cne, nom_etudiant, prenom_etudiant) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nom_classe, $gmail_prof, $dest_path, $cne, $nom_etudiant, $prenom_etudiant]);
    }
}
?>