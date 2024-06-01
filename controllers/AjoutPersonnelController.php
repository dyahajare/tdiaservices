<?php
require_once '../connect.php';
require_once '../models/PersonnelModel.php';
require_once '../views/AjoutPersonnelView.php';

session_start();

if (!isset($_SESSION['emailPro'])) {
    header("Location: ../views/LoginView.php");
    exit();
}

$nom = $_SESSION['nom'];
$profileImage = $_SESSION['profileImage'];
$prenom = $_SESSION['prenom'];
$cin = $_SESSION['cin'];
$telephone = $_SESSION['telephone'];
$emailPro = $_SESSION['emailPro'];
$emailPerso = $_SESSION['emailPerso'];
$sexe = $_SESSION['sexe'];
$statut = $_SESSION['Statut'];
$situationFamiliale = $_SESSION['situationFamiliale'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $personnelModel = new PersonnelModel($conn);
    $personnelModel->ajouterPersonnel($_POST, $_FILES);
    header("Location: ../controllers/GestionPersonnelController.php");
    exit();
}

AjoutPersonnelView::render($nom, $profileImage, $prenom);
?>
