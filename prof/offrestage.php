<?php 

require_once 'entete.php';

try {
    // Establishing a connection to the database
    $conn = new PDO("mysql:host=localhost;dbname=projetweb", "root", "");
    // Setting PDO to throw exceptions on error
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Define the number of records per page
    $records_per_page =8;

    // Retrieve the current page number from the URL, or set it to 1 by default
    $page_number = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $offset = ($page_number - 1) * $records_per_page;

    // Query to select all records from the "stage" table with pagination
    $req = "SELECT * FROM stage LIMIT :limit OFFSET :offset";
    $ps = $conn->prepare($req);
    $ps->bindParam(':limit', $records_per_page, PDO::PARAM_INT);
    $ps->bindParam(':offset', $offset, PDO::PARAM_INT);
    $ps->execute();
    // Fetching all rows from the result set
    $res = $ps->fetchAll();

    // Query to count the total number of records
    $total_req = "SELECT COUNT(*) as total FROM stage";
    $total_ps = $conn->prepare($total_req);
    $total_ps->execute();
    $total_result = $total_ps->fetch();
    $total_records = $total_result['total'];
    $total_pages = ceil($total_records / $records_per_page);
} catch (PDOException $ex) {
    // Catching any database connection errors
    echo "Oops erreur: " . $ex->getMessage();
}
?>

<!-- HTML content to display the fetched data -->
<div class="container mt-5 p-0">
    <div class="table-responsive">
        <table class="table table-striped">
            <a href="addstage.php" style="position: absolute; "><i class="fas fa-plus"  style="left: 30%;"> </i></a> 
            <h1 style="font-size: 24px; font-weight: bold; color: #333; text-align: center">Liste des stages existants</h1>
        </table>
    </div>
    <div class="panel-body">
        <!-- Table to display fetched data -->
        <table class="table table-hover table-responsive" style="overflow-x: auto;">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Type</th>
                    <th>Offre</th>
                    <th>Début</th>
                    <th>Lien</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Checking if any records are fetched
                if (!empty($res)) {
                    foreach ($res as $stage) {
                ?>
                        <tr>
                            <td><?php echo $stage['nom_stage']; ?></td>
                            <td><?php echo $stage['type_stage']; ?></td>
                            <td><?php echo $stage['offre_stage']; ?></td>
                            <td><?php echo $stage['durée_stage']; ?></td>
                            <td><?php echo $stage['lien_offre']; ?></td>
                            <td colspan="2">
                                <a href="moddfstage.php?nom_stage=<?php echo $stage['nom_stage']; ?>" class="btn btn-success" >modifier</a>
                                <a href="supstage.php?nom_stage=<?php echo $stage['nom_stage']; ?>" onclick="confirm('Etes vous sûre de vouloir supprimer !!!')" class="btn btn-danger">Supprimer</a>
                            </td>
                        </tr>
                <?php
                    }
                } else {
                ?>
                    <tr>
                        <td colspan="6">Aucun stage trouvé pour le moment</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Pagination -->
    <nav>
        <ul class="pagination justify-content-center">
            <?php if ($page_number > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="?page=<?php echo $page_number - 1; ?>">Précédent</a>
                </li>
            <?php endif; ?>
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
        </ul>
    </nav>
</div>
