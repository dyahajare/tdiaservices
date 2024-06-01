<?php 

require_once 'entete.php';

// Vérifier si l'email du professeur est en session
if (!isset($_SESSION['emailPerso'])) {
    echo "Erreur : Aucun professeur connecté.";
    exit;
}

$email_prof = $_SESSION['emailPerso'];

if (!isset($_GET['classe_pfa']) || empty($_GET['classe_pfa'])) {
    echo "Erreur : Aucun nom de classe spécifié.";
    exit;
}

$nom_classe = $_GET['classe_pfa'];

try {
    // Connexion à la base de données
    $conn = new PDO('mysql:host=localhost;dbname=projetweb', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Define the number of records per page
    $records_per_page = 10;

    // Retrieve the current page number from the URL, or set it to 1 by default
    $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page_number - 1) * $records_per_page;

    // Requête pour récupérer les PFE de la classe spécifiée avec pagination
    $req_pfas = "
        SELECT * 
        FROM pfa
        WHERE email_encadrant = :email_prof 
        AND classe_pfa = :nom_classe
        LIMIT :limit OFFSET :offset
    ";
    $ps_pfas = $conn->prepare($req_pfas);
    $ps_pfas->bindParam(':email_prof', $email_prof, PDO::PARAM_STR);
    $ps_pfas->bindParam(':nom_classe', $nom_classe, PDO::PARAM_STR);
    $ps_pfas->bindParam(':limit', $records_per_page, PDO::PARAM_INT);
    $ps_pfas->bindParam(':offset', $offset, PDO::PARAM_INT);
    $ps_pfas->execute();
    $pfas = $ps_pfas->fetchAll();

    // Requête pour compter le nombre total de PFA
    $total_req = "
        SELECT COUNT(*) as total 
        FROM pfa
        WHERE email_encadrant = :email_prof 
        AND classe_pfa = :nom_classe
    ";
    $total_ps = $conn->prepare($total_req);
    $total_ps->execute([
        'email_prof' => $email_prof,
        'nom_classe' => $nom_classe
    ]);
    $total_result = $total_ps->fetch();
    $total_records = $total_result['total'];
    $total_pages = ceil($total_records / $records_per_page);
} catch (PDOException $ex) {
    echo "Erreur: " . $ex->getMessage();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tableau PFA</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Tableau PFA</h1>
    <table class="table table-hover table-responsive">
        <thead>
            <tr>
                <th>Titre</th>
                <th>cne</th>
                <th>Filière</th>
                <th>Résumé</th>
                <th>Promotion</th>
                <th>Document</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($pfas)) {
                foreach ($pfas as $pfa) {
                    echo "<tr>
                            <td>" . htmlspecialchars($pfa['titre']) . "</td>
                            <td>" . htmlspecialchars($pfa['cne']) . "</td>
                            <td>" . htmlspecialchars($pfa['filiere']) . "</td>
                            <td>" . htmlspecialchars($pfa['pfa_resume']) . "</td>
                            <td>" . htmlspecialchars($pfa['promotion']) . "</td>
                            <td>";
                    if (!empty($pfa['document'])) {
                        echo "<a href='pfetelech.php?file=" . urlencode($pfa['document']) . "' class='btn btn-primary'>
                                <i class='fas fa-download'></i> 
                              </a>";
                    } else {
                        echo "Pas de document";
                    }
                    echo "</td>
                            
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='8'>Aucun PFA trouvé pour cette classe.</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <nav>
        <ul class="pagination justify-content-center">
            <?php if ($page_number > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?classe_pfa=<?php echo $nom_classe; ?>&page=<?php echo $page_number - 1; ?>">Précédent</a>
                </li>
            <?php endif; ?>
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <li class="page-item <?php if ($i == $page_number) echo 'active'; ?>">
                    <a class="page-link" href="?classe_pfa=<?php echo $nom_classe; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
            <?php if ($page_number < $total_pages): ?>
                <li class="page-item">
                    <a class="page-link" href="?classe_pfa=<?php echo $nom_classe; ?>&page=<?php echo $page_number + 1; ?>">Suivant</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</div>
</body>
</html>
