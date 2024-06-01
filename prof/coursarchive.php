<?php
// Inclusion du fichier d'en-tête
require_once 'entete.php';

// Vérification de la présence du paramètre 'classe_cours' dans l'URL
if (isset($_GET['classe_cours'])) {
    $classe_cours = $_GET['classe_cours'];
    $cin_prof = $_SESSION['cin']; 

    try {
        // Connexion à la base de données
        $conn = new PDO("mysql:host=localhost;dbname=projetweb", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Définir le nombre de cours par page
        $cours_par_page = 10;

        // Récupérer le numéro de page actuel depuis l'URL, ou définir à 1 par défaut
        $page_courante = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page_courante - 1) * $cours_par_page;

        // Requête pour récupérer les cours archivés par le professeur connecté dans la classe sélectionnée avec pagination
        $req = "SELECT * FROM cours WHERE classe_cours = :classe_cours AND cin_prof = :cin_prof AND archived = 1 LIMIT :limit OFFSET :offset";
        $ps = $conn->prepare($req);
        $ps->bindParam(':classe_cours', $classe_cours, PDO::PARAM_STR);
        $ps->bindParam(':cin_prof', $cin_prof, PDO::PARAM_STR);
        $ps->bindParam(':limit', $cours_par_page, PDO::PARAM_INT);
        $ps->bindParam(':offset', $offset, PDO::PARAM_INT);
        $ps->execute();
        $cours_archives = $ps->fetchAll();

        // Requête pour récupérer le nombre total de cours archivés
        $req_total = "SELECT COUNT(*) as total FROM cours WHERE classe_cours = :classe_cours AND cin_prof = :cin_prof AND archived = 1";
        $ps_total = $conn->prepare($req_total);
        $ps_total->execute(['classe_cours' => $classe_cours, 'cin_prof' => $cin_prof]);
        $total_cours = $ps_total->fetch()['total'];
        $total_pages = ceil($total_cours / $cours_par_page);
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
    <title>Élèves de la classe <?php echo $classe_cours; ?></title>
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
        <h1 style="font-size: 24px; font-weight: bold; color: #333; text-align: center"><a href="Addcours.php"><i class="fas fa-plus" style="padding-right: 5%;"></i></a>Liste des cours archivés dans <?php echo $classe_cours; ?></h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Type</th>
                        <th>Module</th>
                        <th>Date</th>
                        <th>Document</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($cours_archives)) {
                        foreach ($cours_archives as $cours) { ?>
                            <tr>
                                <td><?php echo $cours['titre']; ?></td>
                                <td><?php echo $cours['type']; ?></td>
                                <td><?php echo $cours['Module']; ?></td>
                                <td><?php echo $cours['date_publication']; ?></td>
                                <td><?php echo $cours['document']; ?></td>
                                <td colspan="2">
                                    <form action="desarchive.php" method="post">
                                        <input type="hidden" name="titre" value="<?php echo $cours['titre']; ?>">
                                        <input type="submit" name="submit" value="Désarchiver" class="btn btn-success">
                                    </form>
                                    <a href="suppcours.php?titre=<?php echo $cours['titre']; ?>"  class="btn btn-danger">Supprimer</a>
                                </td>
                            </tr>
                        <?php } 
                    } else { ?>
                        <tr>
                            <td colspan="6">Aucun cours archivé trouvé pour le moment</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- Pagination -->
        <nav>
            <ul class="pagination justify-content-center">
                <?php if ($page_courante > 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="?classe_cours=<?php echo $classe_cours; ?>&page=<?php echo $page_courante - 1; ?>">Précédent</a>
                    </li>
                <?php endif; ?>
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                    <li class="page-item <?php if ($i == $page_courante) echo 'active'; ?>">
                        <a class="page-link" href="?classe_cours=<?php echo $classe_cours; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                    </li>
                <?php endfor; ?>
                <?php if ($page_courante < $total_pages): ?>
                    <li class="page-item">
                        <a class="page-link" href="?classe_cours=<?php echo $classe_cours; ?>&page=<?php echo $page_courante + 1; ?>">Suivant</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</body>
</html>
