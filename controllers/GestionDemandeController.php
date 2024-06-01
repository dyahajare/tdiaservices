<?php
require_once '../models/DemandeModel.php';
require_once '../connect.php';
require_once '../views/GestionDemandeView.php';

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

    $demandeModel = new DemandeModel($db);

    $records_per_page = 4;
    $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page_number - 1) * $records_per_page;

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['valider'])) {
        $demande_id = $_POST['demande_id'];
        $demandeModel->validerDemande($demande_id);
        header("Location: GestionDemandeController.php?page=$page_number");
        exit();
    }

    $demandes = $demandeModel->getDemandes($records_per_page, $offset);
    $total_demandes = $demandeModel->countDemandes();
    $total_pages = ceil($total_demandes / $records_per_page);

    GestionDemandeView::render($nom, $profileImage, $prenom, $demandes, $page_number, $total_pages);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
}
?>
