<?php

session_start();
require_once '../models/OrientationModel.php';

// Ensure the user is logged in and the CNE is set in the session
if (!isset($_SESSION['user']['cne'])) {
    echo json_encode(["status" => "error", "message" => "CNE est introuvable. Please log in."]);
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $choix1 = $_POST['choix1'] ?? '';
    $choix2 = $_POST['choix2'] ?? '';
    $choix3 = $_POST['choix3'] ?? '';
    $choix4 = $_POST['choix4'] ?? '';
    $choix5 = $_POST['choix5'] ?? '';
    $choix6 = $_POST['choix6'] ?? '';
    $choix7 = $_POST['choix7'] ?? '';
    $cne = $_SESSION['user']['cne'];

    $model = new OrientationModel();
    try {
        if ($model->saveChoices($choix1, $choix2, $choix3, $choix4, $choix5, $choix6, $choix7, $cne)) {
            echo json_encode(["status" => "success", "message" => "Votre Demande a passé avec succès!"]);
        } else {
            echo json_encode(["status" => "error", "message" => "Une erreur s'est produite lors de la sauvegarde de vos choix."]);
        }
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => "Oops !: " . $e->getMessage()]);
    }
}
?>
