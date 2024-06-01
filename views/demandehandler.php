<?php
include 'connection.php';
session_start();
$nom = $_SESSION['user']['nom'] ?? 'default_name';
$prenom=$_SESSION['user']['prenom'] ?? 'default_username';
$cne=$_SESSION['user']['cne'] ?? 'default_cne';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['typeatt']) && isset($_POST['envoyer'])) {
        $typedemande=$_POST['typeatt'];
        $req = $con->prepare("INSERT INTO demandes(cne_etu, nom_etu, prenom_etu, typeDemande) VALUES (:cne, :nom, :prenom, :typeDe)");
        $req->bindValue(':cne', $cne);
        $req->bindValue(':nom', $nom);
        $req->bindValue(':prenom', $prenom);
        $req->bindValue(':typeDe', $typedemande);
        $req->execute();
        header("Location: student.php");
      
    }
}
?>


