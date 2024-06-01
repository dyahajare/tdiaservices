<?php
// controller/PfeController.php
session_start();
require_once '../models/PfeModel.php';

if (!isset($_SESSION['user']['cne'])) {
    echo json_encode(["status" => "error", "message" => "CNE is not found"]);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST['titre'] ?? '';
    $email_encadrant = $_POST['email_encadrant'] ?? '';
    $filiere = $_POST['filiere'] ?? '';
    $resume = $_POST['resume'] ?? '';
    $promotion = $_POST['promotion'] ?? '';
    $pfe_encadrant = $_POST['pfe_encadrant'] ?? '';
    $pfe_orglieu = $_POST['pfe_orglieu'] ?? '';
    $pfe_orgtele = $_POST['pfe_orgtele'] ?? '';
    $pfe_nom_prenom = $_POST['pfe_nom_prenom'] ?? '';
    $pfe_org_encadrant = $_POST['pfe_org_encadrant'] ?? '';
    $cne = $_SESSION['user']['cne'];
    $classe =  $_SESSION['user']['classe'];

    // Handle file upload
    if (isset($_FILES['rapport']) && $_FILES['rapport']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['rapport']['tmp_name'];
        $fileName = $_FILES['rapport']['name'];
        $uploadFileDir = '../uploads/';
        $dest_path = $uploadFileDir . $fileName;

        // Move the uploaded file to the destination
        if (!move_uploaded_file($fileTmpPath, $dest_path)) {
            echo json_encode(["status" => "error", "message" => "Error uploading file"]);
            exit();
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Error uploading file"]);
        exit();
    }

    $model = new PfeModel();
    try {
        if ($model->savePfe($titre, $filiere, $resume, $email_encadrant, $promotion, $pfe_encadrant, $pfe_orglieu, $pfe_orgtele, $pfe_nom_prenom, $pfe_org_encadrant, $dest_path, $cne,$classe)) {
            echo json_encode(["status" => "success", "message" => "Votre Demande a passé avec succès!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Une erreur s'est produite lors de la sauvegarde de vos choix."]);
        }
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => "Oops !: " . $e->getMessage()]);
    }
}
?>
