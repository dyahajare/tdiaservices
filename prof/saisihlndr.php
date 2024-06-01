<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=projetweb;', 'root', '');
} catch (Exception $e) {
    echo $e->getMessage();
}

if (isset($_POST['nom']) && isset($_POST['type']) && isset($_POST['offre']) && isset($_POST['debut']) && isset($_POST['lien'])) {
    $nom = $_POST['nom'];
    $type = $_POST['type'];
    $offre = $_POST['offre'];
    $durée = $_POST['debut'];
    $lien = $_POST['lien'];

    try {
        $req = $conn->prepare("INSERT INTO stage (nom_stage, type_stage, offre_stage, durée_stage, lien_offre) VALUES (?, ?, ?, ?, ?)");
        $params = array($nom, $type, $offre, $durée, $lien);
        $req->execute($params);
        header("Location: offrestage.php");
        exit();
    } catch (PDOException $ex) {
        echo "Erreur lors de l'insertion : " . $ex->getMessage();
    }
}
?>
