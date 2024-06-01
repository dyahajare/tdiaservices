<?php
include 'connect.php';

if(isset($_GET['titre'])) {
    // Utilisation d'une requête préparée pour éviter les attaques par injection SQL
    $req = $conn->prepare("DELETE FROM actualité WHERE titre_actu = :titre_actu");
    $req->bindValue(':titre_actu', $_GET['titre']);
    $req->execute();
}

// Redirection vers la page de gestion des annonces après la suppression
header("Location: gestionAnnonces.php");
?>
