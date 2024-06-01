<?php
// controller/PfaController.php
session_start();
require_once '../models/PfaModel.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = $_POST['titre'];
    $filiere = $_POST['filiere'];
    $resume = $_POST['resume'];
    $etudiants = $_POST['etudiants'];
    $promotion = $_POST['promotion'];
    $encadrant = $_POST['encadrant'];

    if (isset($_SESSION['user']['cne'])) {
        $cne = $_SESSION['user']['cne'];
        $classe = $_SESSION['user']['classe'];
    } else {
        echo json_encode(["status" => "error", "message" => "CNE est introuvable. Veuillez vous connecter."]);
        exit();
    }

    if (isset($_FILES['rapport']) && $_FILES['rapport']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['rapport']['tmp_name'];
        $fileName = $_FILES['rapport']['name'];
        $uploadFileDir = '../uploads/';
        $dest_path = $uploadFileDir . $fileName;

        if (!move_uploaded_file($fileTmpPath, $dest_path)) {
            echo json_encode(["status" => "error", "message" => "Erreur lors du téléchargement du fichier."]);
            exit();
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Erreur lors du téléchargement du fichier."]);
        exit();
    }

    $model = new PfaModel();
    try {
        if ($model->savePfa($titre, $filiere, $resume, $etudiants, $promotion, $encadrant, $dest_path, $cne,$classe)) {
            echo json_encode(["status" => "success", "message" => "Votre demande a été passée avec succès !"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Une erreur s'est produite lors de la sauvegarde de vos choix."]);
        }
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => "Oops !: " . $e->getMessage()]);
    }
}
?>
