<!doctype html>
<html lang="en">
  <head>
    <title>Gestion des Niveaux</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/pageAdmin.css">
    <script src="https://kit.fontawesome.com/6059183beb.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                    <img src="../uploads/<?php echo htmlspecialchars($user->profileImage, ENT_QUOTES, 'UTF-8'); ?>" height="100" width="100" id="r2">
                    <br>
                    <small><?php echo htmlspecialchars($user->nom, ENT_QUOTES, 'UTF-8') . " " . htmlspecialchars($user->prenom, ENT_QUOTES, 'UTF-8'); ?></small>
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
                            <a class="navbar-brand pr-5 pl-2"><?php echo "Bonjour " . htmlspecialchars($user->nom, ENT_QUOTES, 'UTF-8') . " " . htmlspecialchars($user->prenom, ENT_QUOTES, 'UTF-8'); ?></a>
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
                <table class="table table-dark table-responsive" style="width: 85%;color: rgb(107, 106, 106);margin-left: 8%;margin-top:5%;" >
                    <thead><tr><th colspan="6" style="text-align:right;"><h4>Les niveaux</h4></th></tr></thead>
                    <tbody>
                        <tr>
                            <th colspan="4" style="width: 30%;"><h4>CPs</h4></th>
                            <th>
                                <a class="table-button" style="background-color:rgb(139, 240, 209);border-radius: 15px;width: 100%;" href="../controllers/InfoClasseController.php?buttonValue=CP1">CP1</a>
                            </th>
                            <th>
                                <a class="table-button" style="background-color:rgb(179, 139, 240);border-radius: 15px;width: 100%; " href="../controllers/InfoClasseController.php?buttonValue=CP2">CP2</a>
                            </th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th  colspan="4"style="width: 30%;"><h4>Génie informatique</h4></th>
                            <th>
                                <a class="table-button" class="table-button"style="background-color:rgb(139, 240, 209);border-radius: 15px;width: 100%;"  href="../controllers/InfoClasseController.php?buttonValue=GI1">GI1</a>
                            </th>
                            <th>
                                <a class="table-button" style="background-color:rgb(179, 139, 240);border-radius: 15px;width: 100%;"  href="../controllers/InfoClasseController.php?buttonValue=GI2">GI2</a>
                            </th>
                            <th>
                                <a class="table-button" style="background-color:rgb(240, 139, 163);border-radius: 15px;width: 100%;"  href="../controllers/InfoClasseController.php?buttonValue=GI3-BI">GI3-BI</a>
                            </th>
                            <th>
                                <a class="table-button" style="background-color:rgb(240, 139, 163);border-radius: 15px;width: 100%;" href="../controllers/InfoClasseController.php?buttonValue=GI3-GL">GI3-GL</a>
                            </th>
                            <th>
                                <a class="table-button" style="background-color:rgb(240, 139, 163);border-radius: 15px;width: 100%;" href="../controllers/InfoClasseController.php?buttonValue=GI3-MI">GI3-MI</a>
                            </th>
                        </tr>
                        <tr>
                            <th  colspan="4" style="width: 30%;"><h4>Ingénieurie des données</h4></th>
                            <th>
                                <a class="table-button" style="background-color:rgb(139, 240, 209);border-radius: 15px;width: 100%;" href="../controllers/InfoClasseController.php?buttonValue=ID1">ID1</a>
                            </th>
                            <th>
                                <a class="table-button" style="background-color:rgb(179, 139, 240);border-radius: 15px;width: 100%;" href="../controllers/InfoClasseController.php?buttonValue=ID2">ID2</a>
                            </th>
                            <th>
                                <a class="table-button" style="background-color:rgb(240, 139, 163);border-radius: 15px;width: 100%;" href="../controllers/InfoClasseController.php?buttonValue=ID3">ID3</a>
                            </th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th colspan="4" style="width: 30%;"><h4>Transformation digitale et intelligence artificielle</h4></th>
                            <th>
                                <a class="table-button" style="background-color:rgb(139, 240, 209);border-radius: 15px;width: 100%;" href="../controllers/InfoClasseController.php?buttonValue=TDIA1">TDIA1</a>
                            </th>
                            <th>
                                <a class="table-button" style="background-color:rgb(179, 139, 240);border-radius: 15px;width: 100%;" href="../controllers/InfoClasseController.php?buttonValue=TDIA2">TDIA2</a>
                            </th>
                            <th>
                                <a class="table-button" style="background-color:rgb(240, 139, 163);border-radius: 15px;width: 100%;" href="../controllers/InfoClasseController.php?buttonValue=TDIA3">TDIA3</a>
                            </th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th  colspan="4" style="width: 30%;"><h4>Génie Civil</h4></th>
                            <th>
                                <a class="table-button" style="background-color:rgb(139, 240, 209);border-radius: 15px;width: 100%;" href="../controllers/InfoClasseController.php?buttonValue=GC1">GC1</a>
                            </th>
                            <th>
                                <a class="table-button" style="background-color:rgb(179, 139, 240);border-radius: 15px;width: 100%;" href="../controllers/InfoClasseController.php?buttonValue=GC2">GC2</a>
                            </th>
                            <th>
                                <a class="table-button" style="background-color:rgb(240, 139, 163);border-radius: 15px;width: 100%;" href="../controllers/InfoClasseController.php?buttonValue=GC3-HYD">GC-HYD</a>
                            </th>
                            <th>
                                <a class="table-button" style="background-color:rgb(240, 139, 163);border-radius: 15px;width: 100%;" href="../controllers/InfoClasseController.php?buttonValue=GC3-BPC">GC-BPC</a>
                            </th>
                            <th></th>
                        </tr>
                        <tr>
                            <th  colspan="4" style="width: 30%;"><h4>Génie Enérgitique et énérgies renouvelables</h4></th>
                            <th>
                                <a class="table-button" style="background-color:rgb(139, 240, 209);border-radius: 15px;width: 100%;" href="../controllers/InfoClasseController.php?buttonValue=GEER1">GEER1</a>
                            </th>
                            <th>
                                <a class="table-button" style="background-color:rgb(179, 139, 240);border-radius: 15px;width: 100%;" href="../controllers/InfoClasseController.php?buttonValue=GEER2">GEER2</a>
                            </th>
                            <th>
                                <a class="table-button" style="background-color:rgb(240, 139, 163);border-radius: 15px;width: 100%;" href="../controllers/InfoClasseController.php?buttonValue=GEER3">GEER3</a>
                            </th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th colspan="4" style="width: 30%;"><h4>Génie de l'Eau et de l'Environnement</h4></th>
                            <th>
                                <a class="table-button" style="background-color:rgb(139, 240, 209);border-radius: 15px;width: 100%;" href="../controllers/InfoClasseController.php?buttonValue=GEE1">GEE1</a>
                            </th>
                            <th>
                                <a class="table-button" style="background-color:rgb(179, 139, 240);border-radius: 15px;width: 100%;" href="../controllers/InfoClasseController.php?buttonValue=GEE2">GEE2</a>
                            </th>
                            <th>
                                <a class="table-button" style="background-color:rgb(240, 139, 163);border-radius: 15px;width: 100%;" href="../controllers/InfoClasseController.php?buttonValue=GEE3">GEE3</a>
                            </th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>
                            <th colspan="4" style="width: 30%;"><h4>Génie Mécanique</h4></th>
                            <th>
                                <a class="table-button" style="background-color:rgb(139, 240, 209);border-radius: 15px;width: 100%;" href="../controllers/InfoClasseController.php?buttonValue=GM1">GM1</a>
                            </th>
                            <th>
                                <a class="table-button" style="background-color:rgb(179, 139, 240);border-radius: 15px;width: 100%;" href="../controllers/InfoClasseController.php?buttonValue=GM2">GM2</a>
                            </th>
                            <th>
                                <a class="table-button" style="background-color:rgb(240, 139, 163);border-radius: 15px;width: 100%;" href="../controllers/InfoClasseController.php?buttonValue=GM3">GM3</a>
                            </th>
                            <th></th>
                            <th></th>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <script>
        document.getElementById("sidebarToggleTop").addEventListener("click", function() {
          var sidebar = document.getElementById("t1");
           sidebar.classList.toggle("show");
        });
    document.getElementById("menuButton").addEventListener("click", function() {
          var menu = document.getElementById("menuContent");
          if (menu.classList.contains("show")) {menu.classList.remove("show");}
          else {menu.classList.add("show"); }
        });
    </script>
    
  </body>
</html>
