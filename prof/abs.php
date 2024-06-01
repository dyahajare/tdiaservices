<?php
require_once 'entete.php';

try {
    // Établir une connexion à la base de données
    $conn = new PDO("mysql:host=localhost;dbname=projetweb", "root", "");
    // Définir PDO pour lancer des exceptions en cas d'erreur
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Initialiser une variable de recherche vide
    $search = "";

    // Vérifier si une recherche est effectuée
    if(isset($_GET['search']) && !empty($_GET['search'])) {
        $search = $_GET['search'];
        // Requête pour rechercher une classe par son nom
        $req = "SELECT * FROM classe WHERE nom LIKE '%$search%' ";
    } else {
        // Requête pour sélectionner toutes les classes si aucune recherche n'est effectuée
        $req = "SELECT * FROM classe";
    }

    // Define pagination variables
    $itemsPerPage = 10; // Change this value according to your preference
    $page_number = isset($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page_number - 1) * $itemsPerPage;

    // Modify SQL query to fetch a specific range of rows
    $req .= " LIMIT $offset, $itemsPerPage";

    $ps = $conn->prepare($req);
    $ps->execute();
    // Récupérer tous les résultats de la requête
    $res = $ps->fetchAll();

    // Count total number of records
    $countReq = "SELECT COUNT(*) AS total FROM classe";
    $totalCount = $conn->query($countReq)->fetch(PDO::FETCH_ASSOC)['total'];
    // Calculate total number of pages
    $total_pages = ceil($totalCount / $itemsPerPage);

} catch (PDOException $ex) {
    // Capturer toute erreur de connexion à la base de données
    echo "Oops erreur: " . $ex->getMessage();
}
?>
<!-- Your existing HTML code goes here -->

<!-- HTML content to display the fetched data -->
<div class="container mt-5 p-0">
    <div class="col-md-10 offset-md-1" style="padding:0%; padding-right:0%">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 style="font-size: 24px; font-weight: bold; color: #333; text-align: center">mes classes existantes</h1>
            </div>
            <div class="panel-body">
                <br>
                <!-- Table to display fetched data -->
                <table class="table table-hover table-responsive" style="overflow-x: auto;">
                    <!-- Table header -->
                    <thead>
                        <tr>
                            <th>Classe</th>
                            <th>Capacité</th>
                            <th>Année</th>
                            <th>Département</th>
                            <th>Coordinateur</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <!-- Table body -->
                    <tbody>
                        <?php
                        // Check if any records are fetched
                        if (!empty($res)) {
                            foreach ($res as $classe) {
                        ?>
                                <tr>
                                    <td><?php echo $classe['nom']; ?></td>
                                    <td><?php echo $classe['capaciteMax']; ?></td>
                                    <td><?php echo $classe['année']; ?></td>
                                    <td><?php echo $classe['département']; ?></td>
                                    <td><?php echo $classe['coordinateur']; ?></td>
                                    <td colspan="2">
                                        <a href="aff.php?nom_classe=<?php echo $classe['nom']; ?>" class="btn btn-success">Détails</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                        ?>
                            <tr>
                                <td colspan="6">Aucune classe trouvée pour le moment</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <!-- Pagination links -->
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <?php if ($total_pages > 1): ?>
                            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                <li class="page-item <?php if ($i == $page_number) echo 'active'; ?>">
                                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                </li>
                            <?php endfor; ?>
                            <?php if ($page_number < $total_pages): ?>
                                <li class="page-item">
                                    <a class="page-link" href="?page=<?php echo $page_number + 1; ?>">Suivant</a>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Other HTML content continues here -->

</body>
</html>
