<?php
try{
    $conn=new PDO('mysql:host=localhost;dbname=projetweb;','root','');
 }
 catch(Exception $e){
    echo $e->getMessage();
 }try{
    $conn=new PDO('mysql:host=localhost;dbname=projetweb;','root','');
 }
 catch(Exception $e){
    echo $e->getMessage();
 }

// Vérifier si le paramètre 'file' est présent dans l'URL
if (isset($_GET['file'])) {
    // Chemin du répertoire où se trouvent les fichiers
    $repertoire = '../uploads/'; // Mettez le chemin vers votre répertoire de fichiers
    
    // Nom du fichier à télécharger
    $file = $_GET['file'];
    
    // Chemin complet du fichier
    $chemin_fichier = $repertoire . $file;
    
    // Vérifier si le fichier existe
    if (file_exists($chemin_fichier)) {
        // Envoyer les en-têtes pour forcer le téléchargement
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
    // Paramètre 'file' manquant dans l'URL
    echo "Paramètre 'file' manquant dans l'URL.";
}

// Vérifier si le paramètre 'file' est présent dans l'URL
if (isset($_GET['file'])) {
    // Chemin du répertoire où se trouvent les fichiers
    $repertoire = '../uploads/'; // Mettez le chemin vers votre répertoire de fichiers
    
    // Nom du fichier à télécharger
    $file = $_GET['file'];
    
    // Chemin complet du fichier
    $chemin_fichier = $repertoire . $file;
    
    // Vérifier si le fichier existe
    if (file_exists($chemin_fichier)) {
        // Envoyer les en-têtes pour forcer le téléchargement
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
    // Paramètre 'file' manquant dans l'URL
    echo "Paramètre 'file' manquant dans l'URL.";
}
?>
