<?php 

require_once 'entete.php';

// Vérifier si l'email du professeur est en session
if (!isset(  $_SESSION['emailPerso'])) {
    echo "Erreur : Aucun professeur connecté.";
    exit;
}

$email_prof =  $_SESSION['emailPerso'];


try {
    // Connexion à la base de données
    $conn = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête pour récupérer les classes ayant des devoirs pour le professeur connecté
    $req_classes = "
     SELECT DISTINCT d.classe_pfe
     FROM pfe d
     WHERE email_encadrant= :email_prof
    ";
    $ps_classes = $conn->prepare($req_classes);
    $ps_classes->execute(['email_prof' => $email_prof]);
    $classes = $ps_classes->fetchAll();
} catch (PDOException $ex) {
    echo "Erreur: " . $ex->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Classes du Professeur</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Classes du Professeur</h1>
    <div class="list-group mb-4">
        <?php
        if (!empty($classes)) {
            foreach ($classes as $pfe) {
                echo '<a href="pfe.php?classe_pfe=' . urlencode($pfe['classe_pfe']) . '" class="list-group-item list-group-item-action">' . htmlspecialchars($pfe['classe_pfe']) . '</a>';
            }
        } else {
            echo '<div class="alert alert-warning" role="alert">Aucune classe trouvée pour ce professeur.</div>';
        }
        ?>
    </div>
</div>
</body>
</html>
