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
        $req = "SELECT cne, nom, prenom, rapport FROM etudiant WHERE nom_classe = :nom_classe";
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
    <title>Élèves de la classe <?php echo htmlspecialchars($nom_classe); ?></title>
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
        <h1>Élèves de la classe <?php echo htmlspecialchars($nom_classe); ?></h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>CNE</th>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Rapport</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($eleves)) : ?>
                        <?php foreach ($eleves as $etudiant) : ?>
                            <tr>
                                <td><?php echo htmlspecialchars($etudiant['cne']); ?></td>
                                <td><?php echo htmlspecialchars($etudiant['nom']); ?></td>
                                <td><?php echo htmlspecialchars($etudiant['prenom']); ?></td>
                                <td>
                                    <?php if (!empty($etudiant['rapport'])): ?>
                                        <a href="rapporttelech.php?file=<?php echo urlencode($etudiant['rapport']); ?>" class="btn btn-primary">
                                            <i class="fas fa-download"></i>
                                        </a>
                                    <?php else: ?>
                                        Pas de rapport
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">Aucun élève trouvé dans cette classe.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
