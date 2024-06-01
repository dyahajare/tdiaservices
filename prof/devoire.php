<?php 

require_once 'entete.php';

// Vérifier si l'email du professeur est en session
if (!isset($_SESSION['emailPerso'])) {
    echo "Erreur : Aucun professeur connecté.";
    exit;
}

$email_prof = $_SESSION['emailPerso'];

if (!isset($_GET['nom_classe']) || empty($_GET['nom_classe'])) {
    echo "Erreur : Aucun nom de classe spécifié.";
    exit;
}

$nom_classe = $_GET['nom_classe'];
$records_per_page = 10; // Nombre d'enregistrements par page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1; // Éviter les numéros de page invalides
$offset = ($page - 1) * $records_per_page; // Calcul de l'offset

try {
    // Connexion à la base de données
    $conn = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête pour récupérer les devoirs de la classe spécifiée avec pagination
    $req_devoirs = "
        SELECT * 
        FROM devoir 
        WHERE gmail_prof = :email_prof 
        AND nom_classe = :nom_classe
        LIMIT :limit OFFSET :offset
    ";
    $ps_devoirs = $conn->prepare($req_devoirs);
    $ps_devoirs->bindParam(':email_prof', $email_prof, PDO::PARAM_STR);
    $ps_devoirs->bindParam(':nom_classe', $nom_classe, PDO::PARAM_STR);
    $ps_devoirs->bindParam(':limit', $records_per_page, PDO::PARAM_INT);
    $ps_devoirs->bindParam(':offset', $offset, PDO::PARAM_INT);
    $ps_devoirs->execute();
    $devoirs = $ps_devoirs->fetchAll();

    // Requête pour compter le nombre total d'enregistrements
    $req_count = "
        SELECT COUNT(*) 
        FROM devoir 
        WHERE gmail_prof = :email_prof 
        AND nom_classe = :nom_classe
    ";
    $ps_count = $conn->prepare($req_count);
    $ps_count->execute([
        'email_prof' => $email_prof,
        'nom_classe' => $nom_classe
    ]);
    $total_records = $ps_count->fetchColumn();
    $total_pages = ceil($total_records / $records_per_page); // Calcul du nombre total de pages

} catch (PDOException $ex) {
    echo "Erreur: " . $ex->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tableau Devoir</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Tableau Devoir</h1>
    <table class="table table-hover table-responsive">
        <thead>
            <tr>
                <th>CNE</th>
                <th>Nom Étudiant</th>
                <th>Prénom Étudiant</th>
                <th>Gmail Prof</th>
                <th>Nom Classe</th>
                <th>Document</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($devoirs)) {
                foreach ($devoirs as $devoir) {
                    echo "<tr>
                            <td>" . htmlspecialchars($devoir['cne']) . "</td>
                            <td>" . htmlspecialchars($devoir['nom_etudiant']) . "</td>
                            <td>" . htmlspecialchars($devoir['prenom_etudiant']) . "</td>
                            <td>" . htmlspecialchars($devoir['gmail_prof']) . "</td>
                            <td>" . htmlspecialchars($devoir['nom_classe']) . "</td>
                            <td>";
                    if (!empty($devoir['document'])) {
                        echo "<a href='pfetelech.php?file=" . urlencode($devoir['document']) . "' class='btn btn-primary'>
                                <i class='fas fa-download'></i> 
                              </a>";
                    } else {
                        echo "Pas de devoir";
                    }
                    echo "</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>Aucun devoir trouvé pour cette classe.</td></tr>";
            }
            ?>
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

<!-- Scripts Bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
