<?php
// Démarrer la session
include_once '../connect.php';
include_once '../models/PersonnelModel.php';
session_start();
$session_duration = 900;

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['emailPro'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: ../views/LoginView.php");
    exit();
}

// Récupérer les données de session
$nom = isset($_SESSION['nom']) ? $_SESSION['nom'] : '';
$profileImage = isset($_SESSION['profileImage']) ? $_SESSION['profileImage'] : '';
$prenom = isset($_SESSION['prenom']) ? $_SESSION['prenom'] : '';
$cin = isset($_SESSION['cin']) ? $_SESSION['cin'] : '';
$telephone = isset($_SESSION['telephone']) ? $_SESSION['telephone'] : '';
$emailPro = isset($_SESSION['emailPro']) ? $_SESSION['emailPro'] : '';
$emailPerso = isset($_SESSION['emailPerso']) ? $_SESSION['emailPerso'] : '';
$sexe = isset($_SESSION['sexe']) ? $_SESSION['sexe'] : '';
$statut = isset($_SESSION['Statut']) ? $_SESSION['Statut'] : '';
$situationFamiliale = isset($_SESSION['situationFamiliale']) ? $_SESSION['situationFamiliale'] : '';

// Inclure la vue
include_once '../views/InfoView.php';
?>
