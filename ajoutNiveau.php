<?php
include 'connect.php';
// Démarrer la session
session_start();
$session_duration = 900;
// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['emailPro'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: login.php");
    exit();
}
// Récupérer les données de session
$nom = $_SESSION['nom'];
$profileImage = $_SESSION['profileImage'];
$prenom = $_SESSION['prenom'];
$cin = $_SESSION['cin'];
$telephone = $_SESSION['telephone'];
$emailPro = $_SESSION['emailPro'];
$emailPerso = $_SESSION['emailPerso'];
$sexe = $_SESSION['sexe'];
$statut = $_SESSION['Statut'];
$situationFamiliale = $_SESSION['situationFamiliale'];
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $req=$conn->prepare("INSERT INTO classe(nom,capaciteMax,année,Note,coordinateur,nombreModule,département,ListeEtudiant,EmploiDeTemps) VALUES (:nom,:capaciteMax,:année,:Note,:coordinateur,:nombreModule,:département,:ListeEtudiant,:EmploiDeTemps) ");
    $req->bindValue(':nom',$_POST["nom"]);
    $req->bindValue(':capaciteMax',$_POST["CapacitéMax"]);
    $req->bindValue(':année',$_POST["Année"]);
    $req->bindValue(':coordinateur',$_POST["Coordinateur"]);
    $req->bindValue(':nombreModule',$_POST["nmbr"]);
    $req->bindValue(':département',$_POST["Département"]);
    $req->bindValue(':Note', $_POST["Note"] ?? null);
    $req->bindValue(':ListeEtudiant', $_POST["ListeEtudiant"] ?? null);
    $req->bindValue(':EmploiDeTemps', $_POST["EmploiDeTemps"] ?? null);
    $req->execute();
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
                    <img src="uploads/<?php echo htmlspecialchars($profileImage, ENT_QUOTES, 'UTF-8'); ?>" height="100" width="100" id="r2">
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
                                <a href="pageAdmin.php" style="text-decoration: none;color: #FFE4C4;font-weight:normal;padding-left: 10%;">Home</a>
                            </th>
                        </tr>
                        <tr>
                            <th style="padding-left: 10%;">
                                  <i class="fa-solid fa-address-card" style="color:  #FFE4C4;"></i>
                                  <a href="AjoutEtudiant.php" style="text-decoration: none;color: #FFE4C4;font-weight: normal;padding-left: 7%;">Ajout des étudiants</a>
                            </th>
                        </tr>
                        <tr>
                            <th style="padding-left: 10%;">
                                <i class="fa-solid fa-bullhorn" style="color:  #FFE4C4;"></i>
                                <a href="gestionAnnonces.php" style="text-decoration: none;color: #FFE4C4;font-weight: normal;padding-left: 7%;">Gestion des annonces</a>
                            </th>
                        </tr>
                        <tr>
                            <th>
                               <div id="r4">
                                <i class="fa-solid fa-clipboard" style="color:  #FFE4C4;"></i>
                                <a href="classe.php" style="text-decoration: none;color: #FFE4C4;font-weight: normal;padding-left: 10%;">Gestion des notes</a>
                               </div>
                            </th>                            
                        </tr>
                        <tr>
                            <th style="padding-left: 10%;">
                                <i class="fa-solid fa-angles-up" style="color: #FFE4C4;"></i>
                                <a href="classe.php" style="text-decoration: none;color: #FFE4C4;font-weight:normal;font-size: 15px; padding-left: 10%;">Les niveaux</a>
                            </th>
                        </tr>
                        <tr>
                            <th style="padding-left: 10%;">
                                <i class="fa-solid fa-file-pen" style="color:  #FFE4C4;padding-left: 1px;"></i>
                                <a href="gestionDemande.php" style="text-decoration: none;color: #FFE4C4;font-size: 95%; font-weight: normal; padding-left: 5%;">Gestion des demandes</a>
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
                           <a href="deconnexion.php">Se déconnecter</a>
                           <a href="Info.php">Mon profil</a>
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
                        <img src="Capture_d_écran_2024-03-28_224640-removebg-preview.png" width="40px" height="40px">
                    </li>
                   </ul>
                </nav>
                <br>
                <br>
                <div class="card mx-auto" style="background-color: rgba(19, 19, 97, 0.4); max-width: 700px; margin-top: 3%;">
                    <div class="card-header">
                        <h2 class="text-center" style="color: #FFE4C4;">Ajouter un niveau :</h2>
                    </div>
                    <div class="card-body">
                        <form action="ajoutNiveau.php" method="POST" style="color: #FFE4C4;">
                            <div class="form-group">
                                <label for="nom">Nom :</label>
                                <input type="text" id="nom" name="nom" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="nmbr">Nombre :</label>
                                <input type="number" id="nmbr" name="nmbr" placeholder="Nombre de modules :" oninput="addModules()" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Coordinateur">Coordinateur :</label>
                                <input type="text" id="Coordinateur" name="Coordinateur" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Département">Département :</label>
                                <input type="text" id="Département" name="Département" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="CapacitéMax">Capacité Maximale :</label>
                                <input type="number" id="CapacitéMax" name="CapacitéMax" oninput="addModules()" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="Année">Année :</label>
                                <input type="number" id="Année" name="Année"  oninput="addModules()" required class="form-control">
                            </div>
                            <div id="moduleInputs"></div>
                            <div class="text-center">
                                <button type="submit" class="btn" style="background-color: #FFE4C4;">Ajouter</button>
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
        </div>    
    </div>
    <script>
        function addModules() {
    var number = document.getElementById("nmbr").value;
    var moduleInputs = document.getElementById("moduleInputs");
    moduleInputs.innerHTML = "";

    for (var i = 0; i < number; i++) {
        var label = document.createElement("label");
        label.textContent = "Module " + (i + 1)+ " :" + " ";
        
        var input = document.createElement("input");
        input.type = "text";
        input.name = "module " + (i + 1) ;
        input.placeholder = "Nom du module";
        input.className = "module-input";


        var br = document.createElement("br");

        moduleInputs.appendChild(label);
        moduleInputs.appendChild(input);
        moduleInputs.appendChild(br);

    }
}
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