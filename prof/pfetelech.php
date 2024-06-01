<?php
session_start();

if (!isset($_SESSION['emailPerso'])) {
    echo "Erreur : Aucun professeur connecté.";
    exit;
}

if (!isset($_GET['file']) || empty($_GET['file'])) {
    echo "Erreur : Aucun fichier spécifié.";
    exit;
}

$document = $_GET['file'];
$file_path = '../uploads/' . $document;

if (!file_exists($file_path)) {
    echo "Erreur : Le fichier n'existe pas.";
    exit;
}

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=' . basename($file_path));
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($file_path));

readfile($file_path);
exit;
?>
