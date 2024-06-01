<?php
require_once '../connect.php';
require_once '../models/PersonnelModel.php';

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

$personnelModel = new PersonnelModel($conn);

if (isset($_GET['cin'])) {
    $cin = urldecode($_GET['cin']);
    $personnel = $personnelModel->getPersonnelByCin($cin);
}

if (isset($_POST['submit'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $emailPro = htmlspecialchars($_POST['emailPro']);
    $emailPerso = htmlspecialchars($_POST['emailPerso']);
    $telephone = htmlspecialchars($_POST['telephone']);
    $SituationFamiliale = htmlspecialchars($_POST['SituationFamiliale']);
    $Statut = htmlspecialchars($_POST['Statut']);
    $Sexe = htmlspecialchars($_POST['Sexe']);
    $mot_pass = htmlspecialchars($_POST['mot_pass']);
    $img = ''; 

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $destination = '../uploads/';
        $cheminDestination = $destination . basename($_FILES['photo']['name']);
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $cheminDestination)) {
            $img = $_FILES['photo']['name'];
        } else {
            echo "Erreur de téléchargement : Impossible de déplacer le fichier.<br>";
        }
    } else {
        $img = $personnel['photo_personnel'];
    }

    $personnelModel->updatePersonnel($cin, $nom, $prenom, $emailPro, $emailPerso, $telephone, $Statut, $SituationFamiliale, $Sexe, $img, $mot_pass);
    header("Location: ../controllers/GestionPersonnelController.php");
    exit();
}

require_once '../views/ModifPersonnelView.php';
?>
