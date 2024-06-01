<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="pageAdmin.css">
    <script src="https://kit.fontawesome.com/6059183beb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <!-- Inclure les styles de DataTables depuis un CDN (optionnel) -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
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
                    <img src="1.jpeg" height="100" width="100" id="r2">
                    <br>
                    <small>Admin's name</small>
                </div>
                <br>
                <br>
                <hr>
                <table class="table table-lg" style="width: 10%;">
                    <tbody>
                        <tr>
                            <th style="padding-left: 10%;">
                                <i class="fa-solid fa-house" style="color:  #FFE4C4;"></i>
                                <a href="pageAdmin.html" style="text-decoration: none;color: #FFE4C4;font-weight: normal;padding-left: 10%;">Home</a>
                            </th>
                        </tr>
                        <tr>
                            <th >
                                <div id="r3">
                                  <i class="fa-solid fa-address-card" style="color:  #FFE4C4;position: absolute;"></i>
                                  <select class="form-select m-0" id="inscriptionSelect">
                                     <option disabled selected >Inscription</option>
                                     <option style="color: black;"><a href="lancerReinscription.html">Lancer la réinscription</a></option>
                                     <option style="color: black;"><a href="AjoutEtudiant.html">Ajout des etudiants</a></option>
                                  </select>
                               </div>
                            </th>
                        </tr>
                        <tr>
                            <th style="padding-left: 10%;">
                                <i class="fa-solid fa-bullhorn" style="color:  #FFE4C4;"></i>
                                <a href="gestionAnnonces.html" style="text-decoration: none;color: #FFE4C4;font-weight: normal;padding-left: 7%;">Gestion des annonces</a>
                            </th>
                        </tr>
                        <tr>
                            <th >
                               <div id="r4">
                                <i class="fa-solid fa-clipboard" style="color:  #FFE4C4;position: absolute;"></i>
                                <select class="form-select m-0 " id="noteSelect" style="padding-left: 20%;">
                                    <option disabled selected>Gestion des notes</option>
                                    <option style="color: black;"><a href="calculNotes.html">Calcul des notes</a></option>
                                    <option style="color: black;"><a href="">Envoi des notes</a></option>
                                </select>
                               </div>
                            </th>                            
                        </tr>
                        <tr>
                            <th style="padding-left: 10%;">
                                <i class="fa-solid fa-angles-up" style="color: #FFE4C4;"></i>
                                <a href="classe.html" style="text-decoration: none;color: #FFE4C4;font-weight:normal;font-size: 15px; padding-left: 10%;">Les niveaux</a>
                            </th>
                        </tr>
                        <tr>
                            <th style="padding-left: 10%;">
                                <i class="fa-solid fa-file-pen" style="color:  #FFE4C4;padding-left: 1px;"></i>
                                <a href="gestionDemande.html" style="text-decoration: none;color: #FFE4C4;font-size: 95%; font-weight: normal; padding-left: 5%;">Gestion des demandes</a>
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
                           <a href="#">Se déconnecter</a>
                           <a href="Info.html">Mon profil</a>
                        </div>
                    </div>
                    <img src="abdelmalek_saadi-removebg-preview.png" height="70px" width="70px">
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
                            <a class="navbar-brand pr-5 pl-2">Bonjour admin's name</a>
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
                        <img src="Capture_d_écran_2024-03-28_224640-removebg-preview.png" width="40px" height="40px">
                    </li>
                   </ul>
                </nav>
                <br>
                <br>
                <div class="table-responsive">
                    <table class="table table-dark" id="tableAnnonces" style="width: 80%; margin-left: 10%;">
                        <thead class="table-group-divider">
                            <tr>
                                <th colspan="4" style="text-align: center;">Gestion des annonces</th>
                            </tr>
                        </thead>

                        <tbody class="table-group-divider">
                            <?php 
                                include 'connect.php';
                                $req = $conn->query("SELECT * FROM actualité");
                                while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<tr>";
                                    echo "<td>" . $row['titre_actu'] . "</td>";
                                    echo "<td>" . $row['msg_actu'] . "</td>";
                                    if ($row['type_img'] === 'pdf') {
                                        echo "<td><a href='uploads/" . $row['img_actu'] . "' download='annonce.pdf'>Télécharger PDF</a></td>";
                                    } else {
                                        echo "<td><img src='uploads/" . $row['img_actu'] ."' alt='Image' width=200px height=200px></td>";
                                    }                              
                                  echo  "<td>";
                                  echo "<div><a class='btn btn-warning' href='modifAnnonce.php?titr=" . urlencode($row['titre_actu'])."'>Modifier</a></div>";
                                  echo  "</td>";
                                  echo  "<td>";
                                  echo "<a class='btn btn-danger' href='supAnnonce.php?titre=" . urlencode($row['titre_actu']) . "' onclick='return confirm(\"Êtes-vous sûr de vouloir supprimer cette annonce ?\")'>Supprimer</a>";
                                  echo  "</td>";
                                  echo "</tr>";
                                }
                            ?>
                        </tbody>                        
                        <tfoot>
                            <tr>
                                <td colspan="4" style="text-align: right;">
                                    <div class="btn btn-success" onclick="window.location.href='ajoutAnnonce.php';">Ajouter une annonce</div>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                
            </div>
        </div>
    </div>
    <script>
        document.getElementById("inscriptionSelect").addEventListener("change", function() {
            var selectedOption = this.value;
            if (selectedOption === "Lancer l'inscription/réinscription") {
                window.location.href = "lancerReinscription.html";
            }
            if (selectedOption === "Ajout des etudiants") {
                window.location.href = "AjoutEtudiant.html";
            }
           });
           document.getElementById("noteSelect").addEventListener("change", function() {
            var selectedOption = this.value;
            if (selectedOption === "Calcul des notes") {
                window.location.href = "calculNotes.html";
            }
            if (selectedOption === "Envoi des notes") {
                window.location.href = "envoieNotes.html";
            }
        });
       document.getElementById("sidebarToggleTop").addEventListener("click", function() {
          var sidebar = document.getElementById("t1");
          sidebar.classList.toggle("show");
       });
       document.getElementById("menuButton").addEventListener("click", function() {
          var menu = document.getElementById("menuContent");
          if (menu.classList.contains("show")) {menu.classList.remove("show");}
          else {menu.classList.add("show"); }
        });
        $(document).ready(function() {
            $('#tableAnnonces').DataTable({
                "paging": true, // Activer la pagination
                "lengthChange": false, // Désactiver le choix du nombre d'éléments par page
                "searching": true, // Activer la recherche
                "ordering": true, // Activer le tri
                "info": true, // Afficher les informations sur la pagination
                "autoWidth": false // Désactiver le redimensionnement automatique des colonnes
            });
        });

    

    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

 </body>
</html>
