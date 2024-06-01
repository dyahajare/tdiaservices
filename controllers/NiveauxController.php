<?php
// File: controllers/NiveauxController.php
require_once '../models/UserModel.php';

session_start();

if (!isset($_SESSION['emailPro'])) {
    header("Location: ../views/LoginView.php");
    exit();
}

// Récupérer les données de session
$sessionData = [
    'nom' => $_SESSION['nom'],
    'profileImage' => $_SESSION['profileImage'],
    'prenom' => $_SESSION['prenom'],
    'cin' => $_SESSION['cin'],
    'telephone' => $_SESSION['telephone'],
    'emailPro' => $_SESSION['emailPro'],
    'emailPerso' => $_SESSION['emailPerso'],
    'sexe' => $_SESSION['sexe'],
    'Statut' => $_SESSION['Statut'],
    'situationFamiliale' => $_SESSION['situationFamiliale']
];

// Créer une instance de UserModel
$user = new UserModel($sessionData);
// Passer les données utilisateur à la vue
$nom = $user->nom;
$profileImage = $user->profileImage;
$prenom = $user->prenom;

include '../views/NiveauxView.php';
?>