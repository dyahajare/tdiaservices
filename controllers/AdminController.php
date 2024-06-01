<?php
// File: controllers/AdminController.php
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

include '../views/AdminView.php';
?>