<?php
class User {
    private $conn;

    public function __construct() {
        // Database connection
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=projetweb", "root", "");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erreur de connexion à la base de données: " . $e->getMessage();
            exit();
        }
    }

    public function  getEtudiant($username, $password) {
        $sql = "SELECT * FROM etudiant WHERE emailAcadémique = :username AND mot_pass = :password";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(':username' => $username, ':password' => $password));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getPersonnel($username, $password) {
        $sql = "SELECT * FROM personnel WHERE emailPro_personnel = :username AND mot_pass = :password";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(':username' => $username, ':password' => $password));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getProfesseur($username, $password) {
        $sql = "SELECT * FROM professeur WHERE emailPro = :username AND mot_pass = :password";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array(':username' => $username, ':password' => $password));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>