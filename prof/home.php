<?php
session_start();

// Include database connection here

try {
    // Establishing a connection to the database
    $conn = new PDO("mysql:host=localhost;dbname=projetweb", "root", "");
    // Setting PDO to throw exceptions on error
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to select all records from the "actualité" table
    $req = "SELECT * FROM actualité";
    $ps = $conn->prepare($req);
    $ps->execute();
    // Fetching all rows from the result set
    $res = $ps->fetchAll();
} catch (PDOException $ex) {
    // Catching any database connection errors
    echo "Oops erreur: " . $ex->getMessage();
}

// Pagination
$perPage = 5; // Nombre d'actualités par page
$totalPages = ceil(count($res) / $perPage); // Nombre total de pages
$page = isset($_GET['page']) ? intval($_GET['page']) : 1; // Page actuelle, par défaut 1
$offset = ($page - 1) * $perPage; // Offset pour la requête SQL

try {
    // Query to select records for the current page
    $req = "SELECT * FROM actualité LIMIT $offset, $perPage";
    $ps = $conn->prepare($req);
    $ps->execute();
    // Fetching actualités for the current page
    $res = $ps->fetchAll();
} catch (PDOException $ex) {
    // Catching any database connection errors
    echo "Oops erreur: " . $ex->getMessage();
}

