<?php 
require_once 'entete.php';

// Vérifier si l'email du professeur est en session
if (!isset($_SESSION['emailPerso'])) {
    echo "Erreur : Aucun professeur connecté.";
    exit;
}

$email_prof = $_SESSION['emailPerso'];

// Définir le nombre de classes par page
$classes_par_page = 10;

// Récupérer le numéro de page actuel depuis l'URL, ou définir à 1 par défaut
$page_courante = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page_courante - 1) * $classes_par_page;

try {
    // Connexion à la base de données
    $conn = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête pour récupérer le nombre total de classes
    $req_total = "
        SELECT COUNT(DISTINCT d.nom_classe) as total
        FROM devoir d
        WHERE d.gmail_prof = :email_prof
    ";
    $ps_total = $conn->prepare($req_total);
    $ps_total->execute(['email_prof' => $email_prof]);
    $total_classes = $ps_total->fetch()['total'];
    $total_pages = ceil($total_classes / $classes_par_page);

    // Requête pour récupérer les classes avec pagination
    $req_classes = "
        SELECT DISTINCT d.nom_classe
        FROM devoir d
        WHERE d.gmail_prof = :email_prof
        LIMIT :limit OFFSET :offset
    ";
    $ps_classes = $conn->prepare($req_classes);
    $ps_classes->bindParam(':email_prof', $email_prof, PDO::PARAM_STR);
    $ps_classes->bindParam(':limit', $classes_par_page, PDO::PARAM_INT);
    $ps_classes->bindParam(':offset', $offset, PDO::PARAM_INT);
    $ps_classes->execute();
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
            foreach ($classes as $classe) {
                echo '<a href="devoire.php?nom_classe=' . urlencode($classe['nom_classe']) . '" class="list-group-item list-group-item-action">' . htmlspecialchars($classe['nom_classe']) . '</a>';
            }
        } else {
            echo '<div class="alert alert-warning" role="alert">Aucune classe trouvée pour ce professeur.</div>';
        }
        ?>
    </div>
    <!-- Pagination -->
    <nav>
        <ul class="pagination justify-content-center">
            <?php if ($page_courante > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $page_courante - 1; ?>">Précédent</a>
                </li>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <li class="page-item <?php if ($i == $page_courante) echo 'active'; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
            <?php if ($page_courante < $total_pages): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $page_courante + 1; ?>">Suivant</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>
</body>
</html>
