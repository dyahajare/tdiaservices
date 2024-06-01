<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/pageAdmin.css">
    <script src="https://kit.fontawesome.com/6059183beb.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container-fluid">
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
                <table class="table table-lg">
                    <tbody>
                        <tr>
                            <th style="padding-left: 10%;">
                                <i class="fa-solid fa-house" style="color: #FFE4C4;"></i>
                                <a href="../controllers/AdminController.php" style="text-decoration: none;color: #FFE4C4;font-weight:normal;padding-left: 10%;">Home</a>
                            </th>
                        </tr>
                        <tr>
                            <th style="padding-left: 10%;">
                                <i class="fa-solid fa-address-card" style="color: #FFE4C4;"></i>
                                <a href="../controllers/AjoutEtudiantController.php" style="text-decoration: none;color: #FFE4C4;font-weight: normal;padding-left: 7%;">Ajout des étudiants</a>
                            </th>
                        </tr>
                        <tr>
                            <th style="padding-left: 10%;">
                                <i class="fa-solid fa-bullhorn" style="color: #FFE4C4;"></i>
                                <a href="../controllers/GestionAnnoncesController.php" style="text-decoration: none;color: #FFE4C4;font-weight: normal;padding-left: 7%;">Gestion des annonces</a>
                            </th>
                        </tr>
                        <tr>
                            <th>
                                <div id="r4">
                                    <i class="fa-solid fa-clipboard" style="color: #FFE4C4;"></i>
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
                                <i class="fa-solid fa-file-pen" style="color: #FFE4C4;padding-left: 1px;"></i>
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
                        <i class="fa-solid fa-gear" style="color: #FFE4C4;" id="menuButton"></i>
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
                            <a class="navbar-brand pr-5 pl-2"><?php echo "Bonjour " . htmlspecialchars($nom, ENT_QUOTES, 'UTF-8') . " " . htmlspecialchars($prenom, ENT_QUOTES, 'UTF-8'); ?></a>
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
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="card" style="background-color: rgb(19, 19, 97);margin-top: 5%;">
                                <div class="card-header" style="color: #FFE4C4;text-align: center;"><h4>Ma fiche</h4></div>
                                <div class="card-body">
                                    <table class="table table-dark">
                                        <thead>
                                            <tr>
                                                <th colspan="2" style="text-align: center;">
                                                    <h4>IDENTIFICATION DE L'ADMIN</h4>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Nom :</td>
                                                <td><?php echo htmlspecialchars($nom, ENT_QUOTES, 'UTF-8'); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Prénom :</td>
                                                <td><?php echo htmlspecialchars($prenom, ENT_QUOTES, 'UTF-8'); ?></td>
                                            </tr>
                                            <tr>
                                                <td>CIN :</td>
                                                <td><?php echo htmlspecialchars($cin, ENT_QUOTES, 'UTF-8'); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Sexe :</td>
                                                <td><?php echo htmlspecialchars($sexe, ENT_QUOTES, 'UTF-8'); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Situation Familiale :</td>
                                                <td><?php echo htmlspecialchars($situationFamiliale, ENT_QUOTES, 'UTF-8'); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Statut :</td>
                                                <td><?php echo htmlspecialchars($statut, ENT_QUOTES, 'UTF-8'); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-dark">
                                        <thead>
                                            <tr>
                                                <th colspan="2">
                                                    <h4>COORDONNEES DE L'ADMIN</h4>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Numéro de téléphone:</td>
                                                <td><?php echo htmlspecialchars($telephone, ENT_QUOTES, 'UTF-8'); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email Professionnel:</td>
                                                <td><?php echo htmlspecialchars($emailPro, ENT_QUOTES, 'UTF-8'); ?></td>
                                            </tr>
                                            <tr>
                                                <td>Email Personnel:</td>
                                                <td><?php echo htmlspecialchars($emailPerso, ENT_QUOTES, 'UTF-8'); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <button class="btn btn-warning btn-block" onclick="window.location.href='../controllers/ModifInfoController.php?cin=<?php echo htmlspecialchars($cin, ENT_QUOTES, 'UTF-8'); ?>'">Modifier vos coordonnées</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <img alt="image" src="../uploads/<?php echo htmlspecialchars($profileImage, ENT_QUOTES, 'UTF-8'); ?>" class="img-fluid" style="padding-left:40%; margin-top: 12%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("menuButton").addEventListener("click", function() {
            var menu = document.getElementById("menuContent");
            if (menu.classList.contains("show")) {
                menu.classList.remove("show");
            } else {
                menu.classList.add("show");
            }
        });
        document.getElementById("sidebarToggleTop").addEventListener("click", function() {
            var sidebar = document.getElementById("t1");
            sidebar.classList.toggle("show");
        });
    </script>
  </body>
</html>
