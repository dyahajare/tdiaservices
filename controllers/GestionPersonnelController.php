<?php
require_once '../models/PersonnelModel.php';
require_once '../connect.php';
require_once '../views/GestionPersonnelView.php';

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

    $personnelModel = new PersonnelModel($db);

    $records_per_page = 3;
    $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page_number - 1) * $records_per_page;

    $personnel = $personnelModel->getPersonnel($records_per_page, $offset);
    $total_personnel = $personnelModel->countPersonnel();
    $total_pages = ceil($total_personnel / $records_per_page);

    GestionPersonnelView::render($nom, $profileImage, $prenom, $personnel, $page_number, $total_pages);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
