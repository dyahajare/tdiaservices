<?php
require_once 'entete.php';

try {
    // Établir une connexion à la base de données
    $conn = new PDO("mysql:host=localhost;dbname=projetweb", "root", "");
    // Définir PDO pour lancer des exceptions en cas d'erreur
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer le C.I.N. de l'utilisateur connecté depuis la session

    // Requête pour sélectionner les classes associées au professeur connecté
    $req = "
        SELECT DISTINCT classe.nom, classe.année, classe.département, classe.coordinateur
        FROM classe
        INNER JOIN cours ON classe.nom = cours.classe_cours
        WHERE cours.cin_prof = :cin";

    $ps = $conn->prepare($req);
    $ps->execute(['cin' => $_SESSION['cin']]);
    // Récupérer tous les résultats de la requête
    $res = $ps->fetchAll();

    // Pagination
    $itemsPerPage = 5; // Change this value according to your preference
    $page_number = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page_number - 1) * $itemsPerPage;

    // Modify SQL query to fetch a specific range of rows
    $req .= " LIMIT $offset, $itemsPerPage";

    $ps = $conn->prepare($req);
    $ps->execute(['cin' => $_SESSION['cin']]);
    // Récupérer tous les résultats de la requête
    $res = $ps->fetchAll();

    // Count total number of records
    $countReq = "SELECT COUNT(*) AS total FROM classe INNER JOIN cours ON classe.nom = cours.classe_cours WHERE cours.cin_prof = :cin";
    $totalCount = $conn->prepare($countReq);
    $totalCount->execute(['cin' => $_SESSION['cin']]);
    $totalCount = $totalCount->fetch(PDO::FETCH_ASSOC)['total'];
    // Calculate total number of pages
    $total_pages = ceil($totalCount / $itemsPerPage);

} catch (PDOException $ex) {
    // Capturer toute erreur de connexion à la base de données
    echo "Oops erreur: " . $ex->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes classes existantes</title>
    <!-- Liens vers des fichiers CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Style CSS personnalisé -->
    <style>
        .container {
            margin-top: 10px;
        }
        .panel-heading {
            background-color: #f8f9fa;
            padding: 20px;
            border-bottom: 1px solid #dee2e6;
        }
        .panel-body {
            padding: 20px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .btn-details {
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="col-md-10 offset-md-1">
            <div class="panel panel-default" style="margin-top: 0%;">
                <div class="panel-heading">
                    <h1 style="font-size: 24px; font-weight: bold; color: #333; text-align: center">
                        <a href="Addcours.php"><i class="fas fa-plus" style="padding-right: 5%;"></i></a>Mes classes existantes
                    </h1>
                </div>
                <div class="panel-body">
                    <!-- Table to display fetched data -->
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Classe</th>
                                <th>Année</th>
                                <th>Département</th>
                                <th>Coordinateur</th>
                                <th>Cours</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($res)) : ?>
                                <?php foreach ($res as $classe) : ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($classe['nom']); ?></td>
                                        <td><?php echo htmlspecialchars($classe['année']); ?></td>
                                        <td><?php echo htmlspecialchars($classe['département']); ?></td>
                                        <td><?php echo htmlspecialchars($classe['coordinateur']); ?></td>
                                        <td>
                                            <a href="cours.php?classe_cours=<?php echo urlencode($classe['nom']); ?>" class="btn btn-success btn-details">Détails</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="5">Aucune classe trouvée pour le moment</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <!-- Pagination links -->
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <?php if ($total_pages > 1): ?>
                            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                <li class="page-item <?php if ($i == $page_number) echo 'active'; ?>">
                                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <!-- Liens vers des fichiers JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
