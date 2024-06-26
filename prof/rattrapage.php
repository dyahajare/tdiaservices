<?php
// Inclusion du fichier d'en-tête
require_once 'entete.php';

// Vérification de la présence du paramètre 'nom_classe' dans l'URL
if (isset($_GET['nom_classe'])) {
    $nom_classe = $_GET['nom_classe'];

    try {
        // Connexion à la base de données
        $conn = new PDO("mysql:host=localhost;dbname=projetweb", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête pour récupérer les élèves de la classe sélectionnée
        $req = "SELECT * FROM etudiant WHERE nom_classe = :nom_classe AND absence > 3";

        $ps = $conn->prepare($req);
        $ps->execute(['nom_classe' => $nom_classe]);
        $eleves = $ps->fetchAll();
    } catch (PDOException $ex) {
        // Gestion des erreurs PDO
        echo "Erreur: " . $ex->getMessage();
    }
} else {
    // Message si aucune classe n'est sélectionnée
    echo "Aucune classe sélectionnée";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rattrapage de la classe <?php echo $nom_classe; ?></title>
    <!-- Liens vers des fichiers CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Style CSS personnalisé -->
    <style>
        .container {
            margin-top: 50px;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>rattrapage de la classe <?php echo $nom_classe; ?></h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>CNE</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($eleves as $etudiant) : ?>
                        <tr>
        <td><?php echo $etudiant['cne']; ?></td>
        <td><?php echo $etudiant['nom']; ?></td>
        <td><?php echo $etudiant['prenom']; ?></td>
        <!-- Afficher une icône "+" pour ajouter une absence -->
        
    
    </tr>
                    <?php endforeach; ?>
                    
                </tbody>
            </table>
           
        </div>
    </div>
</body>
</html>
