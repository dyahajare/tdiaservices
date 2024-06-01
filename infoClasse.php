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
    $buttonValue = $_GET['buttonValue'];
    $req=$conn->prepare("SELECT * from classe WHERE nom=:buttonValue");
    $req->bindParam(':buttonValue', $buttonValue);
    $req->execute();
    $row = $req->fetch(PDO::FETCH_ASSOC);
    $req1 = $conn->prepare("SELECT nom_module, notes FROM modules WHERE nom_classe = :buttonValue");
    $req1->bindParam(':buttonValue', $buttonValue);
    $req1->execute();
    if(isset($_POST['afficher'])){
        $req = $conn->prepare("UPDATE classe SET Note = 1 WHERE nom = :nom"); // Modifier pour utiliser l'ID de la demande
        $req->bindParam(':nom', $buttonValue);
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                                if (!empty($row['ListeEtudiant'])) {
                                    echo "<a href='uploads/" . $row['ListeEtudiant'] . "' download='ListeEtudiant.pdf'>Télécharger PDF</a>";
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
                                if (!empty($row['EmploiDeTemps'])) {
                                    echo "<a href='uploads/". $row['EmploiDeTemps'] . "' download='emploiDeTemps.pdf'>Télécharger PDF</a>" ;
                                } else {
                                    echo "Aucun emploi du temps disponible";
                                }
                            ?>
                            </th>
                        </tr>
                    </tbody>
                    <tfoot><tr ><th colspan="5" class="centered-button" ><a class="btn btn-warning"  href="modifInfoClasse.php?buttonValue=<?php echo urlencode($buttonValue); ?>">Modifier</a></th></tr></tfoot>
                </table>
                <table class="table table-dark table-responsive full-width-table" style="margin-left: 20%;width:50%;text-align:center;">
                    <thead style="text-align:center;font-family:Arial, Helvetica, sans-serif"><tr><td style="padding-left: 45%;">Notes</td></tr></thead>
                    <tbody>
                            <?php 
                                while ($row1 = $req1->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<tr>";
                                    echo "<th style='width: 50%;'>" . $row1['nom_module'] . "</th>";
                                    if (!empty($row1['notes'])) {
                                        echo "<th style='width: 50%;'><a href='uploads/" . $row1['notes'] . "' download='note.cvs'>Télécharger PDF</a></th>";
                                    } else {
                                        echo "<th style='width: 50%;'><h6>Notes indisponible</h6></th>";
                                    }
                                    echo "<th></th>";
                                    echo "</tr>";
                                }
                            ?>
                    </tbody>
                    <tfoot><tr ><th colspan="6" class="centered-button" >
                        <?php if ($row['Note'] == 0) : ?>
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
           url: 'infoClasse.php', // Le chemin vers votre script PHP
           type: 'GET', // ou 'GET' selon votre méthode HTTP
           data: { buttonValue: buttonValue }, // Les données à envoyer, incluant buttonValue
           success: function(response) {
              // Traitez la réponse ici
              console.log(response); // Par exemple, log la réponse dans la console
           }
        });
        var urlParams = new URLSearchParams(window.location.search);
        var buttonValue = urlParams.get('buttonValue');

        // Affiche la valeur récupérée dans le <thead>
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
            url: "infoClasse.php",
            data: { buttonValue: idDemande },
            success: function(response) {
                // Si la mise à jour est réussie, remplacer le bouton par "Affichées"
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