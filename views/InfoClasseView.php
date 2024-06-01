<?php
class InfoClasseView {
    public static function render($nom, $profileImage, $prenom, $classeDetails, $modulesNotes, $buttonValue) {
        ?>
        <!doctype html>
        <html lang="en">
          <head>
            <title>Title</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="../css/pageAdmin.css">
            <script src="https://kit.fontawesome.com/6059183beb.js" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
          </head>
          <body>
            <div class="container-fluid ">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-0 col-xs-0 sidebar" id="t1">
                        <div id="t2">
                          <cite>E-service Admin</cite>
                        </div>
                        <br>
                        <br>
                        <br>
                        <div id="t3">
                            <img src="../uploads/<?php echo htmlspecialchars($profileImage, ENT_QUOTES, 'UTF-8'); ?>" height="100" width="100" id="r2">
                            <br>
                            <small><?php echo htmlspecialchars($nom, ENT_QUOTES, 'UTF-8') . " " . htmlspecialchars($prenom, ENT_QUOTES, 'UTF-8'); ?></small>
                        </div>
                        <br>
                        <br>
                        <hr>
                        <table class="table table-lg" >
                            <tbody>
                                <tr>
                                    <th style="padding-left: 10%;">
                                        <i class="fa-solid fa-house" style="color:  #FFE4C4;"></i>
                                        <a href="../controllers/AdminController.php" style="text-decoration: none;color: #FFE4C4;font-weight:normal;padding-left: 10%;">Home</a>
                                    </th>
                                </tr>
                                <tr>
                                    <th style="padding-left: 10%;">
                                          <i class="fa-solid fa-address-card" style="color:  #FFE4C4;"></i>
                                          <a href="../controllers/AjoutEtudiantController.php" style="text-decoration: none;color: #FFE4C4;font-weight: normal;padding-left: 7%;">Ajout des étudiants</a>
                                    </th>
                                </tr>
                                <tr>
                                    <th style="padding-left: 10%;">
                                        <i class="fa-solid fa-bullhorn" style="color:  #FFE4C4;"></i>
                                        <a href="../controllers/GestionAnnoncesController.php" style="text-decoration: none;color: #FFE4C4;font-weight: normal;padding-left: 7%;">Gestion des annonces</a>
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                       <div id="r4">
                                        <i class="fa-solid fa-clipboard" style="color:  #FFE4C4;"></i>
                                        <a href="../controllers/NiveauxController.php" style="text-decoration: none;color: #FFE4C4;font-weight: normal;padding-left: 10%;">Gestion des notes</a>
                                       </div>
                                    </th>                            
                                </tr>
                                <tr>
                                    <th style="padding-left: 10%;">
                                        <i class="fa-solid fa-angles-up" style="color: #FFE4C4;"></i>
                                        <a href="../controllers/NiveauxController.php" style="text-decoration: none;color: #FFE4C4;font-weight:normal;font-size: 15px; padding-left: 10%;">Les niveaux</a>
                                    </th>
                                </tr>
                                <tr>
                                    <th style="padding-left: 10%;">
                                        <i class="fa-solid fa-file-pen" style="color:  #FFE4C4;padding-left: 1px;"></i>
                                        <a href="../controllers/GestionDemandeController.php" style="text-decoration: none;color: #FFE4C4;font-size: 95%; font-weight: normal; padding-left: 5%;">Gestion des demandes</a>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                        <br>
                        <br><br>
                        <br><br>
                        <br><br>
                        <div style="padding-bottom: 0;display: flex;justify-content: space-between;align-items: center;">
                            <div class="dropup">
                                <i class="fa-solid fa-gear" style="color:  #FFE4C4;" id="menuButton"></i>
                                <div id="menuContent" class="menu-content">
                                   <a href="../controllers/DeconnexionController.php">Se déconnecter</a>
                                   <a href="../controllers/InfoController.php">Mon profil</a>
                                </div>
                            </div>
                            <img src="../images/abdelmalek_saadi-removebg-preview.png" height="70px" width="70px">
                        </div>
                    </div>
                    <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12" id="d1">
                        <nav class="navbar navbar-expand-lg" id="s1">
                            <div style="display: flex;align-items: center;">
                                <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <div class="input-group pl-5">
                                            <input type="text" class="form-control" placeholder="search">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button" style="width: 100%;"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item d-none d-md-block">
                                    <a class="navbar-brand pr-5 pl-2"><?php echo"Bonjour " . $nom ." " . $prenom ?></a>
                                </li>
                           </ul>
                           <ul class="navbar-nav ml-auto">
                                <li class="nav-item d-none d-md-block">
                                   <i class="fas fa-bell fa-fw"></i>
                                    </li>
                           </ul>
                           <ul class="navbar-nav ml-auto">
                              <li class="nav-item d-none d-md-block">
                                 <i class="fas fa-envelope"></i>
                              </li>
                           </ul>
                           <ul class="navbar-nav ml-auto">
                              <li class="nav-item d-none d-md-block">
                                <img src="../images/Capture_d_écran_2024-03-28_224640-removebg-preview.png" width="40px" height="40px">
                            </li>
                           </ul>
                        </nav>
                        <br>
                        <table class="table table-dark table-responsive full-width-table" style="margin-left: 20%;margin-top: 5%;width:50%;text-align:center;">
                            <thead id="tableHead" style="text-align:center;font-family:Arial, Helvetica, sans-serif"></thead>
                            <tbody>
                                <tr>
                                    <th style="width: 50%;">
                                        <h6>Liste des étudiants</h6>
                                    </th>
                                    <th></th>
                                    <th style="width: 50%;">
                                    <?php 
                                        if (!empty($classeDetails['ListeEtudiant'])) {
                                            echo "<a href='../uploads/" . $classeDetails['ListeEtudiant'] . "' download='ListeEtudiant.pdf'>Télécharger PDF</a>";
                                        } else {
                                            echo "Aucune liste d'étudiants disponible";
                                        }
                                    ?>
                                    </th>
                                </tr>
                                <tr>
                                    <th style="width: 50%;">
                                        <h6>Emploi du temps</h6>
                                    </th>
                                    <th></th>
                                    <th style="width: 50%;">
                                    <?php 
                                        if (!empty($classeDetails['EmploiDeTemps'])) {
                                            echo "<a href='../uploads/". $classeDetails['EmploiDeTemps'] . "' download='emploiDeTemps.pdf'>Télécharger PDF</a>" ;
                                        } else {
                                            echo "Aucun emploi du temps disponible";
                                        }
                                    ?>
                                    </th>
                                </tr>
                            </tbody>
                            <tfoot><tr ><th colspan="5" class="centered-button" ><a class="btn btn-warning"  href="../controllers/ModifInfoClasseController.php?buttonValue=<?php echo urlencode($buttonValue); ?>">Modifier</a></th></tr></tfoot>
                        </table>
                        <table class="table table-dark table-responsive full-width-table" style="margin-left: 20%;width:50%;text-align:center;">
                            <thead style="text-align:center;font-family:Arial, Helvetica, sans-serif"><tr><td style="padding-left: 45%;">Notes</td></tr></thead>
                            <tbody>
                                    <?php 
                                        foreach ($modulesNotes as $module) {
                                            echo "<tr>";
                                            echo "<th style='width: 50%;'>" . $module['nom_module'] . "</th>";
                                            if (!empty($module['notes'])) {
                                                echo "<th style='width: 50%;'><a href='../uploads/" . $module['notes'] . "' download='note.pdf'>Télécharger PDF</a></th>";
                                            } else {
                                                echo "<th style='width: 50%;'><h6>Notes indisponible</h6></th>";
                                            }
                                            echo "<th></th>";
                                            echo "</tr>";
                                        }
                                    ?>
                            </tbody>
                            <tfoot><tr ><th colspan="6" class="centered-button" >
                                <?php if ($classeDetails['Note'] == 0) : ?>
                                    <form method="post">
                                        <button class='btn btn-success' type='submit' name='afficher' onclick='validerDemande("<?php echo $buttonValue; ?>")' id='valider_<?php echo $buttonValue; ?>'>Afficher</button>
                                    </form>
                                <?php else : ?>
                                <span>Affichées</span>
                                <?php endif; ?>
                            </th></tr></tfoot>
                        </table>
                    </div>
                </div>
            </div>
            <script>
                $.ajax({
                   url: '../controllers/InfoClasseController.php', 
                   type: 'GET',
                   data: { buttonValue: "<?php echo $buttonValue; ?>" },
                   success: function(response) {
                      console.log(response);
                   }
                });
                var urlParams = new URLSearchParams(window.location.search);
                var buttonValue = urlParams.get('buttonValue');

                var tableHead = document.getElementById('tableHead');
                var newRow = tableHead.insertRow(0);
                var newCell = newRow.insertCell(0);
                newCell.textContent = buttonValue;

                document.getElementById("sidebarToggleTop").addEventListener("click", function() {
                   var sidebar = document.getElementById("t1");
                   sidebar.classList.toggle("show");
                });
                document.getElementById("menuButton").addEventListener("click", function() {
                  var menu = document.getElementById("menuContent");
                  if (menu.classList.contains("show")) {menu.classList.remove("show");}
                  else {menu.classList.add("show"); }
                });
                function redirectToPage(destination, value) {
                    window.location.href = destination + "?buttonValue=" + encodeURIComponent(value);
                }
                window.validerDemande = function(idDemande) {
                $.ajax({
                    type: "POST",
                    url: "../controllers/InfoClasseController.php",
                    data: { buttonValue: idDemande },
                    success: function(response) {
                        $("#valider_" + idDemande).replaceWith("<span>Affichées</span>");
                    },
                    error: function(xhr, status, error) {
                        console.log("Erreur lors de la mise à jour: " + error);
                    }
                });
                }
            </script>
          </body>
        </html>
        <?php
    }
}
?>
