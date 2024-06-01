<?php
// Inclusion du fichier d'en-tête
require_once 'entete.php';

// Vérification de la présence du paramètre 'nom_classe' dans l'URL
if (isset($_GET['nom_classe'])) {
    $nom_classe = $_GET['nom_classe'];

    // Définir le nombre d'enregistrements par page
    $records_per_page = 10; 
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($page < 1) $page = 1; // Éviter les numéros de page invalides
    $offset = ($page - 1) * $records_per_page; // Calcul de l'offset

    try {
        // Connexion à la base de données
        $conn = new PDO("mysql:host=localhost;dbname=projetweb", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Requête pour récupérer les élèves de la classe sélectionnée avec pagination
        $req = "SELECT * FROM etudiant WHERE nom_classe = :nom_classe LIMIT :limit OFFSET :offset";
        $ps = $conn->prepare($req);
        $ps->bindParam(':nom_classe', $nom_classe, PDO::PARAM_STR);
        $ps->bindParam(':limit', $records_per_page, PDO::PARAM_INT);
        $ps->bindParam(':offset', $offset, PDO::PARAM_INT);
        $ps->execute();
        $eleves = $ps->fetchAll();

        // Requête pour compter le nombre total d'enregistrements
        $req_count = "SELECT COUNT(*) FROM etudiant WHERE nom_classe = :nom_classe";
        $ps_count = $conn->prepare($req_count);
        $ps_count->execute(['nom_classe' => $nom_classe]);
        $total_records = $ps_count->fetchColumn();
        $total_pages = ceil($total_records / $records_per_page); // Calcul du nombre total de pages

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
                        <th>abscence</th>
                        <th>certifier</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($eleves as $etudiant) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($etudiant['cne']); ?></td>
                            <td><?php echo htmlspecialchars($etudiant['nom']); ?></td>
                            <td><?php echo htmlspecialchars($etudiant['prenom']); ?></td>
                            <td class="add-absence" data-cne="<?php echo htmlspecialchars($etudiant['cne']); ?>">
                                <i class="fas fa-plus-circle"></i>
                            </td>
                            <td class="non-absence" data-cne="<?php echo htmlspecialchars($etudiant['cne']); ?>">
                                <i class="fas fa-minus-circle"></i>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <!-- Pagination -->
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item <?php if ($page <= 1) echo 'disabled'; ?>">
                        <a class="page-link" href="?nom_classe=<?php echo urlencode($nom_classe); ?>&page=<?php echo $page - 1; ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                        <li class="page-item <?php if ($i == $page) echo 'active'; ?>">
                            <a class="page-link" href="?nom_classe=<?php echo urlencode($nom_classe); ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>
                    <li class="page-item <?php if ($page >= $total_pages) echo 'disabled'; ?>">
                        <a class="page-link" href="?nom_classe=<?php echo urlencode($nom_classe); ?>&page=<?php echo $page + 1; ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Scripts JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.add-absence').click(function() {
                var cne = $(this).attr('data-cne');
                $.ajax({
                    type: "POST",
                    url: "update_absence.php",
                    data: { cne: cne },
                    success: function(response) {
                        alert(response);
                        // Actualiser la page ou toute autre logique nécessaire
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        
            $('.non-absence').click(function() {
                var cne = $(this).attr('data-cne');
                $.ajax({
                    type: "POST",
                    url: "update_certifie.php",
                    data: { cne: cne },
                    success: function(response) {
                        alert(response);
                        // Actualiser la page ou toute autre logique nécessaire
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
</body>
</html>
