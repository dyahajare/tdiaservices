<?php
// File: controllers/GestionAnnoncesController.php
require_once '../models/UserModel.php';

session_start();

if (!isset($_SESSION['emailPro'])) {
    header("Location: ../login.html");
    exit();
}
// Instanciation de l'utilisateur avec les données de session
$user = new UserModel($_SESSION);

// Passer les données utilisateur à la vue
$nom = $user->nom;
$profileImage = $user->profileImage;
$prenom = $user->prenom;

try {
    $db = new PDO("mysql:host=localhost;dbname=projetweb", "root", "");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $records_per_page = 3;
    $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page_number - 1) * $records_per_page;

    $actualites = UserModel::getActualites($db, $records_per_page, $offset);
    $total_records = UserModel::countActualites($db);
    $total_pages = ceil($total_records / $records_per_page);
} catch (PDOException $ex) {
    echo "Oops erreur: " . $ex->getMessage();
}

include '../views/GestionAnnoncesView.php';
?>