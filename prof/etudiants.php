<?php 

  require_once'C:\xampp\htdocs\entete.php';
  require_once'C:\xampp\htdocs\gestionetudiante.php';

  $req = "SELECT * FROM etudiant";
  $ps = $conn->prepare($req);
  $ps->execute();
  $res = $ps->fetchAll();

?>
<div class="container mt-5">
   <div class="col-md-10 col-md-offset-1">
       <div class="panel panel-default">
           <div class="panel-heading">Liste des étudiants</div>
                <div class="panel-body">
                    <!-- Table qui liste l'ensemble des étudiants -->
                        <table class="table table-hover">
                             <thead>
                                <tr>
                                    <th>#ID</th> <th>Nom</th> <th>Email</th> <th>Photo</th>
                                </tr>
                             </thead>
                             <tbody>
                                <?php foreach ($res as $etdiant){ ?>
                                <tr>
                                  <td> <?php echo $etdiant['id']; ?> </td>
                                  <td> <?php echo $etdiant['nom']; ?></td> 
                                  <td> <?php echo $etdiant['email']; ?> </td> 
                                  <td>
                                      <img src="C:\xampp\htdocs\static\<?php echo $etdiant['photo']; ?>" width="100" height="100" />
                                  </td>
                                  
                                 
                                
                                  <td colspan="2">
                                            
                                            <a href="editEtd.php?id=<?php echo $etdiant['id']; ?>" class="btn btn-success">Editer</a>
                                            <a href="supprimerEtd.php?id=<?php echo $etdiant['id']; ?>" onclick="confirm('Etes vous sûre de vouloir supprimer !!!')" class="btn btn-danger">Supprimer</a>
                                           
                                  </td>
                                </tr>
                              <?php } ?>
                            </tbody>
                        </table>
                </div>
        </div>
    </div>
</div>
 