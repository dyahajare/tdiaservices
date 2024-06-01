<?php
require_once '../connect.php';
require_once '../models/PersonnelModel.php';

session_start();

if (!isset($_SESSION['emailPro'])) {
    header("Location: ../views/LoginView.php");
    exit();
}

if (isset($_GET['cin'])) {
    $personnelModel = new PersonnelModel($conn);
    $personnelModel->supprimerPersonnel($_GET['cin']);
    header("Location: ../controllers/GestionPersonnelController.php");
    exit();
}
?>
