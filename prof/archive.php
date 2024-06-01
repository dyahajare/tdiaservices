<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '');
} catch (Exception $e) {
    echo $e->getMessage();
}

if (isset($_POST['submit'])) {
    $titre = $_POST['titre'];
    // La valeur de 'archived' est fixée à 1 lors de la mise à jour
    $archived = 1;

    try {
        // Requête pour mettre à jour la colonne 'archived' du cours spécifié
        $req = $conn->prepare("UPDATE cours SET archived = :archived WHERE titre = :titre");
        $req->bindParam(':archived', $archived);
        $req->bindParam(':titre', $titre);
        $req->execute();

        // Redirection vers la page précédente après l'archivage
        header("Location: ".$_SERVER['HTTP_REFERER']);
        exit();
    
    } catch (PDOException $ex) {
        // Gestion des erreurs PDO
        echo "Erreur lors de l'archivage du cours: " . $ex->getMessage();
    }
}
?>
