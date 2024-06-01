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
  
      // Query to select all records from the "stage" table
      $req = "SELECT classe.id AS classe_id, classe.nom AS classe_nom, etudiant.*
            FROM classe
            LEFT JOIN etudiant ON classe.id = etudiant.ide";
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
                  <h1 style="font-size: 24px; font-weight: bold; color: #333; text-align: center">mes classes existants <a href="addstage.php" style="position: absolute; left:20px;"><i class="fas fa-plus"></i></a></h1>
              </div>
              <div class="panel-body">
                  <!-- Table to display fetched data -->
                  <table class="table table-hover table-responsive" style="overflow-x: auto;">
                      <thead>
                          <tr>
                              <th>cne</th>
                              <th>nom</th>
                              <th>prénom</th>
                              <th>née</th>
                              <th>ville</th>
                              <th>p.gmail</th>
                              <th>a.gmail</th>
                          </tr>
                      </thead>
                      <tbody>
                          <?php
                          // Checking if any records are fetched
                          if (!empty($res)) {
                              foreach ($res as $etudiant) {
                          ?>
                                  <tr>
                                      <td><?php echo  $etudiant['cne']; ?></td>
                                      <td><?php echo  $etudiant['nom']; ?></td>
                                      <td><?php echo  $etudiant['prenom']; ?></td>
                                      <td><?php echo  $etudiant['dateNaissance']; ?></td>
                                      <td><?php echo  $etudiant['villeNaissance']; ?></td>
                                      <td><?php echo  $etudiant['emailPerso']; ?></td>
                                      <td><?php echo  $etudiant['emailAcadémique']; ?></td>
                                     
                                    

                                  </tr>
                          <?php
                              }
                          } else {
                          ?>
                              <tr>
                                  <td colspan="6">Aucun eleve trouvé pour le moment</td>
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

 