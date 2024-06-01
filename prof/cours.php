<?php

require_once 'entete.php';

// Démarrage de la session


// Vérification de la présence du paramètre 'classe_cours' dans l'URL et de la session 'cin'
if (isset($_GET['classe_cours']) && isset($_SESSION['cin'])) {
    $classe_cours = htmlspecialchars($_GET['classe_cours']);
    $cin_prof = $_SESSION['cin'];

    // Définir le nombre de cours par page
    $cours_par_page = 10;

    // Récupérer le numéro de page actuel depuis l'URL, ou définir à 1 par défaut
    $page_courante = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page_courante - 1) * $cours_par_page;

    try {
        // Connexion à la base de données
        $conn = new PDO("mysql:host=localhost;dbname=projetweb", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête pour récupérer le nombre total de cours
        $req_total = "SELECT COUNT(*) as total FROM cours WHERE classe_cours = :classe_cours AND cin_prof = :cin_prof AND archived = 0";
        $ps_total = $conn->prepare($req_total);
        $ps_total->execute(['classe_cours' => $classe_cours, 'cin_prof' => $cin_prof]);
        $total_cours = $ps_total->fetch()['total'];
        $total_pages = ceil($total_cours / $cours_par_page);

        // Requête pour récupérer les cours de la classe sélectionnée et du professeur connecté avec pagination
        $req = "SELECT * FROM cours WHERE classe_cours = :classe_cours AND cin_prof = :cin_prof AND archived = 0 LIMIT :limit OFFSET :offset";
        $ps = $conn->prepare($req);
        $ps->bindParam(':classe_cours', $classe_cours, PDO::PARAM_STR);
        $ps->bindParam(':cin_prof', $cin_prof, PDO::PARAM_STR);
        $ps->bindParam(':limit', $cours_par_page, PDO::PARAM_INT);
        $ps->bindParam(':offset', $offset, PDO::PARAM_INT);
        $ps->execute();
        $cours = $ps->fetchAll();
    } catch (PDOException $ex) {
        // Gestion des erreurs PDO
        echo "Erreur: " . $ex->getMessage();
    }
} else {
    // Message si aucune classe n'est sélectionnée ou si le professeur n'est pas connecté
    echo "Aucune classe sélectionnée ou professeur non connecté";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cours de la classe <?php echo $classe_cours; ?></title>
    <!-- Liens vers des fichiers CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
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
        <h1 style="font-size: 24px; font-weight: bold; color: #333; text-align: center">
            <a href="Addcours.php"><i class="fas fa-plus" style="padding-right: 5%;"></i></a>
            Liste des cours existants dans <?php echo $classe_cours; ?>
        </h1>
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
                    <?php if (!empty($cours)) { ?>
                        <?php foreach ($cours as $cour) { ?>
                            <tr>
                                <td><?php echo htmlspecialchars($cour['titre']); ?></td>
                                <td><?php echo htmlspecialchars($cour['type']); ?></td>
                                <td><?php echo htmlspecialchars($cour['Module']); ?></td>
                                <td><?php echo htmlspecialchars($cour['date_publication']); ?></td>
                                <td><?php echo htmlspecialchars($cour['document']); ?></td>
                                <td colspan="2">
                                    <form action="archive.php" method="post" style="display:inline-block;">
                                        <input type="hidden" name="titre" value="<?php echo htmlspecialchars($cour['titre']); ?>">
                                        <input type="submit" name="submit" value="Archiver" class="btn btn-success">
                                    </form>
                                    <a href="suppcours.php?titre=<?php echo urlencode($cour['titre']); ?>" class="btn btn-danger">Supprimer</a>
                                </td>
                            </tr>
                        <?php } ?>
                    <?php } else { ?>
                        <tr>
                            <td colspan="6">Aucun cours trouvé pour le moment</td>
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
                    <li class="page-item <?php if ($page >= $total_pages) echo 'disabled'; ?>">
                        <a class="page-link" href="?classe_cours=<?php echo urlencode($classe_cours); ?>&page=<?php echo  $page_courante + 1; ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
            </ul>
        </nav>
    </div>
</body>
</html>
