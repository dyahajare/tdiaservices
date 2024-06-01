<?php 

require_once 'entete.php';

// Establishing a connection to the database
try {
    $conn = new PDO("mysql:host=localhost;dbname=projetweb", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Pagination configuration
    $records_per_page = 10;
    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? $_GET['page'] : 1;
    $offset = ($page - 1) * $records_per_page;

    // Query to select all records from the "classe" table with pagination
    if(isset($_GET['search']) && !empty($_GET['search'])) {
        $search = $_GET['search'];
        // Requête pour rechercher une classe par son nom
        $req = "SELECT * FROM classe WHERE nom LIKE '%$search%' LIMIT :offset, :records_per_page";
    } else {
        $req = "SELECT * FROM classe LIMIT :offset, :records_per_page";
    }
    $ps = $conn->prepare($req);
    $ps->bindParam(':offset', $offset, PDO::PARAM_INT);
    $ps->bindParam(':records_per_page', $records_per_page, PDO::PARAM_INT);
    $ps->execute();
    $res = $ps->fetchAll();

    // Counting total records for pagination
    $total_records = $conn->query("SELECT COUNT(*) FROM classe")->fetchColumn();
    $total_pages = ceil($total_records / $records_per_page);
} catch (PDOException $ex) {
    echo "Oops erreur: " . $ex->getMessage();
}
?>

<!-- Your existing HTML code goes here -->

<!-- HTML content to display the fetched data -->
<div class="container mt-5 p-0">
    <div class="col-md-10 offset-md-1" style="padding:0%; padding-right:0%">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1 style="font-size: 24px; font-weight: bold; color: #333; text-align: center">mes classes existants</h1>
            </div>
            <div class="panel-body">
                <!-- Table to display fetched data -->
                <table class="table table-hover table-responsive" style="overflow-x: auto;">
                    <thead>
                        <tr>
                            <th>classe</th>
                            <th>capacite</th>
                            <th>année</th>
                            <th>département</th>
                            <th>coordinateur</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Checking if any records are fetched
                        if (!empty($res)) {
                            foreach ($res as $classe) {
                        ?>
                                <tr>
                                    <td><?php echo $classe['nom']; ?></td>
                                    <td><?php echo $classe['capaciteMax']; ?></td>
                                    <td><?php echo $classe['année']; ?></td>
                                    <td><?php echo $classe['département']; ?></td>
                                    <td><?php echo $classe['coordinateur']; ?></td>
                                    <td>
                                        <a href="eleveh.php?nom_classe=<?php echo $classe['nom']; ?>" class="btn btn-success">détails</a>
                                        <a href="abloadnote.php?nom=<?php echo $classe['nom']; ?>" class="btn btn-danger">a.note</a>
                                    </td>
                                </tr>
                        <?php
                            }
                        } else {
                        ?>
                            <tr>
                                <td colspan="6">Aucun classe trouvé pour le moment</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Pagination links -->
        <ul class="pagination justify-content-center">
            <li class="page-item <?php if ($page <= 1) echo 'disabled'; ?>">
                <a class="page-link" href="?page=<?php echo $page - 1; ?>">Précédent</a>
            </li>
            <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                <li class="page-item <?php if ($page == $i) echo 'active'; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
            <li class="page-item <?php if ($page >= $total_pages) echo 'disabled'; ?>">
                <a class="page-link" href="?page=<?php echo $page + 1; ?>">Suivant</a>
            </li>
        </ul>
    </div>
</div>
