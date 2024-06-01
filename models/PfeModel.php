<?php
// model/PfeModel.php

class PfeModel {
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

    public function savePfe($titre, $filiere, $resume, $email_encadrant, $promotion, $pfe_encadrant, $pfe_orglieu, $pfe_orgtele, $pfe_nom_prenom, $pfe_org_encadrant, $dest_path, $cne, $classe)  {
        $sql = "INSERT INTO pfe (titre, pfe_filiere, pfe_resume, email_encadrant, promotion, pfe_encadrant, pfe_orglieu, pfe_orgtele, pfe_orgNom_Prenom, pfe_org_encamail, document, cne, classe_pfe) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$titre, $filiere, $resume, $email_encadrant, $promotion, $pfe_encadrant, $pfe_orglieu, $pfe_orgtele, $pfe_nom_prenom, $pfe_org_encadrant, $dest_path, $cne ,$classe]);
    }
}
?>