// var_dump( $_SESSION['np'])

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>e-service</title>
  <!-- Inclure Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Style pour la barre de progression */
    .progress-bar {
      border-radius: 25px; /* Pour créer une limite radian */
      /* Largeur de la barre de progression supérieure à 100% */
      width: 100%; /* Ajustez cette valeur selon vos besoins */
      
    }
    html, body{
      height: 100%;
     
    }
    .messag{
            padding-top:7.5%;
    }
    .menuderoulant li {
      
      float: left;
      position: relative;
      width:230px
     
    }
    .menuderoulant li a:link, .menuderoulant li a:visited { 
      padding: 6px 10px;
      text-align: cente;

      text-decoration: none;


    }
    .menuderoulant li a:hover{background-color: #199bd2;}
    .menuderoulant li a:hover{background-color: #808080;}
    .menuderoulant .sousmenu{
            list-style-type: none;
            display: none;
            padding: 0;
            margin: 0;
            position: absolute;
            top: 50%; /* Position the sub-menu at the top of the parent item */
           left: 60%; /* Position the sub-menu to the right of the parent item */
}
    
.menuderoulant .sousmenu li {
       float: none;
       margin:0;
       padding: 0;
       
       width: 100px;
       border-top:2px solid black;
       border-radius: 2px;
       border-right: 1px solid transparent;
    }
    .menuderoulant .sousmenu li a:link, .menuderoulant li a:visited{
      display: block;
      color: #FFFFFF;
      text-decoration: none;
      background-color: #004d99;
      border-radius: 2px;
       
    }
    .menuderoulant li:hover .sousmenu {
      display:block;
      z-index: 100;
    }
    .parametres {
      left: 50%;
      position: relative;
      
    }

    .parametres .options {
      position: absolute;
      z-index: 1000;
      display: none;
      
    }

    .parametres:hover .options {
      display: block;
      text-decoration: none;
    }

    .parametres .options li {
      display: block;
      
      
    }
    .parametres:hover .options li {
          display: block;
          text-decoration: none ; /* Annuler le soulignement au survol */
        }

    @media only screen and (max-width: 768px) {
      .container {
        width: 100% !important;
       
      }  
      .a{
        display: block !important;
      }
      .btn {
        width: 100px !important;
        margin-top: 0%;
      }
      .b{
        display: block !important;
      }
      .bv{
        display: block !important;
      }
      .progress {
        width: 100% !important;
        
      }
      
      .r{
        height: 300% !important;
      }
      .d-flex{
         position: absolute !important;
          left: 140% !important;
          bottom: 90% !important;
}
      .im{
        width: 0% !important;
      }
      .btn {
         margin-bottom: 10% !important;
         margin-left: 10%;
      }
      .progress{
       height: 0%;
      }
    }
  </style>
  
  <!-- Inclure Bootstrap JS (nécessaire pour les fonctionnalités Bootstrap) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body >


  <div class="progress px-0 " style="width: 100%; padding-right:0%;" >
    <div class="progress-bar" role="progressbar" style="width: 100%;  background-color:#0F52BA;  display:flex; position:relative " >
      <div class="logo" style= "width: 10%;left:0% ; position:absolute;" >
         <img src="images/t2.png" alt="logo" width="20px">
       </div>
     <h style="font-style: italic;"><center>salut mon professeur!</center></h6> </div>
     <div class="logo" style= "width: 10%;left:90% ; position:absolute;" >
         <img src="images/logo-universite-abdelmalek-essaadi-tetouan-uae.png" alt="chtk" width="13px" style=" filter: grayscale(100%) invert(100%);">
     </div>
  </div>


<div class="r" style="height :150% ; display:flex;  " >
  <div class="container  mt-0 mx-0 my-0 m-0  px-0 py-0" style="background-color: rgb(19,19,97) ;  min-height: 170%;width: 25% ;text-align:center; margin: 0% ; padding-bottom: 0;" >
    <div class="row"style="color: white;text-align: center ;  padding-top: 20px;text-align:center; margin-left:-15% ; " >
  
    
      <!-- Colonne pour les informations personnelles -->
      
       <ul  class="list-unstyled text-white text-center">

        <li style="text-align:center; margin-bottom: 20px; margin-top:10%"><a href="profile.php" style="text-decoration: none; color:#FFFFFF" ><strong><?php echo $_SESSION['nom'];?></strong></a></li>
       <img src="../uploads/<?php echo $_SESSION['profileImage']; ?>" class="img-fluid profile-image" style=" width: 100px;  height: auto; max-width: 100%;  border-radius: 50%; " alt="Photo de profil">

 <li style="text-align:center;">
    <form action="photo.php" method="POST" style="display:inline;">
        <input type="hidden" name="cin" value="<?php echo htmlspecialchars($_SESSION['cin']); ?>">
        <button type="submit" style="background:none; border:none; color:inherit; text-decoration:none; cursor:pointer; font:inherit;">Modifier</button>
    </form>
</li>

        <hr color="color:white "style="width:50% ; background-color : white;   " >
        <li style="text-align:center; "><i class="fas fa-user-graduate"><?php echo $_SESSION['emailPerso'];?></i></li>
        <hr color="color:white "style="width:50% ; background-color : white; margin-bottom: 20%" >
        <ul class="menuderoulant">
            <li style="margin-bottom: 8%"><a href="home.php"><i class="fas fa-home"></i> Home</a>
               
             
            </li> 
           
            <li style="margin-bottom: 8%"><a href="classecous.php"><i class="fas fa-book m-2"></i>cours</a>
             
              </li>
              <li style="margin-bottom: 8%"><a href="classecousarchv.php"><i class="fas fa-archive m-2"></i>archive</a>
             
              </li>
              <li style="margin-bottom: 8%"><a href="affclasse.php"><i class="fas fa-user-graduate"></i>mes élève</a>
              <ul class="sousmenu">
                <li><a href="listeclasse.php">note</a></li>
                <li><a href="classederatt.php">ratrapage</a></li>
                      
              </ul>
              </li>
              <li style="margin-bottom: 8%"><i class="fas fa-file-alt m-2"></i>rapport</a>
              <ul class="sousmenu">
                <li><a href="pfaclasse.php">pfa</a></li>
                <li><a href="pfeclasse.php">pfe</a></li>
                          
              </ul>
              </li>
              <li style="margin-bottom: 8%"><a href="offrestage.php"><i class="fas fa-briefcase m-2"></i>offre stage</a>
            
              </li>
              
              
</ul>


        </ul>
        

        
     
      </ul>
      <div class="parametres">
        <i class="fas fa-cog" style="color:white ; font-size: 20px;"></i>
        <ul class="options sousmenu">
          <li><a href="deconnexion.php" style=" text-decoration: none ;"> <i class="fas fa-sign-out-alt"></i>Log out</a></li>
         
        </ul>
      </div>
    
    </div>
    </div>
    <div class="b" style="width:100%; " >
        <div style="height: 18%; width:100% ;background-color:#e6e6e6;justify-content: center; ">
          
          <div class="bv" style="  display:flex ; padding-left:0%" >
            <img  class="im" src="images/eserviceslogo-removebg-preview.png" alt="hhkl" width="100px" style="padding-top:2%">
            <h3 style=" padding:3%; padding-top:7% ; color: rgb(19,19,97);">Bienvenue sur la plateforme e-Services</h3>
            <i class="fas fa-bell" style="padding-top:8% ; padding-right:1% ;color: rgb(19,19,97)"></i> <!-- Deuxième icône de notification -->
            <a href="notifformule.php" class="messag">  <i class="fas fa-envelope" style="padding-top:8% ; color: rgb(19,19,97)"></i> </a> 
            <div  style="background-color:white ;width:20% ;height:30% ; display:flex; align-items: center; justify-content: center ;margin-top:6% ; position:relative ;border-radius: 10px; left:10%; ">
            <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Recherche..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"> <i class="fas fa-search" style="color: #d9d9d9; padding-left:5%; "></i></button>
            </form>
            </div>
            
          </div>
            
        </div>
      <div>
        <div class="a" style="padding: 3%; display:flex">
 


           <button type="button" class="btn btn-danger mr-5" style="width: 200%;"> <a href="emplois.php" style="color: #e6e6e6; text-decoration: none;"><i class="fas fa-calendar-alt" ></i> Emplois Temps </a> </button> <!-- mr-3 pour une marge à droite -->
           <button type="button" class="btn btn-danger mr-5" style="width: 200%;">  <a href="classedevoire.php" style="color: #e6e6e6; text-decoration: none;"> <i class="fas fa-chalkboard"></i> devoires </a></button>
           <button type="button" class="btn btn-danger mr-5" style="width: 200%;">  <a href="affclasse.php" style="color: #e6e6e6; text-decoration: none;"> <i class="fas fa-file"></i> les classes </a></button>
           <button type="button" class="btn btn-danger mr-5" style="width: 200%;"> <a href="abs.php" style="color: #e6e6e6; text-decoration: none;"><i class="fas fa-pencil-alt"></i>abscence </a></button>
         </div>
         
<script>
    // Fonction pour télécharger l'emploi du temps
    function downloadEmploiTemps() {
        // Mettre l'URL de téléchargement de l'emploi du temps
        var url = "telecharger_emp_temps.php";
        // Créer un élément de lien
        var link = document.createElement("a");
        // Définir l'URL du lien
        link.href = url;
        // Indiquer au navigateur de télécharger le fichier lors du clic sur le lien
        link.setAttribute("download", "emploi_temps.pdf");
        // Cliquer sur le lien pour déclencher le téléchargement
        link.click();
    }
</script>
<div class="container mt-5">
    <div class="row">
        <?php
        // Vérifier si des enregistrements sont récupérés
        if (!empty($res)) {
            foreach ($res as $index => $actualité) {
                // Vérifier le type d'actualité
                $isImageType = ($actualité['type_img'] == 'image');
        ?>
                <div class="col-md-6 mb-4">
                    <div class="card h-100">
                        <?php if ($isImageType && !empty($actualité['img_actu'])) { ?>
                            <img src="../uploads/<?php echo htmlspecialchars($actualité['img_actu']); ?>" class="card-img-top" alt="Image de l'actualité">
                        <?php } ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($actualité['titre_actu']); ?></h5>
                            <p class="card-text"><?php echo nl2br(htmlspecialchars($actualité['msg_actu'])); ?></p>
                            <?php if (!$isImageType && empty($actualité['img_actu'])) { ?>
                                <a href="../uploads/<?php echo htmlspecialchars($actualité['msg_actu']); ?>" class="btn btn-primary" download>Télécharger</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
        <?php
            }
        } else {
        ?>
            <div class="col-12">
                <div class="alert alert-warning" role="alert">
                    Aucune actualité trouvée pour le moment.
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <!-- Previous page link -->
        <li class="page-item <?php echo $page <= 1 ? 'disabled' : ''; ?>">
            <a class="page-link" href="?page=<?php echo $page - 1; ?>" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Previous</span>
            </a>
        </li>

        <!-- Page numbers -->
        <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
            <li class="page-item <?php echo $page == $i ? 'active' : ''; ?>"><a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php } ?>

        <!-- Next page link -->
        <li class="page-item <?php echo $page >= $totalPages ? 'disabled' : ''; ?>">
            <a class="page-link" href="?page=<?php echo $page + 1; ?>" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Next</span>
            </a>
        </li>
    </ul>
</nav>

<!-- Bootstrap JavaScript dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>


</div>


</body>
</html>
