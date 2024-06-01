<!-- File: views/AdminView.php -->
<!doctype html>
<html lang="en">
<head>
    <title>Page Admin</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pageAdmin.css">
    <script src="https://kit.fontawesome.com/6059183beb.js" crossorigin="anonymous"></script>
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
                                <i class="fa-solid fa-file-pen" style="color: #FFE4C4;padding-left: 1px;"></i>
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
                <br>
                <div style="color: #FFE4C4; background-color: rgba(19, 19, 97, 0.4); border-radius: 20px; padding: 10%; display: flex; align-items: center; width: auto; flex-wrap: wrap;">
                    <div style="padding-right: 20%;">
                        <h2 style="border-style: solid; border-width: 2px; border-color: rgba(51, 103, 207, 0.4);">Téléchargement de document Excel</h2>
                        <br>
                        <img src="../images/OIP-removebg-preview.png" style="width: 300px; height: auto;">
                    </div>
                    <div style="width: 100%; max-width: 300px;padding-top: 5%;">
                        <form id="excelForm" action="../src/ajoutEtudiant1.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="excelFile">Sélectionner un fichier Excel :</label>
                                <input type="file" id="excelFile" name="excelFile" accept=".xls,.xlsx,.csv" style="display: none;">
                                <label for="excelFile" id="fileInputLabel" accept=".xls,.xlsx,.csv" style="cursor: pointer; background-color:white; color: black; padding: 10px; border-radius: 5px; display: inline-block;">Choisir un fichier</label>
                                <br>
                                <small>Formats acceptés : .xls, .xlsx,.csv</small>
                            </div>
                            <br>
                            <div id="fileNameDisplay"></div>
                            <br>
                            <button type="submit" style="border-radius: 9px; background-color: #FFE4C4; color: black;padding-left: 20%;">Télécharger</button>
                        </form>
                        <br>
                        <div id="responseMessage" class="alert d-none"></div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
    <script>
        document.getElementById("sidebarToggleTop").addEventListener("click", function() {
            var sidebar = document.getElementById("t1");
            sidebar.classList.toggle("show");
        });

        document.getElementById('excelFile').addEventListener('change', function() {
            var fileNameDisplay = document.getElementById('fileNameDisplay');
            if (this.files.length > 0) {
                fileNameDisplay.textContent = 'Fichier sélectionné : ' + this.files[0].name;
            } else {
                fileNameDisplay.textContent = ''; // Clear file name display if no file selected
            }
        });

        document.getElementById('excelFile').addEventListener('change', function() {
            var fileNameDisplay = document.getElementById('fileNameDisplay');
            var fileInputLabel = document.getElementById('fileInputLabel');
            
            if (this.files.length > 0) {
                fileNameDisplay.textContent = 'Fichier sélectionné : ' + this.files[0].name;
            } else {
                fileNameDisplay.textContent = '';
                fileInputLabel.style.opacity = '1'; // Restore default opacity
                fileInputLabel.style.pointerEvents = 'auto'; // Reactivate pointer events
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

        document.getElementById('excelForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(this);
            fetch('../src/ajoutEtudiant1.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                const responseMessage = document.getElementById('responseMessage');
                responseMessage.classList.remove('d-none', 'alert-success', 'alert-danger');
                if (data.status === 'success') {
                    responseMessage.classList.add('alert-success');
                    responseMessage.textContent = data.message;
                } else {
                    responseMessage.classList.add('alert-danger');
                    responseMessage.textContent = data.message;
                }
            })
            .catch(error => {
                const responseMessage = document.getElementById('responseMessage');
                responseMessage.classList.remove('d-none', 'alert-success');
                responseMessage.classList.add('alert-danger');
                responseMessage.textContent = 'Erreur ! Veuillez réessayer.';
                console.error('Error:', error);
            });
        });
    </script>
</body>
</html>
