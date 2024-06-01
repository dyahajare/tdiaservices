<?php 
                    session_start();
if (!isset($_SESSION['user'])) {
    echo "User session is not set.";
    exit();
}

if(isset( $_SESSION['profilmodified']) && $_SESSION['profilmodified']=true ){
    $image_name = $_SESSION['nouvprofil'] ;
    $image_path = "../uploads/". $image_name; 
}else{
$image_name = $_SESSION['user']['profil'] ?? 'default_profile';
$image_path = "../uploads/" . $image_name; 
}
$student_name=$_SESSION['user']['prenom'] ?? 'default_username';

$id=$_SESSION['user']['classe'] ?? 'default_class';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>personnels</title>
    <link href="../bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">  
    <link href="../css/student.css"  rel="stylesheet">
    <link href="../css/personnels.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/c2dee1731d.js" crossorigin="anonymous"></script>
    <link rel="icon" href="../images/t3.png" />
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&family=Oswald:wght@300..700&display=swap" rel="stylesheet">
    <script src="../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
    <style>
           .flex-container {
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        .row {
            flex-grow: 1;
            margin: 0;
        }
        body, html {
            height: 100%;
            margin: 0;
        }
        .depos{
            background: linear-gradient(to bottom,   rgb(204, 202, 202), rgb(249, 249, 250));
        }
  
    </style>


</head>
<body> 
   
   <div class="row"  >
       <div class="row justify-content-center ha" style="padding:0px;margin:0px">
          <div class="col-md-3" style="padding: 0;margin: 0;" id="t1">
             <div class="row2">
             <div class="dropdown" style="margin-left:10%;margin-top:10%;">
                   <button  type="button" data-bs-toggle="dropdown" aria-expanded="false" style="border:none;border-radius:10px;width:90%;">
                       <div class="sub-div">
                       <img src="<?php echo ($image_path); ?>"  class="image">
                       <h3><?php echo($student_name);?></h3></div>
                   </button>
                   <ul class="dropdown-menu" style="background-color: aliceblue;width:90%">
                     <li><a class="dropdown-item" href="moncompte.php" style="display: flex;"> <i class="fas fa-user fa-sm fa-fw mr-2row text-gray-400"></i>
                       <p>Mon compte</p>
                       <span>></span></a></li>
                     <li><a class="dropdown-item" href="changepass.php" style="display: flex;"> <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                       <p>Changer mot de passe</p>
                       <span>></span></a></li>
                       <hr>
                       <li><a class="dropdown-item" href="../controllers/DeconnexionController.php" style="padding-top:8%;display: flex;"> <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                           <p>Se deconnecter</p>
                           <span>></span></a></li>
                   </ul>   
                 </div>
               <div class="sub-menu-wrap" id="subMenu1">
                   <div  class="sub-menu" style="margin-top: 10%;" >
                     <div class="sub-div"> 
               </div>
   </div></div>
           <div class="servicesbar" style="padding-top:0px;margin: 0;">
               <div class="accueilbar" style="padding-top: 80px; padding-left:10%; display: flex; align-items: center;">
                   <a href="" style="padding-left: 20px;"><i class="fas fa-fw fa-home" style="color: antiquewhite;"></i></a>
                   <a href="student.php" style="text-decoration: none; color: aliceblue; padding-left:5%;">Accueil</a>
               </div><br>
               <hr class="sidebar-divider mt-400" style="margin-left: 20px;margin-top: 0px;">
               <div class="services " style="padding-left:8%;margin-top:0%;">
                   <i class="fas fa-cog" style="padding-left: 30px;color: antiquewhite;"></i>
                   <p style="color: aliceblue;padding-top:5%;">Services</p>
               </div>
               <div class="scrollbarservices" >
                   <div class="demandes">
                       <div class="sub-menu-wrap" id="subMenu4">
                           <div class="sub-menu">
                               <ul style="padding-left:30%;margin-top:0px;color: aliceblue;padding-top: 10px;"><li  onclick="toggleMenu('subMenu4')">Demandes</li></ul>
                               <div style="background-color: aliceblue;width:70%;margin-left: 70px;height:auto;padding-top: 2px;border-radius: 10px;">
                                   <ul style="list-style: none;padding-left: 2px;"><li><a href="nouvdemande.php" style="padding-left: 10px;color:#3a3b45;">Nouvelle demande</a></li>
                                   <li style="padding-left: 0px;"> <a  href="etatdedemande.php" style="padding-left: 10px;color:#3a3b45">Etat de ma demande</a></li></ul>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="orientation">
                       <div class="sub-menu-wrap" id="subMenu5">
                           <div class="sub-menu">
                               <ul style="padding-left:30%;margin-top:0px;color: aliceblue;padding-top: 10px;"><li  onclick="toggleMenu('subMenu5')">Orientation</li></ul>
                               <div style="background-color: aliceblue;width:70%;margin-left: 70px;height:auto;padding-top: 2%;border-radius: 10px;">
                                   <ul style="list-style: none;padding-left: 2%;"><li><a href="" style="padding-left:5%;color:#3a3b45;">3 eme annee GC</a></li>
                                   <li style="padding-left: 0px;"> <a href="orientation.php" style="padding-left: 10px;color:#3a3b45">Pour CP2</a></li></ul>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class="activite">
                       <div class="sub-menu-wrap" id="subMenu9">
                           <div class="sub-menu">
                               <ul style="padding-left:30%;margin-top:0px;color: aliceblue;padding-top: 10px;"><li  onclick="toggleMenu('subMenu9')">Bibliotheque</li></ul>
                               <div style="background-color: aliceblue;width:70%;margin-left: 70px;height:auto;padding-top: 2px;border-radius: 10px;">
                                   <ul style="list-style: none;padding-left: 2px;"><li><a href="biblio.php" style="color:#3a3b45;">Consulter</a></li></ul>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <br>
               <hr class="sidebar-divider my-0" style="margin-left: 20px;width: 250px;">
               <div class="Rstage">
                   <div class="sub-menu-wrap" id="subMenu6" >
                       <div class="sub-menu">
                           <div class="stage " style="padding-left:8%;" onclick="toggleMenu('subMenu6')" >
                               <i class="fas fa-user-graduate" style="padding-left: 14%;color: antiquewhite;"></i>
                               <p style="color: aliceblue;padding-left: 10%;padding-top: 5% ">Raport&stages</p>
                           </div>
                           <div style="background-color: aliceblue;width: 200px;margin-left: 70px;border-radius: 10px;padding:2%;">
                               <ul style="list-style: none;padding-left: 2px;color:#3a3b45;"><li style="padding-left: 10px;color:grey;font-size: .85rem;"><h6>Rapport PFE:</h6></li>
                                   <li style="padding-left: 0px;"> <a href="consul.php" style="padding-left: 9px;color:black;padding-top: 10px;">Consulter</a></li>
                                   <li style="padding-left: 0px;"> <a href="depos.php" style="padding-left: 10px;color:black">Deposer un rapport PFE</a></li>
                                   <li style="padding-left: 0px;"> <a href="" style="padding-left: 10px;color:black">Mon rapport PFE</a></li><br>
                                   <li  style="padding-left: 10px;color:gray;"><h6>Autres rapports:</h6></li>
                                   <li style="padding-left: 0px;"> <a href="consul.php" style="padding-left: 9px;color:black">Rapport PFA</a></li>
                                   <li style="padding-left: 0px;"> <a href="pfa.php" style="padding-left: 10px;color:black">Deposer un rapport PFA</a></li>
                                   <li style="padding-left: 0px;"> <a href="" style="padding-left: 10px;color:black">Mon rapport PFA</a></li><br>
                                   <li  style="padding-left: 10px;color:gray;"><h6>Documents stages:</h6></li>
                                   <li style="padding-left: 0px;">   <button  class="btn btn" id="downloadButton">Demandes</button> <a href="#" id="downloadLink"></a></li>
                                   <li style="padding-left: 0px;"> <button  class="btn btn " id="downloadButton1">Convention</button> <a href="#" id="downloadLink1"></a></li></ul> 
                           </div>
                       </div>
                   </div>
               </div><br>
               <hr class="sidebar-divider my-0" style="margin-left: 20px;width: 250px;">
               <div class="affichage">
                   <div class="sub-menu-wrap" id="subMenu7">
                       <div class="sub-menu">
                           <div class="affichagebar " style="padding-left: 10%;" onclick="toggleMenu('subMenu7')" >
                               <i class="fas fa-clipboard" style="padding-left: 30px;color: antiquewhite;"></i>
                               <p style="color: aliceblue;padding-left: 10%;padding-top:5%; ">Affichage</p>
                           </div>
                           <div style="background-color: aliceblue;width: 200px;margin-left: 70px;height:auto;padding:3%;border-radius: 10px;">
                               <a style="padding-left: 5%;color:#3a3b45;padding-top:5%;" href="notes.php">Tableau des notes</a>
                           </div>
                       </div>
                   </div>
               </div><br>
               <hr class="sidebar-divider my-0" style="margin-left: 20px;width: 250px;">
               <div class="personnel">
                   <div class="sub-menu-wrap" id="subMenu8">
                       <div class="sub-menu">
                           <div class="personelbar " style="padding-left: 8%;" onclick="toggleMenu('subMenu8')" >
                               <i class="fas fa-fw fa-users" style="padding-left: 13%;color: antiquewhite;"></i>
                               <p  style="color: aliceblue;padding-left: 15%;padding-top: 10px; ">Personnel</p>
                           </div>
                           <div style="background-color: aliceblue;width: 200px;margin-left: 70px;height:auto;padding:3%;border-radius: 10px;;">
                               <a style="padding-left: 10px;color:#3a3b45;margin-top: 30px;" href="personnels.php">Consulter</a>
                           </div>
                       </div>
                   </div>
               </div><br>
               <hr class="sidebar-divider my-0" style="margin-left:8%;width: 250px;">
               <div class="devoirs">
                   <div class="sub-menu-wrap" id="subMenu10">
                       <div class="sub-menu">
                           <div class="devoirsbar" style="padding-left: 8%;" onclick="toggleMenu('subMenu10')">
                               <i class="fas fa-fw fa-book" style="padding-left: 13%;color: antiquewhite;"></i>
                               <p style="color: aliceblue;padding-left: 15%; padding-top: 10px;">Devoirs & Rapports</p>
                           </div>
                           <div style="background-color: aliceblue; width: 200px; margin-left: 70px; height: auto; padding: 3%; border-radius: 10px;">
                               <a style="padding-left: 10px; color: #3a3b45; margin-top: 30px;" href="consulter.php">Déposer</a>
                           </div>
                       </div>
                   </div>
               </div>
               <br>
               <hr class="sidebar-divider my-0" style="margin-left:8%;width: 250px;">
               <div class="offre">
                   <div class="sub-menu-wrap" id="subMenu20">
                       <div class="sub-menu">
                           <div class="personelbar " style="padding-left:10%;" onclick="toggleMenu('subMenu20')" >
                               <i class="fa-solid fa-briefcase" style="color: #ffffff;padding-left: 30px"></i>
                               <p style="color: aliceblue;padding-left: 11%;padding-top: 10px;">Offres de stage</p>
                           </div>
                           <div style="background-color: aliceblue;width: 200px;margin-left: 70px;height:auto;padding:3%;border-radius: 10px;;">
                               <a href="offredestage.php" style="padding-left: 10px;color:#3a3b45;margin-top: 30px;">Consulter</a>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <div class="endbar" style="padding-top:50%;">
               <a href="" style="padding-top:50%;" > <i class="fa-solid fa-gear" style="color: antiquewhite;padding-left:20%;"></i></a>
               <img src="../images/abdelmalek_saadi-removebg-preview.png" style="width:70%;padding-left:30%;">
             </div>
     </div> </div>
     <div class="col-md-9" style="padding:0%"> 
       <div class="flex-container">
           <nav class="navbar navbar-expand-lg">
               <div class="container-fluid">
                   <div class="form-group">
                        
                       <form class="d-flex" role="search">
                           <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                           <div class="input-group-append">
                               <button class="btn btn-primary" type="submit">
                                   <i class="fas fa-search fa-sm"></i>
                               </button>
                           </div>
                       </form> 
                   </div>
                   <div class="not-msg">
                   <div class="dropdown">
                   <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="border:none; background-color: rgb(204, 202, 202);"><i class="fas fa-bell notification" ></i></button>

   <div class="dropdown-list dropdown-menu dropdown-menu-right shadow " aria-labelledby="alertsDropdown">
                                       <h6 class="dropdown-header">
                                           Notications
                                       </h6>
                                       <a class="dropdown-item text-center small text-gray-500" href="notif.php">
                                       <span style="color:green"><i class="fas fa-angle-double-right"></i> Lire les notifications</span></a>
                     </div>
                       <button class="btn btn-primary" type="submit">
                           <i class="fa-solid fa-robot chat" onclick="window.location.href = '../chatbot/index.html'"></i>

                   </button>
                   </div>
               </div>
           </nav>
           <div class="topbar" style="background-color:rgb(238, 237, 237);" style="height: 80px;" style="margin-top:0%;">
               <a href="cours.php" class="items" style="background-color:#095bf5;" ><span>Cours</span> 
                   <span><i class="fas fa-book-reader fa-2x text-gray-300" id="notif"></i></span></a>
               <a   href="notif.php" class="items" style="background-color: #77787a;"><span>Notifications</span>
                   <span><i class="fa-solid fa-bell"></i></span></a>
               <a href="nouvdemande.php" class="items" style="background-color:  #6e0606"><span>Demandes</span>
                   <span><i class="fas fa-file-alt fa-2x text-gray-300"></i></span>
               </a>
               <a   href="" class="items" style="background-color: #e60d79;"><span>Emplois</span>
                   <span><i class="fas fa-calendar fa-2x text-gray-300"></i></span>
               </a>
           </div>
            <div class="row1"> 
                <div class="container-fluid" style="padding: 0;">
                    <div class="depos">
                        <h3 class="text1">
                            Personnels de l'ENSA Al-Hoceima
                        </h3>
                        <form>
                            <div class="mb-3">
                                <input type="search" class="form-control" id="titre" placeholder=" Saisir le nom ou une partie du nom">
                            </div>
                            <div class="mb-3">
                                <button type="button" class="btn btn-primary">Rechercher</button>
                                <button type="button" class="btn btn-secondary">Annuler</button>
                            </div>
                        </form>
                        <hr>
                        <h4 class="text1">
                            Résultat de recherche
                        </h4>
                        <h6 class="text2" style="margin-left: 5%;">
                            Nombre d'éléments trouvés : 77
                        </h6>
                        <div class="table-responsive" style="margin-top:30px">
                            <table id="tableresu" >
                                <thead class="table-info">
                                    <tr>
                                        <th><span class="up1">Nom</span></th>
                                        <th><span class="up1">Prénom</span></th>
                                        <th><span class="up1">Email académique</span></th>
                                        <th><span class="up1">Photo</span></th>
                                    </tr>
                                </thead>
                              <tbody>
                                <tr><td>ABOU EL HANOUNE</td> <td>younes</td> <td>yabouelhanoune@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=27aac7590c03c46cb424229c7e727efb60c548cc&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>ABOUD</td> <td>Miloud</td> <td>m.aboud@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=def99143264f2d931ea2c07be4646238b4cd01e2&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>ADDAM</td> <td>Mohamed </td> <td>m.addam@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=ececabf377bf59197466b78e3f961fe6bfc666ef&amp;image=03032022230607107420663109.jpg&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>Akouh</td> <td>Mohamed</td> <td>m.akouh@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=7630fbfec2f036edb7e823c611515380711a6e38&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>ALLAOUZI</td> <td>Imane</td> <td></td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=d64365d89b1ea646974ffbf77c38f3bd3a478b0f&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>AMAHMOUJ</td> <td>Abdelouahab</td> <td></td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=aa18a89f525858f9dab3136912ed6021e05d9e19&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>AMAKSSOUM</td> <td>Amar</td> <td></td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=7ee14e04d00a22299bbddc40af9dac33d9ee2192&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>AMGHAR</td> <td>Kamal</td> <td>k.amghar@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=a0321bbaf589384fea4fde6b694dad3bfb4f04d2&amp;image=08122020132857651644753014.jpg&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>AZNAG</td> <td>M'hamed</td> <td>m.aznag@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=699b38f04e1faa5980a8fb03b91141a4261878a9&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>BADI</td> <td>imad</td> <td>ibadi@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=745cbc8e19c85c3aefa00e53eede0d587e2a6eb0&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>BAHRI</td> <td>abdelkhalek</td> <td>abahri@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=73b4c8ec4834e18b9da647105da7070d1a7f8982&amp;image=0510201911040199999379065.jpg&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>BALGUARTIT</td> <td>MALIKA</td> <td>m.balguartit@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=33aaf9148dfd1847bc22868b0c803b271bb9763d&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>BALLI</td> <td>Lahcen</td> <td>lballi@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=2b17b5630fcf8d53e2722e99337a65308124605c&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>BEGHDADI</td> <td>El Hassan</td> <td>ebarhdadi@uae.ac.ma
                                </td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=a815a1ea6dca03bb96ffb45e7509d3cb5c9053a0&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>Bellaihou</td> <td>Mohamed</td> <td>mbellaihou@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=496c9e1bc5842b3be156c0e0c127cddf8d07adb4&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>BENAMARI</td> <td>Omar</td> <td>o.benamari@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=e7089536cf3359cb608dd9e55c6fcbf6dd3f4922&amp;image=1710201812183399999201657.jpg&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>BENGAG</td> <td>Amina</td> <td></td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=9e0336b67121a795ed62d18a9ea6fc9ba7bf961f&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>BOUAISS</td> <td>Bilal</td> <td>b.bouaiss@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=f4a81daf95ee4cef5a51bf49361e59257b1d0351&amp;image=	 user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>Bouajaj</td> <td>Ahmed</td> <td>ahbouajaj@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=0f62befb3b87247a2045362454d84571befb4c69&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>BOUAZZA</td> <td>El haj</td> <td>ebouazza@uae.ac.ma
                                </td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=9bc1ba9a52ac815f61d2e31ebfbf5c7845b17091&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>BOUDAA</td> <td>Tarik</td> <td>t.boudaa@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=fa022bb1d1c5baf64f8d248252aded11ed062e08&amp;image=1103202022162899999535223.jpg&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>BOUHAFER</td> <td>Fadwa</td> <td></td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=55cc004f3cfdbd9d8aab86ac45e0285bce39542d&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>Boujraf </td> <td>Ahmed</td> <td>a.boujraf@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=ef92879056b3d2e08c6512de0c4e40f5bdffd70d&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>BOULANOUAR</td> <td>Abderrahim</td> <td>aboulanouar@uae.ac.ma
                                </td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=3684ff5192c2b7136fae4976e1a2ece7db3689a4&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>CHEIKH</td> <td>Mekki</td> <td></td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=965df120b6ac9e49dea2f55b7aee69229e8475a1&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>CHERRADI</td> <td>Mohamed</td> <td></td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=80f93a1dfe6d2881cf53f483877ca1d890385e71&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>CHERRADI</td> <td>MOHAMED</td> <td>m.cherradi@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=1ce23ffc32f0f6c70fb6fd263ba41cf02418de87&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>CHOUKRI</td> <td>Taoufik</td> <td>t.choukri@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=e94f99cfb7507fba97bd16ed8755b1f0e9aa2a5d&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>DADI</td> <td>El Wardani </td> <td>w.dadi@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=15a8a864729a18746009b8052b47bd192e5b6bf9&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>DIMANE</td> <td>Fouad</td> <td>f.dimane@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=9b345676887c594dcded61c92d9281aa2404ad80&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>Driouch</td> <td>Ismael</td> <td>i.driouch@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=ca1c31a92af725ab0a134cbf502b69c5e2571ede&amp;image=	 user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>EL AYNI</td> <td>Fatima Zahra</td> <td></td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=23ae4413d88726ce4b1649e3e50ca6ddf1e4d014&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>EL BORJI</td> <td>Yassine</td> <td>yelborji@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=bca452007c194d4e6c084beef597c144d8c97c23&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>EL GHOULBZOURI</td> <td>Abdelouafi </td> <td>a.elghoulbzouri@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=292a8d1865afbf31b78a99760735c7e900891234&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>EL HAIM</td> <td>Mohamed</td> <td>melhaim@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=cd2e500c522b7eda0fab768ba8f21735fbeb4f88&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>El Jinani</td> <td>Samia</td> <td>s.eljinani@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=3b052244e56fc134564b14ff9587e1dfa1ad0810&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>EL KASMI</td> <td>Achraf</td> <td>a.elkasmi@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=988b798e81eb0281836baa13881491b33f751745&amp;image=22032021114617484565878072.jpg&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>el mahraoui</td> <td>jamal</td> <td>j.elmahraoui@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=35689c9c1cff5e33fea210ef0205f9956271469f&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>El mansouri</td> <td>Abdelmoughit</td> <td>a.elmansouri@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=0e7f62a0b978152fad25eb4052eeed7cadcf110e&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>el mathari</td> <td>Mohamed</td> <td>m.elmathari@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=2bd4bee6a1d2571ed808809a232e45dce26b5b63&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>EL OUARGHI</td> <td>Hossain </td> <td>helouarghi@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=44ff70f40d03727623f7365cf21686da4553a007&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>EL YOUSFI</td> <td>mustapha</td> <td>m.elyousfi@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=804a07ec5a2873a4365bfc3985cf0300bbb9d784&amp;image=09122020133455536201697294.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>ELHADDADI</td> <td>Anass </td> <td>a.elhaddadi@uae.ac.ma
                                </td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=e553ef3bb8e5a64bfdc27634330bbfc68f3e5246&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>elkhaldi</td> <td>said</td> <td>s.elkhaldi@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=ab0f09df7b48ec5046a87b766a1b976b0270e366&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>FARICH</td> <td>Nadia</td> <td>n.farich@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=72f9f38c638a5638284e104cc2279f990205da2b&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>Fatima</td> <td>AMALLAH</td> <td>f.amallah@uae.ac.ma
                                </td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=7308e69a87dc4e39281580bbfea2bad44bc7d11b&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>HABOUBI</td> <td>Khadija </td> <td>k.haboubi@uae.ac.ma
                                </td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=9576ce7c07ac11b71963db95bb421f4bfe0282eb&amp;image=19032020230137696908349370.jpg&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>HANAFI</td> <td>Issam </td> <td>hanafi@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=23c83f7e71c60f13304cdad6f7171818d1413856&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>HLIMI</td> <td>Mohamed</td> <td>mhlimi@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=4530f216afd50253fc237ec3e73db87b44d112ec&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>IDDER</td> <td>Hajar</td> <td>h.idder@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=0057ed2c587f03904e0835cfbed19d0848a20152&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>IKHARRAZNE</td> <td>Lmokhtar </td> <td>likharrazene@uae.ac.ma
                                </td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=cdc73306a0a174546faa83b4c376ce021812d29c&amp;image=2409201903404799999305206.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>inahnah</td> <td>ridouan</td> <td>r.inahnah@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=f0879cd0c1c2e94a9ccee17ce86295af493ff83b&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>KADRI</td> <td>Taoufiq</td> <td>t.kadri@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=343b4bed34d1413198a81d614174f88d068c813a&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>KANNOUF</td> <td>Nabil</td> <td>n.kannouf@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=cbb5af8d9e4cc23f4066fd240032c9948027e567&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>KHALED</td> <td>Aissam </td> <td>a.khaled@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=7d7452afa80e3c68020052a2f41104d3de3b8dff&amp;image=28092023112435424895308132.jpg&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>KHAMJANE</td> <td>AZIZ</td> <td>akhamjane@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=4a58e64f186bf1718a29387d65f49b1bc2412649&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>KOULALI</td> <td>sara</td> <td>skoulali@uae.ac.ma
                                </td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=35ca553ee6ca639da10eeecd3623029855375a77&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>LAHJOUJI  EL IDRISSI</td> <td>Ahmed</td> <td>a.lahjoujielidrissi@uae.ac.ma
                                </td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=f226ffa74d63ac354107e7731d1782a59363fb78&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>LAMHAMDI</td> <td>Abdellatif</td> <td>a.lamhamdi@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=4dbc793a12184d45bea895553debd6076e216c8e&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>maazouzi</td> <td>lakhdar</td> <td>l.maazouzi@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=8860cb5e4c66f5db96b1cad015747beb1a2831d6&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>MAHJOUB</td> <td>Himi</td> <td>hmahjoub@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=c0972e970384dda2c6fa2f38ceace1a0587d70ae&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>Makan </td> <td>Abdelhadi</td> <td>a.makan@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=df31695a6ea791973620eef71493deeaff28e110&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>MORADI</td> <td>Fouzia</td> <td>f.moradi@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=dbbafebdffabdac6d6e64a55e48572a0b45c5a73&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>MOUSSAID</td> <td>Ahmed</td> <td>ahmoussaid@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=036c459409ff8a2e9942ce473fb330c88a9cfa3f&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>NAAMANE</td> <td>Sara</td> <td>s.naamane@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=b5a0378bc5cdd918584886345a0714282adfe3c4&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>NOUAYTI</td> <td>nordine</td> <td>nnouayti@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=813e9ee77c9deddec702ddecdd9ca6805cd44608&amp;image=1602201900533499999736540.jpeg&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>RAFII ZAKANI</td> <td>Fatima</td> <td></td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=562148d33b771ebb8a9879570c3387d234fa95a7&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>ragragui</td> <td>anouar</td> <td></td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=2e7c6751802770f8ab03244386b10fa9f5212628&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>ROUTAIB</td> <td>Hayat</td> <td>hroutaib@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=767be3a0c3e97043103d6def1515f0c8f71c6f08&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>SAIDI HASSANI ALAOUI</td> <td>Mohamed</td> <td>m.saidihssanialaoui@uae.ac.ma
                                </td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=1319feb13401555e8eb31b37e17244bd32ac24b2&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>SALMANI</td> <td>Abdelhafid</td> <td>asalmani@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=44d3a029d5d147d3bba68dd2ab9ea6a2b4599a29&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>SAMOUDI</td> <td>Bousselham</td> <td>b.samoudi@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=73238eb4892f065c8357bffc24dcb0f7791e5e86&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>TAHRI</td> <td>Zakaria</td> <td>z.tahri@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=fc923f59fb1f19581f6effc3e9095ffc9c7c2fc6&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>TISKATINE</td> <td>Rachid</td> <td>r.tiskatine@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=bc427f7f2ab916ef155434b516dff5bf8f655025&amp;image=09122020002649758607511761.jpg&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>WAHID</td> <td>Achraf</td> <td></td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=48914b11713c462d207e34cee944dbd0f562da30&amp;image=11012024210345506889574822.jpg&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>ZARYOUHI</td> <td>MOHAMMED</td> <td>m.zaryouhi@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=a9d9460b588d80ed15543ea60309b040ae9775d2&amp;image=user.png&amp;t=2" width="65&quot;" height="65"></td></tr>
                                <tr><td>Zian</td> <td>Ahmed</td> <td>a.zian@uae.ac.ma</td><td><img border="0" class="" alt="IMG" src="https://ensah.ma/apps/eservices/internal/members/common/getResource.php?jtn=3f47de6d63884195ac6b6e6ba2ce50b0e2e66945&amp;image=0303201922371899999407487.jpg&amp;t=2" width="65&quot;" height="65"></td></tr>
                    
                    
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div></div>
</div>
           
            
         
        </div>
   
    <script>
        function toggleMenu(elementId) {
            var element = document.getElementById(elementId);
            element.classList.toggle("open-menu");
        }
    </script>
      <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
      <script>
        document.getElementById('downloadButton').addEventListener('click', function() {
            var fileUrl = 'demande.pdf';

            var link = document.getElementById('downloadLink');
            link.href = fileUrl;
            link.download = 'demande.pdf';
            link.click();
        });
    </script>
     <script>
        document.getElementById('downloadButton1').addEventListener('click', function() {
            var fileUrl = 'convention.pdf';

            var link = document.getElementById('downloadLink1');
            link.href = fileUrl;
            link.download = 'convention.pdf';
            link.click();
        });
    </script>
</body>
</html>
<?php 
if (!isset($_SESSION['user'])) {
    echo "User session is not set.";
    exit();
}

if(isset( $_SESSION['profilmodified']) && $_SESSION['profilmodified']=true ){
    $image_name = $_SESSION['nouvprofil'] ;
    $image_path = "../uploads/". $image_name; 
}else{
$image_name = $_SESSION['user']['profil'] ?? 'default_profile';
$image_path = "../uploads/" . $image_name; 
}
$student_name=$_SESSION['user']['prenom'] ?? 'default_username';

$id=$_SESSION['user']['classe'] ?? 'default_class';
?>
