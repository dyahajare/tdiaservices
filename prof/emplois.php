<?php
session_start();

// Vérifiez si l'utilisateur est connecté et a un emploi du temps associé
if (isset($_SESSION['emploi_temps'])) {
    // Chemin du répertoire où se trouvent les fichiers d'emploi du temps
    $repertoire = '../uploads/';

    // Nom du fichier à télécharger (récupéré depuis la session)
    $nom_fichier = $_SESSION['emploi_temps'];

    // Chemin complet du fichier
    $chemin_fichier = $repertoire . $nom_fichier;

    // Vérifiez si le fichier existe
    if (file_exists($chemin_fichier)) {
        // Envoyez les en-têtes pour forcer le téléchargement
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($chemin_fichier) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($chemin_fichier));
        readfile($chemin_fichier);
        exit;
    } else {
        // Le fichier n'existe pas
        echo "Le fichier n'existe pas.";
    }
} else {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: login.php");
    exit;
}
?>
