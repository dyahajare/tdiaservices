<?php
// File: controllers/SupAnnonceController.php
require_once '../models/UserModel.php';

session_start();

if (!isset($_SESSION['emailPro'])) {
    header("Location: ../views/LoginView.php");
    exit();
}

if (isset($_GET['titre'])) {
    try {
        $db = new PDO("mysql:host=localhost;dbname=projetweb", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if (UserModel::deleteAnnonce($db, $_GET['titre'])) {
            header("Location: ../controllers/GestionAnnoncesController.php");
            exit();
        } else {
            echo "Erreur lors de la suppression de l'annonce.";
        }
    } catch (PDOException $ex) {
        echo "Erreur : " . $ex->getMessage();
    }
} else {
    echo "Aucun titre d'annonce spécifié.";
}
?>