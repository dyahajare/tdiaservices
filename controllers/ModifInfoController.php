<?php
// Démarrer la session
include_once '../connect.php';
include_once '../models/PersonnelModel.php';
session_start();
$session_duration = 900;

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['emailPro'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: ../login.html");
    exit();
}

// Récupérer les données de session
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

// Vérifiez que le paramètre 'cin' est bien défini
if (isset($_GET['cin'])) {
    $ancien_cin = urldecode($_GET['cin']);
    $personnelModel = new PersonnelModel($conn);

    $personne = $personnelModel->getPersonnelByCIN($ancien_cin);

    // Si le personnel n'est pas trouvé, rediriger ou afficher un message d'erreur
    if (!$personne) {
        echo "Erreur : personnel non trouvé.";
        exit();
    }
} else {
    echo "Erreur : CIN non défini.";
    exit();
}

// Si le formulaire est soumis
if (isset($_POST['submit'])) {
    $nom1 = htmlspecialchars($_POST['nom']);
    $prenom1 = htmlspecialchars($_POST['prenom']);
    $cin1 = htmlspecialchars($_POST['CIN']);
    $sexe1 = htmlspecialchars($_POST['Sexe']);
    $statut1 = htmlspecialchars($_POST['statut']);
    $situationFamiliale1 = htmlspecialchars($_POST['SituationFamiliale']);
    $tel1 = htmlspecialchars($_POST['telephone']);
    $emailPro1 = htmlspecialchars($_POST['emailPro']);
    $emailPerso1 = htmlspecialchars($_POST['emailPerso']);
    $img = ''; // Valeur par défaut pour l'image

    if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $destination = '../uploads/';
        $cheminDestination = $destination . basename($_FILES['photo']['name']);
        if (move_uploaded_file($_FILES['photo']['tmp_name'], $cheminDestination)) {
            $img = $_FILES['photo']['name'];
            $_SESSION['profileImage'] = $img;
        }
    } else {
        // Conserver l'ancienne image si aucune nouvelle image n'est téléchargée
        $img = $personnelModel->getPhotoByCIN($ancien_cin);
    }

    // Mettre à jour les informations
    $personnelModel->updatePersonnel($nom1, $prenom1, $cin1, $emailPro1, $emailPerso1, $tel1, $statut1, $sexe1, $situationFamiliale1, $img, $ancien_cin);

    // Mettre à jour les variables de session
    $_SESSION['nom'] = $nom1;
    $_SESSION['prenom'] = $prenom1;
    $_SESSION['cin'] = $cin1;
    $_SESSION['telephone'] = $tel1;
    $_SESSION['emailPro'] = $emailPro1;
    $_SESSION['emailPerso'] = $emailPerso1;
    $_SESSION['sexe'] = $sexe1;
    $_SESSION['Statut'] = $statut1;
    $_SESSION['situationFamiliale'] = $situationFamiliale1;

    // Redirection après la mise à jour
    header("Location: ../controllers/InfoController.php");
    exit();
}

// Inclure la vue de modification des informations
include_once '../views/ModifInfoView.php';
?>
