<?php
include_once 'connect.php';
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
// Vérifiez que le paramètre 'titr' est bien défini
if (isset($_GET['titr'])) {
    $annonce_titre = urldecode($_GET['titr']);

    $req = $conn->prepare("SELECT * FROM actualité WHERE titre_actu = ?");
    $req->bindParam(1, $annonce_titre);
    $req->execute();
    $annonce = $req->fetch(PDO::FETCH_ASSOC);
}

// Si le formulaire est soumis
if (isset($_POST['submit'])) {
    $nom = htmlspecialchars($_POST['titre']);
    $description = htmlspecialchars($_POST['description']);
    $type_img = htmlspecialchars($_POST['type_img']);
    $ancien_titre = htmlspecialchars($_POST['titr']);
    $img = ''; // Valeur par défaut pour l'image

    // Gestion du téléchargement de l'image
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $destination = 'uploads/';
        $cheminDestination = $destination . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $cheminDestination)) {
            $img = $_FILES['image']['name'];
        }
    } else {
        // Conserver l'ancienne image si aucune nouvelle image n'est téléchargée
        $sql = "SELECT img_actu FROM actualité WHERE titre_actu = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$ancien_titre]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $img = $result['img_actu'];
    }

    // Préparer la requête de mise à jour
    $sql = "UPDATE actualité SET titre_actu = ?, msg_actu = ?, type_img = ?, img_actu = ? WHERE titre_actu = ?";
    $stmt = $conn->prepare($sql);
    $params = array($nom, $description, $type_img, $img, $ancien_titre);
    $stmt->execute($params);

    // Redirection après la mise à jour
    echo '<script>window.location.href = "gestionAnnonces.php";</script>';
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
                <div class="card" style="background-color: rgba(19, 19, 97, 0.4); width: 60%; margin: 5%;margin-left:20%; border-radius: 10px;">
                    <div class="card-header">
                      <h4 style="color: #FFE4C4;">Modification de l'annonce :</h4>
                   </div>
                   <div class="card-body">
                   <form action="modifAnnonce.php?titr=<?php echo urlencode($annonce_titre); ?>" method="POST" enctype="multipart/form-data" style="color: #FFE4C4;">
                            <input type="hidden" name="titr" value="<?php echo htmlspecialchars($annonce_titre); ?>">
                            <div class="form-group">
                                <label for="titre">Titre :</label>
                                <input type="text" id="titre" name="titre" required class="form-control" value="<?php echo htmlspecialchars($annonce['titre_actu']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="Description">Description :</label>
                                <textarea rows="4" cols="40" name="description" class="form-control"><?php echo htmlspecialchars($annonce['msg_actu']); ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="type_img">Type d'image :</label>
                                <select name="type_img" id="type_img" class="form-control">
                                    <option value="pdf" <?php echo ($annonce['type_img'] == 'pdf') ? 'selected' : ''; ?>>pdf</option>
                                    <option value="img" <?php echo ($annonce['type_img'] == 'img') ? 'selected' : ''; ?>>img</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image">Image :</label>
                                <?php if ($annonce['type_img'] === 'pdf'): ?>
                                    <a href="uploads/<?php echo htmlspecialchars($annonce['img_actu']); ?>" download>Télécharger PDF</a>
                                <?php else: ?>
                                    <img src="uploads/<?php echo htmlspecialchars($annonce['img_actu']); ?>" alt="Image" width="200px" height="200px">
                                <?php endif; ?>
                                <br>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="submit" class="form-control btn btn-warning" value="Modifier">
                            </div>
                        </form>
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
       document.getElementById("menuButton").addEventListener("click", function() {
          var menu = document.getElementById("menuContent");
          if (menu.classList.contains("show")) {menu.classList.remove("show");}
          else {menu.classList.add("show"); }
        });
       
    </script>
  </body>
</html>