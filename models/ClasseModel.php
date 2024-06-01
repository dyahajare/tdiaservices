<?php
class ClasseModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getClasseDetails($buttonValue) {
        $req = $this->conn->prepare("SELECT * FROM classe WHERE nom=:buttonValue");
        $req->bindParam(':buttonValue', $buttonValue);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function getModulesNotes($buttonValue) {
        $req = $this->conn->prepare("SELECT nom_module, notes FROM modules WHERE nom_classe = :buttonValue");
        $req->bindParam(':buttonValue', $buttonValue);
        $req->execute();
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function afficherNotes($buttonValue) {
        $req = $this->conn->prepare("UPDATE classe SET Note = 1 WHERE nom = :nom");
        $req->bindParam(':nom', $buttonValue);
        $req->execute();
    }
    public function updateClasseDetails($buttonValue, $listeEtudiant, $emploiDeTemps) {
        $sql = "UPDATE classe SET ListeEtudiant = ?, EmploiDeTemps = ? WHERE nom = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$listeEtudiant, $emploiDeTemps, $buttonValue]);
    }

    public function getCurrentFileDetails($buttonValue) {
        $sql = "SELECT ListeEtudiant, EmploiDeTemps FROM classe WHERE nom = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$buttonValue]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
