<?php
// File: controllers/ModifAnnonceController.php
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

$db = new PDO("mysql:host=localhost;dbname=projetweb", "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_GET['titr'])) {
    $annonce_titre = urldecode($_GET['titr']);
    $annonce = UserModel::getAnnonce($db, $annonce_titre);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = htmlspecialchars($_POST['titre']);
    $description = htmlspecialchars($_POST['description']);
    $type_img = htmlspecialchars($_POST['type_img']);
    $ancien_titre = htmlspecialchars($_POST['titr']);
    $img = '';

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $destination = '../uploads/';
        $cheminDestination = $destination . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $cheminDestination)) {
            $img = $_FILES['image']['name'];
        }
    } else {
        $img = $annonce['img_actu'];
    }

    $annonceData = [
        'titre' => $titre,
        'description' => $description,
        'type_img' => $type_img,
        'image' => $img,
        'ancien_titre' => $ancien_titre
    ];

    if (UserModel::updateAnnonce($db, $annonceData)) {
        echo '<script>window.location.href = "../controllers/GestionAnnoncesController.php";</script>';
        exit();
    } else {
        echo "Erreur lors de la mise à jour de l'annonce.";
    }
} else {
    include '../views/ModifAnnonceView.php';
}
?>