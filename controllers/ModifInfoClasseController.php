<?php
require_once '../models/ClasseModel.php';
require_once '../connect.php';
require_once '../views/ModifInfoClasseView.php';

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

try {
    $db = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $classeModel = new ClasseModel($db);

    $buttonValue = '';
    if (isset($_GET['buttonValue'])) {
        $buttonValue = htmlspecialchars($_GET['buttonValue']);
    } elseif (isset($_POST['buttonValue'])) {
        $buttonValue = htmlspecialchars($_POST['buttonValue']);
    } else {
        die("Paramètre 'buttonValue' manquant.");
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        $listeEtudiant = !empty($_FILES['listeEtudiant']['name']) ? $_FILES['listeEtudiant']['name'] : null;
        $emploiDeTemps = !empty($_FILES['EmploiDeTemps']['name']) ? $_FILES['EmploiDeTemps']['name'] : null;

        // Gestion du téléchargement des fichiers
        if ($listeEtudiant) {
            $destination = '../uploads/';
            move_uploaded_file($_FILES['listeEtudiant']['tmp_name'], $destination . $listeEtudiant);
        } else {
            $currentFiles = $classeModel->getCurrentFileDetails($buttonValue);
            $listeEtudiant = $currentFiles['ListeEtudiant'];
        }

        if ($emploiDeTemps) {
            $destination = '../uploads/';
            move_uploaded_file($_FILES['EmploiDeTemps']['tmp_name'], $destination . $emploiDeTemps);
        } else {
            $currentFiles = $classeModel->getCurrentFileDetails($buttonValue);
            $emploiDeTemps = $currentFiles['EmploiDeTemps'];
        }

        $classeModel->updateClasseDetails($buttonValue, $listeEtudiant, $emploiDeTemps);
        header("Location: InfoClasseController.php?buttonValue=" . urlencode($buttonValue));
        exit();
    }

    $classeDetails = $classeModel->getClasseDetails($buttonValue);
    ModifInfoClasseView::render($nom, $profileImage, $prenom, $classeDetails, $buttonValue);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
