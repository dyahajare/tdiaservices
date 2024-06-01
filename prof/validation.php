<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur lors de la connexion à la base de données : " . $e->getMessage();
    exit();
}

if (isset($_POST['submit'])) {
    $titre = htmlspecialchars($_POST['titre']);
    $validation = 1;

    try {
        // Requête pour mettre à jour la colonne 'validation' du cours spécifié
        $req = $conn->prepare("UPDATE pfe SET validation = :validation WHERE titre = :titre");
        $req->bindParam(':validation', $validation, PDO::PARAM_INT);
        $req->bindParam(':titre', $titre, PDO::PARAM_STR);
        $req->execute();

        // Redirection vers la page précédente après la validation
        header("Location: " . $_SERVER['HTTP_REFERER']);
        exit();
    
    } catch (PDOException $ex) {
        // Gestion des erreurs PDO
        echo "Erreur lors de la validation du PFE: " . $ex->getMessage();
    }
}
?>
