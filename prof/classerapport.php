<?php 

  require_once'entete.php';
  
  
 ?>


  <!-- Your existing HTML code goes here -->

  <!-- PHP code to fetch and display data -->
  <?php
  try {
      // Establishing a connection to the database
      $conn = new PDO("mysql:host=localhost;dbname=projetweb", "root", "");
      // Setting PDO to throw exceptions on error
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      if(isset($_GET['search']) && !empty($_GET['search'])) {
        $search = $_GET['search'];
        // Requête pour rechercher une classe par son nom
        $req = "SELECT * FROM classe WHERE nom LIKE '%$search%' ";
    } else {
      // Query to select all records from the "stage" table
           $req = "SELECT * FROM classe";
    }
      $ps = $conn->prepare($req);
      $ps->execute();
      // Fetching all rows from the result set
      $res = $ps->fetchAll();
  } catch (PDOException $ex) {
      // Catching any database connection errors
      echo "Oops erreur: " . $ex->getMessage();
  }
  ?>

  <!-- HTML content to display the fetched data -->
  <div class="container mt-5 p-0" >
      <div class="col-md-10 offset-md-1 " style="padding:0%; padding-right:0%">
          <div class="panel panel-default  >
              <div class="panel-heading ">
                  <h1 style="font-size: 24px; font-weight: bold; color: #333; text-align: center">mes classes existants </h1>
              </div>
              <div class="panel-body">
                  <!-- Table to display fetched data -->
                  <table class="table table-hover table-responsive" style="overflow-x: auto;">
                      <thead>
                          <tr>
                              <th>classe</th>
                            
                      </thead>
                      <tbody>
                          <?php
                          // Checking if any records are fetched
                          if (!empty($res)) {
                              foreach ($res as $classe) {
                          ?>
                                  <tr>
                                      <td><?php echo $classe['nom']; ?></td>
                                      
                                     
                                      <td colspan="2">
                                             <a href="rapport.php?nom_classe=<?php echo $classe['nom']; ?>" class="btn btn-success" >détails</a>
                                             <a href="abloadnote.php?nom=<?php echo $classe['nom']; ?>"  class="btn btn-danger">a.note</a>



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
                  <script>
   
</script>

              </div>
          </div>
      </div>
  </div>

  <!-- Other HTML content continues here -->

</body>
</html>

 