<?php
// controller/DevoirController.php
session_start();
require_once '../models/DevoirModel.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom_classe = $_POST['nom_classe'] ?? '';
    $gmail_prof = $_POST['gmail_prof'] ?? '';

    if (isset($_SESSION['user']['cne'])) {
        $cne = $_SESSION['user']['cne'];
        $nom = $_SESSION['user']['nom'];
        $prenom = $_SESSION['user']['prenom'];
    } else {
        echo json_encode(["status" => "error", "message" => "CNE not found in session. Please log in."]);
        exit();
    }

    if (isset($_FILES['document']) && $_FILES['document']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['document']['tmp_name'];
        $fileName = $_FILES['document']['name'];
        $uploadFileDir = '../uploads/';
        $dest_path = $uploadFileDir . $fileName;

        if (!move_uploaded_file($fileTmpPath, $dest_path)) {
            echo json_encode(["status" => "error", "message" => "Erreur dans téléchargement de fichier"]);
            exit();
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Erreur dans téléchargement de fichier"]);
        exit();
    }

    $model = new DevoirModel();
    try {
        if ($model->saveDevoir($nom_classe, $gmail_prof, $dest_path, $cne, $nom, $prenom)) {
            echo json_encode(["status" => "success", "message" => "Votre Demande a été passée avec succès !"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Une erreur s'est produite lors de la sauvegarde de votre devoir."]);
        }
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => "Oops !: " . $e->getMessage()]);
    }
}
?>
