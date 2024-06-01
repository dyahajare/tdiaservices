<?php
require_once '../models/ClasseModel.php';
require_once '../models/UserModel.php';
require_once '../views/InfoClasseView.php';
require_once '../connect.php';

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

    if (isset($_GET['buttonValue'])) {
        $buttonValue = $_GET['buttonValue'];
        $classeDetails = $classeModel->getClasseDetails($buttonValue);
        $modulesNotes = $classeModel->getModulesNotes($buttonValue);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['afficher'])) {
        $classeModel->afficherNotes($buttonValue);
    }

    InfoClasseView::render($nom, $profileImage, $prenom, $classeDetails, $modulesNotes, $buttonValue);

} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
