<?php
include 'connect.php';

if(isset($_GET['cin'])) {
    // Utilisation d'une requête préparée pour éviter les attaques par injection SQL
    $req = $conn->prepare("DELETE FROM personnel WHERE cin = :cin");
    $req->bindValue(':cin', $_GET['cin']);
    $req->execute();
}

// Redirection vers la page de gestion des annonces après la suppression
header("Location: Personnels.php");
?>
