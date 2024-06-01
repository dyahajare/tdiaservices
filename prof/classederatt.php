<?php 
  require_once 'entete.php';

  try {
      // Establishing a connection to the database
      $conn = new PDO("mysql:host=localhost;dbname=projetweb", "root", "");
      // Setting PDO to throw exceptions on error
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
      // Query to select all records from the "classe" table
      if(isset($_GET['search']) && !empty($_GET['search'])) {
        $search = $_GET['search'];
        // Requête pour rechercher une classe par son nom
        $req = "SELECT * FROM classe WHERE nom LIKE '%$search%' ";
    } else {
      $req = "SELECT * FROM classe  " ;
    }
      $ps = $conn->prepare($req);
      $ps->execute();
      // Fetching all rows from the result set
      $res = $ps->fetchAll();

      // Pagination
      $itemsPerPage = 10; // Change this value according to your preference
      $page_number = isset($_GET['page']) ? $_GET['page'] : 1;
      $offset = ($page_number - 1) * $itemsPerPage;

      // Modify SQL query to fetch a specific range of rows
      $req .= " LIMIT $offset, $itemsPerPage";

      $ps = $conn->prepare($req);
      $ps->execute();
      // Fetching all rows from the result set
      $res = $ps->fetchAll();

      // Count total number of records
      $countReq = "SELECT COUNT(*) AS total FROM classe";
      $totalCount = $conn->query($countReq)->fetch(PDO::FETCH_ASSOC)['total'];
      // Calculate total number of pages
      $total_pages = ceil($totalCount / $itemsPerPage);

  } catch (PDOException $ex) {
      // Catching any database connection errors
      echo "Oops erreur: " . $ex->getMessage();
  }
?>

<!-- Your existing HTML code goes here -->

<!-- HTML content to display the fetched data -->
<div class="container">
    <div class="table-responsive">
        <table class="table table-striped">
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
                                    <a href="rattrapage.php?nom_classe=<?php echo $classe['nom']; ?>" class="btn btn-success">voir</a>
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

<!-- Other HTML content continues here -->

</body>
</html>
