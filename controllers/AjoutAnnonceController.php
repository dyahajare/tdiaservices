<?php
// File: controllers/AjoutAnnonceController.php
require_once '../models/UserModel.php';

session_start();

if (!isset($_SESSION['emailPro'])) {
    header("Location: ../views/LoginView.php");
    exit();
}
// Instanciation de l'utilisateur avec les données de session
$user = new UserModel($_SESSION);

// Passer les données utilisateur à la vue
$nom = $user->nom;
$profileImage = $user->profileImage;
$prenom = $user->prenom;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $db = new PDO("mysql:host=localhost;dbname=projetweb", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $destination = '../uploads/';
        $cheminDestination = $destination . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $cheminDestination);

        $annonceData = [
            'titre' => $_POST['titre'],
            'description' => $_POST['description'],
            'image' => $_FILES['image']['name'],
            'type_img' => $_POST['type_img']
        ];

        if (UserModel::addAnnonce($db, $annonceData)) {
            header("Location: ../controllers/GestionAnnoncesController.php");
            exit();
        } else {
            echo "Erreur lors de l'ajout de l'annonce.";
        }
    } catch (PDOException $ex) {
        echo "Erreur : " . $ex->getMessage();
    }
} else {
    include '../views/AjoutAnnonceView.php';
}
?>