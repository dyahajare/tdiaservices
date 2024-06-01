<?php
session_start();
try {
    $conn = new PDO('mysql:host=localhost;dbname=projetweb;', 'root', '');
} catch (Exception $e) {
    echo $e->getMessage();
}

if (isset($_POST['classe']) && isset($_POST['titre']) && isset($_POST['contenu'])) {
    $classe_notif = $_POST['classe'];
    $cin_prof_notif = $_SESSION['cin'];
    $titre_notif = $_POST['titre'];
    $msg_notif = $_POST['contenu'];
    $date_creation = date('Y-m-d H:i:s');

    try {
        // Connexion à la base de données
        $conn = new PDO("mysql:host=localhost;dbname=projetweb", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête d'insertion
        $stmt = $conn->prepare("INSERT INTO notif (classe_notif, cin_prof_notif, titre_notif, msg_notif, date_creation) VALUES (:classe_notif, :cin_prof_notif, :titre_notif, :msg_notif, :date_creation)");

        // Exécution de la requête
        $stmt->execute([
            'classe_notif' => $classe_notif,
            'cin_prof_notif' => $cin_prof_notif,
            'titre_notif' => $titre_notif,
            'msg_notif' => $msg_notif,
            'date_creation' => $date_creation
        ]);

        // Affichage de la notification JavaScript dans le HTML
        echo "<script>alert('Notification bien reçue !'); window.location.href = 'home.php';</script>";
        exit();
    } catch (PDOException $ex) {
        echo "Erreur lors de l'insertion : " . $ex->getMessage();
    }
} else {
    echo "Tous les champs sont obligatoires.";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votre Titre</title>
    <!-- Vos autres balises meta, liens CSS, etc. -->
</head>
<body>
    <!-- Votre contenu HTML -->
    <div class="container">
        <!-- Vos autres éléments HTML -->
    </div>

    <!-- Placez le code JavaScript pour la notification ici -->
    <script>
        alert('Notification bien reçue !');
        window.location.href = 'home.php';
    </script>
</body>
</html>
