<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Progress Bar</title>
  <!-- Inclure Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Style pour la barre de progression */
    .progress-bar {
      border-radius: 25px; /* Pour créer une limite radian */
      /* Largeur de la barre de progression supérieure à 100% */
      width: 200%; /* Ajustez cette valeur selon vos besoins */
      
    }
    html, body{
      height: 100%;
     
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
       border-top:1px solid transparent;
       border-right: 1px solid transparent;
    }
    .menuderoulant .sousmenu li a:link, .menuderoulant li a:visited{
      display: block;
      color: #FFFFFF;
      text-decoration: none;
      background-color: #199bd2
    }
    .menuderoulant li:hover .sousmenu {
      display:block
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
    }
  </style>
  
  <!-- Inclure Bootstrap JS (nécessaire pour les fonctionnalités Bootstrap) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

</head>
<body >

<div class="container mt-0 mx-0 my-0 m-0  px-0 py-0">
  <div class="progress px-0 " style="width: 110.7%; ">
    <div class="progress-bar" role="progressbar" style="width: 100%;  background-color:#0F52BA;  display:flex; position:relative ">
      <div class="logo" style= "width: 10%;left:0% ; position:absolute;" >
         <img src="t2.png" alt="logo" width="20px">
       </div>
     <h style="font-style: italic;"><center>salut mon professeur!</center></h6> </div>
     <div class="logo" style= "width: 10%;left:90% ; position:absolute;" >
         <img src="logo-universite-abdelmalek-essaadi-tetouan-uae.png" alt="chtk" width="13px" style=" filter: grayscale(100%) invert(100%);">
       </div>
  </div>
</div>
<div class="r" style="height :150% ; display:flex;  ">
  <div class="container  mt-0 mx-0 my-0 m-0  px-0 py-0" style="background-color: rgb(19,19,97) ; height: 110%;width: 25% ;text-align:center; margin: 0% ; ">
    <div class="row"style="color: white;text-align: center ;  padding-top: 20px;text-align:center; margin-left:-15% ; " >
  
    
      <!-- Colonne pour les informations personnelles -->
      
       <ul  class="list-unstyled text-white text-center">

        <li style="text-align:center; margin-bottom: 20px; margin-top:10%"><strong>mon profile ou nom</strong></li>
        <img src="2023-03-24.png" class="img-fluid" style="border-radius: 100%; width:50% ;text-align:center;">
        <li style="text-align:center;"><a href="modifier.php" style="text-decoration:none ">modifier</a></li>
        <hr color="color:white "style="width:50% ; background-color : white;   " >
        <li style="text-align:center; ">le statut </li>
        <hr color="color:white "style="width:50% ; background-color : white; margin-bottom: 20%" >
        <ul class="menuderoulant">
            <li style="margin-bottom: 8%"><a href="#"><i class="fas fa-home"></i> Home</a>
               
             
            </li> 
           
            <li style="margin-bottom: 8%"><a href="#cours"><i class="fas fa-book m-2"></i>cours</a>
              <ul class="sousmenu">
                <li><a href="#">classe 1</a></li>
                <li><a href="#">classe 2</a></li>
                <li><a href="#">class 3</a></li>               
              </ul>
              </li>
              <li style="margin-bottom: 8%"><a href="#cours"><i class="fas fa-archive m-2"></i>archive</a>
              <ul class="sousmenu">
                <li><a href="#">classe 1</a></li>
                <li><a href="#">classe 2</a></li>
                <li><a href="#">class 3</a></li>               
              </ul>
              </li>
              <li style="margin-bottom: 8%"><a href="#cours"><i class="fas fa-user-graduate"></i>mes élève</a>
              <ul class="sousmenu">
                <li><a href="#">notes </a></li>
                <li><a href="#">absence</a></li>
                       
              </ul>
              </li>
              <li style="margin-bottom: 8%"><a href="#cours"><i class="fas fa-file-alt m-2"></i>rapport</a>
              <ul class="sousmenu">
                <li><a href="#">classe 1</a></li>
                <li><a href="#">classe 2</a></li>
                <li><a href="#">class 3</a></li>               
              </ul>
              </li>
              <li style="margin-bottom: 8%"><a href="#cours"><i class="fas fa-briefcase m-2"></i>offr stage</a>
              <ul class="sousmenu">
                <li><a href="#">cl</a></li>
                <li><a href="#">classe 2</a></li>
                <li><a href="#">class 3</a></li>               
              </ul>
              </li>
              
              
</ul>


        </ul>
        

        
     
      </ul>
      <div class="parametres">
        <i class="fas fa-cog" style="color:white ; font-size: 20px;"></i>
        <ul class="options sousmenu">
          <li><a href="#" style=" text-decoration: none ;"> <i class="fas fa-sign-out-alt"></i>Log out</a></li>
          <li><a href="#" style=" text-decoration: none ;"><i class="fas fa-pencil-alt"></i>Modifier</a></li>
        </ul>
      </div>
    
    </div>
    </div>
     <div class="b" style="width:100%; " >
        <div style="height: 18%; width:100% ;background-color:#e6e6e6;justify-content: center; ">
          
          <div class="bv" style="  display:flex ; padding-left:0%" >
            <img  class="im" src="eserviceslogo-removebg-preview.png" alt="hhkl" width="100px" style="padding-top:2%">
            <h3 style=" padding:3%; padding-top:7% ; color: rgb(19,19,97);">Bienvenue sur la plateforme e-Services</h3>
            <i class="fas fa-bell" style="padding-top:8% ; padding-right:1% ;color: rgb(19,19,97)"></i> <!-- Deuxième icône de notification -->
            <i class="fas fa-envelope" style="padding-top:8% ; color: rgb(19,19,97)"></i> 
            <div  style="background-color:white ;width:20% ;height:30% ; display:flex; align-items: center; justify-content: center ;margin-top:6% ; position:relative ;border-radius: 10px; left:10%; ">
            <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Recherche..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit"> <i class="fas fa-search" style="color: #d9d9d9; padding-left:5%; "></i></button>
            </form>
            </div>
            
          </div>
            
        </div>
      <div>
       
        
    <!-- Utilisation de la classe "list-group" pour la liste -->
    <div class="list-group" style="text-align: center; ">
        <?php
        // Connexion à la base de données
        try {
            $db = new PDO("mysql:host=localhost;dbname=classe","root","");
        } catch (PDOException $e) {
            echo 'Erreur de connexion : ' . $e->getMessage();
            exit();
        }

        // Requête pour obtenir la liste des tables dans la base de données "classe"
        $query = "SHOW TABLES";
        $statement = $db->query($query);
        $tables = $statement->fetchAll(PDO::FETCH_COLUMN);
       
        echo"<button type=\"button\" class=\"list-group-item list-group-item-action active\" aria-current=\"true\" style=\"line\">Mes classes</button>";
        // Affichage des noms de tables sous forme de boutons dans une liste de groupe
        
        foreach ($tables as $table) {
            // Utilisation de la classe "list-group-item" pour chaque bouton
            // Utilisation de la classe "active" pour le bouton actif (si nécessaire)
            $activeClass = ($_GET['classe'] ?? '') === $table ? ' active' : '';
            echo "<button type=\"button\" class=\"list-group-item list-group-item-action$activeClass\" onclick=\"window.location.href='?classe=$table'\">$table</button>";
        }
        ?>
    </div>
      </div>
     </div>
     
    
</div>


</body>
</html>
