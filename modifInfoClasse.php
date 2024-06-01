<?php
require_once 'connect.php';
$buttonValue = '';
// Vérifiez si le paramètre 'buttonValue' est dans $_GET ou $_POST
if (isset($_GET['buttonValue'])) {
    $buttonValue = htmlspecialchars($_GET['buttonValue']);
} elseif (isset($_POST['buttonValue'])) {
    $buttonValue = htmlspecialchars($_POST['buttonValue']);
} else {
    die("Paramètre 'buttonValue' manquant.");
}
if (isset($_POST['submit'])) {
    // Gestion du téléchargement des fichiers
    $img = '';
    if (isset($_FILES['listeEtudiant']) && $_FILES['listeEtudiant']['error'] === UPLOAD_ERR_OK) {
        $destination = 'uploads/';
        $cheminDestination = $destination . basename($_FILES['listeEtudiant']['name']);
        if (move_uploaded_file($_FILES['listeEtudiant']['tmp_name'], $cheminDestination)) {
            $img = $_FILES['listeEtudiant']['name'];
        }
    } else {
        $sql = "SELECT ListeEtudiant FROM classe WHERE nom = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$buttonValue]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result && isset($result['ListeEtudiant'])) {
            $img = $result['ListeEtudiant'];
        }
    }

    $img1 = '';
    if (isset($_FILES['EmploiDeTemps']) && $_FILES['EmploiDeTemps']['error'] === UPLOAD_ERR_OK) {
        $destination = 'uploads/';
        $cheminDestination = $destination . basename($_FILES['EmploiDeTemps']['name']);
        if (move_uploaded_file($_FILES['EmploiDeTemps']['tmp_name'], $cheminDestination)) {
            $img1 = $_FILES['EmploiDeTemps']['name'];
        }
    } else {
        $sql = "SELECT EmploiDeTemps FROM classe WHERE nom = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$buttonValue]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result && isset($result['EmploiDeTemps'])) {
            $img1 = $result['EmploiDeTemps'];
        }
    }

    $img2 = '';
    if (isset($_FILES['Note']) && $_FILES['Note']['error'] === UPLOAD_ERR_OK) {
        $destination = 'uploads/';
        $cheminDestination = $destination . basename($_FILES['Note']['name']);
        if (move_uploaded_file($_FILES['Note']['tmp_name'], $cheminDestination)) {
            $img2 = $_FILES['Note']['name'];
        }
    } else {
        $sql = "SELECT Note FROM classe WHERE nom = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$buttonValue]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result && isset($result['Note'])) {
            $img2 = $result['Note'];
        }
    }

    // Préparer la requête de mise à jour
    $sql = "UPDATE classe SET ListeEtudiant = ?, EmploiDeTemps = ?, Note = ? WHERE nom = ?";
    $stmt = $conn->prepare($sql);
    $params = array($img, $img1, $img2, $buttonValue);
    $stmt->execute($params);

    // Redirection après la mise à jour
    echo '<script>window.location.href = "infoClasse.php?buttonValue=' . urlencode($buttonValue) . '";</script>';
    exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="pageAdmin.css">
    <script src="https://kit.fontawesome.com/6059183beb.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                <div class="card" style="background-color: rgba(19, 19, 97, 0.4); margin: 5%;margin-left: 20%; padding: 5%; border-radius: 10px; max-width: 700px;">
                    <div class="card-header">
                        <h2 style="color: #FFE4C4;text-align:center;">Modification :</h2>
                    </div>
                    <div class="card-body">
                    <form action="modifInfoClasse.php?buttonValue=<?php echo $buttonValue ?>" method="post" enctype="multipart/form-data" style="color: #FFE4C4;">
                            <input type="hidden" name="buttonValue" value="<?php echo htmlspecialchars($buttonValue); ?>">
                            <div class="form-group">
                                <label for="listeEtudiant">Liste des etudiants:</label>
                                <input type="file" class="form-control" name="listeEtudiant">
                            </div>
                            <div class="form-group">
                                <label for="EmploiDeTemps">Emploi De Temps:</label>
                                <input type="file" class="form-control" name="EmploiDeTemps">
                            </div>
                            <div class="form-group">
                                <label for="Note">Notes:</label>
                                <input type="file" class="form-control" name="Note">
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn" style="background-color: #FFE4C4;">Modifier</button>
                            </div>
                        </form>
                    </div>
                </div>   
            </div>
        </div>    
    </div>
    <script>
        document.getElementById("inscriptionSelect").addEventListener("change", function() {
            var selectedOption = this.value;
            if (selectedOption === "Lancer la réinscription") {
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
       var urlParams = new URLSearchParams(window.location.search);
       var buttonValue = urlParams.get('buttonValue');
       $.ajax({
           url: 'modifInfoClasse.php', // Le chemin vers votre script PHP
           type: 'POST', // ou 'POST' selon votre méthode HTTP
           data: { buttonValue: buttonValue }, // Les données à envoyer, incluant buttonValue
           success: function(response) {
               // Traitez la réponse ici
               console.log(response); // Par exemple, log la réponse dans la console
            }
        });
    </script>
  </body>
</html>