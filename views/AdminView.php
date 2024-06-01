<!-- File: views/AdminView.php -->
<!doctype html>
<html lang="en">
<head>
    <title>Page Admin</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pageAdmin.css">
    <script src="https://kit.fontawesome.com/6059183beb.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-2 col-sm-0 col-xs-0 sidebar" id="t1">
                <div id="t2">
                  <cite>E-service Admin</cite>
                </div>
                <br><br><br>
                <div id="t3">
                    <img src="../uploads/<?php echo htmlspecialchars($profileImage, ENT_QUOTES, 'UTF-8'); ?>" height="100" width="100" id="r2">
                    <br>
                    <small><?php echo htmlspecialchars($nom, ENT_QUOTES, 'UTF-8') . " " . htmlspecialchars($prenom, ENT_QUOTES, 'UTF-8'); ?></small>
                </div>
                <br><br>
                <hr>
                <table class="table table-lg">
                    <tbody>
                        <tr>
                            <th style="padding-left: 10%;">
                                <i class="fa-solid fa-house" style="color:  #FFE4C4;"></i>
                                <a href="pageAdmin.php" style="text-decoration: none;color: #FFE4C4;font-weight:normal;padding-left: 10%;">Home</a>
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
                <br><br><br><br><br><br><br><br>
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
                  <br>
                <div id="box" class="d-flex flex-column flex-md-row">
                    <button style="background-color:rgb(128, 160, 208);border-radius: 15px;" class="mb-2 mb-md-0 mr-md-2" onclick="window.location.href='../controllers/AjoutEtudiantController.php'">
                        <i class="fa-solid fa-address-card" style="color: rgb(171, 169, 169);padding-right: 5%;"></i>
                        <h6 style="font-size:14px;">Lancer l'inscription</h6>
                    </button>
                    <button style="background-color:rgb(52, 189, 182);border-radius: 10px;" class="mb-2 mb-md-0 mr-md-2 " onclick="window.location.href='../controllers/GestionAnnoncesController.php'">
                        <i class="fa-solid fa-bullhorn" style="color: rgb(171, 169, 169);padding-right: 8%;"></i>
                        <h6>Annonces</h6>
                    </button>
                    <button style="background-color:rgb(39, 139, 39);border-radius: 10px;" class="mb-2 mb-md-0 mr-md-2" onclick="window.location.href='../controllers/NiveauxController.php'">
                        <i class="fa-solid fa-clipboard" style="color: rgb(171, 169, 169);padding-right: 8%;"></i>
                        <h6>Notes</h6>
                    </button>
                    <button style="background-color:rgb(239, 239, 39);border-radius: 10px;" class="mb-2 mb-md-0 mr-md-2" onclick="window.location.href='../controllers/GestionPersonnelController.php'">
                        <i class="fa-solid fa-users" style="color: rgb(171, 169, 169);padding-right:8%;"></i>
                        <h6>Personnels</h6>
                    </button>
                </div>
                <br>
                <div class="row" style="display: flex;justify-content: space-between;">
                    <div class="col-xl-4 col-md-12">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12">
                                <div class="card shadow" style="background-color: rgba(19, 19, 97, 0.4);border-radius: 20px;">
                                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                        <hr>
                                        <h6 class="m-0 font-weight-bold" style="color: #FFE4C4;">Actualités</h6>
                                        <hr>
                                    </div>
                                    <div class="card-body">
                                        <div class="card-body">
                                            <?php 
                                                include '../connect.php';
                                                $req = $conn->query("SELECT * FROM actualité LIMIT 4");
                                                while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
                                                    echo '<div class="row"><div class="row"><div class="col-12 text-white">' . htmlspecialchars($row['titre_actu'], ENT_QUOTES, 'UTF-8') . '<br></div></div></div>';
                                                    echo '<hr>';
                                                }
                                            ?>
                                            <div class="mt-1 text-center small">
                                                <span class="mr-1">
                                                    <i class="fas fa-circle text-info"></i> <a href="../controllers/GestionAnnoncesController.php"> Lire plus d'actualités</a> 
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow col-xl-7" style="background-color:#FFE4C4;margin-right: 3%;">
                        <div class="card-header py-2">
                            <h6 class="m-0 font-weight-bold text-primary">Statistiques d'accès à eServices</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-area">
                                <canvas id="myAreaChart" style="display: block;" class="chartjs-render-monitor"></canvas>
                            </div>
                        </div>
                     </div>
                </div> 
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.5.3/js/bootstrap.bundle.min.js"></script>
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myAreaChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Janvier-Fevrier', 'Mars-Avril', 'Mai-Juin', 'Juillet-Aout', 'Septembre-Octobre', 'Novembre-Decembre'],
                datasets: [{
                    label: 'nombre de connexions',
                    data: [500, 150, 500, 100, 300, 400],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

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
