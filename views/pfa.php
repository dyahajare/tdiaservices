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
        <title>Déposer un pfa</title>
         <link href="../bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">  
        <link href="../css/student.css"  rel="stylesheet">
        <script src="https://kit.fontawesome.com/c2dee1731d.js" crossorigin="anonymous"></script>
        <link href="../css/pfa.css" rel="stylesheet"> 
        <meta charset="UTF-8"> 
        <link rel="icon" href="../images/t3.png" />              
         <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&family=Oswald:wght@300..700&display=swap" rel="stylesheet">
         <script src="../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
         <style>
            .flex-container {
             display: flex;
             flex-direction: column;
             height: 100%;
         }
          
         body, html {
             height: 100%;
             margin: 0;
         }
         .flex-container {
             display: flex;
             flex-direction: column;
             height: 100%;
         }
         .row {
             flex-grow: 1;
             margin: 0;
         }
         .ha {
             padding: 0;
             margin: 0;
         }
         .col-md-9 {
             height: 190vh;
              
         }
         .col-md-3{
             height:225vh;
         }
         .sidebar-divider {
             margin-left: 20px;
             margin-top: 0;
         }
         .endbar {
             margin-bottom: 0;
         }
         .sub-menu-wrap {
             margin-top: 10%;
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
                                   <div class="row1"    > 
                                       <div class="container-fluid" style="padding: 0;">
                                           
                <div class="depos" style="background: linear-gradient(to bottom,  rgb(204, 202, 202), rgb(249, 249, 250));">
                    <form  id="pfa" method="POST" enctype="multipart/form-data">
                       
                    <div class="text1">  Soumission de la version finale du PFA</div>
                   
                    <ul class="bullet-list">
                        <li class="text2">   <div > 
                            Ce forumualire est destiné aux étudiants de  
                            <span class="textt"> la 4ème année.</span>
                        </div></li>
        
                        <li class="text3"> Après avoir rempli ce formulaire en ligne, votre encadrant validera (ou non) votre rapport. Cette validation est obligatoire pour pouvoir obtenir votre diplôme.</li>
                        <li class="text3">La version du rapport qui doit être téléchargée est celle dont les remarques de la soutenance sont prises en compte.</li>  
                        <li class="text3">En cas d'erreur lors du remplissage initial du formulaire, vous avez la possibilité de le soumettre à nouveau avec les corrections nécessaires. Cependant, il est important de noter que dès que votre rapport est validé par votre superviseur, aucune modification ultérieure ne sera autorisée</li>
                        <li class="text3">Si votre encadrant a refusé de valider votre rapport, vous allez recevoir ses remarques dans e-services, pour lui envoyer une nouvelle version il suffit de remplir le formulaire à nouveau.</li>
                        <li class="text3">
                            En cas de difficultés lors du remplissage du formulaire, veuillez nous contacter sans hésiter à l'adresse  suivante : <span class="textt"> med1995cherradi@gmail.com</span> Veuillez inclure votre CNE dans l'e-mail ainsi qu'une description détaillée du problème rencontré. Nous nous efforcerons de vous assister dans les meilleurs délais.</li>
                         </ul>
                        <div class="for"> 
                            <div class="texts">Soumission d'un rapport de PFA</div>
                            <form id="pfa" method="POST" enctype="multipart/form-data" >
                        <div class="mb-3">
                        <span class="for1">Titre du sujet de PFA (<span class="textt">*</span>)</span>
                        <div class="input-group">
                                 
                                <textarea class="form-control" aria-label="With textarea" name="titre"></textarea>
                              </div></div>
                         <div class="mb-3">
                                <label for="exampleFormControlSelect1" class="form-label"  >Filière </label>
                                <select class="form-select" id="exampleFormControlSelect1" name="filiere">
                                    <option value=""></option>
                                    <option value="1">Génie Civile</option>
                                    <option value="11">Génie de l'Eau et de l'Environnement</option>
                                    <option value="13">Génie Energétique et Energie Renouvelable</option>
                                    <option value="9">Génie Informatique</option>
                                    <option value="15">Génie Mécanique</option>
                                    <option value="16">Ingénierie des Données</option>
                                    <option value="21">Transformation Digitale &amp; Intelligence Artificielle</option>
                                   
                                </select>
                            </div>
                            <div class="mb-3">
                            <span class="for1">Résumé du rapport (<span class="textt">*</span>)</span>
                            <div class="input-group">
                                     
                                    <textarea class="form-control" aria-label="With textarea" name="resume"></textarea>
                                  </div></div>
                            <div class="mb-3">
                            <span class="for1">Entrer les noms complets (séparés par ;) des étudiants ayant réalisé ce travail (<span class="textt">*</span>)</span>
                                  <div class="input-group">
                                           
                                          <textarea class="form-control" aria-label="With textarea" name="etudiants"></textarea>
                                        </div></div>
                            <div class="mb-3">
                                <span class="for1">Email Académique de l'Encadrant (<span class="textt">*</span>)</span>
                                <div class="input-group">
                                                           
                                                          <input class="form-control" aria-label="With textarea" name="etudiants" type="email">
                                                        </div></div>
                                  <div class="mb-3">
                                    <label for="exampleFormControlSelect1" class="form-label"  >Promotion (<span class="textt">*</span>)</label>
                                    <select class="form-select" id="exampleFormControlSelect1" name="promotion">
                                        <option value=""></option>
                                        <option value="2024">2024</option>
                                        <option value="2023">2023</option>
                                        <option value="2022">2022</option>
                                        <option value="2021">2021</option>
                                        <option value="2020">2020</option>
                                        <option value="2019">2019</option>
                                        <option value="2018">2018</option>
                                       
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleFormControlSelect1" class="form-label"  > Encadrant interne (<span class="textt">*</span>)</label>
                                    <select class="form-select" id="exampleFormControlSelect1" name="encadrant">
                                        <option value=""></option>
                                        <option value="98">M. ABOU EL HANOUNE YOUNES</option>
                                        <option value="63">M. ABOUD MILOUD</option>
                                        <option value="21">M. ABOULHASSAN MOULAY ABDELAZIZ</option>
                                        <option value="71">M. ACHEMLAL DRISS</option>
                                        <option value="27">M. ADDAM MOHAMED </option>
                                        <option value="49">M. AHLALOUCH MOHAMED</option>
                                        <option value="30">Mme. AIT BENICHOU SAMAH </option>
                                        <option value="22">M. AIT BOUGHROUS ALI </option>
                                        <option value="81">M. AKOUH MOHAMED</option>
                                        <option value="134">Mme. ALLAOUZI IMANE</option>
                                        <option value="135">M. AMAHMOUJ ABDELOUAHAB</option>
                                        <option value="131">M. AMAKSSOUM AMAR</option>
                                        <option value="122">M. AMGHAR KAMAL</option>
                                        <option value="53">Mme. ANDALOUSSI KAOUTHAR</option>
                                        <option value="62">M. AZNAG M'HAMED</option>
                                        <option value="40">M. AZOUANI ABDERRAHIM </option>
                                        <option value="96">M. BADI IMAD</option>
                                        <option value="95">M. BAHRI ABDELKHALEK</option>
                                        <option value="118">Mme. BALGUARTIT MALIKA</option>
                                        <option value="110">M. BALLI LAHCEN</option>
                                        <option value="15">M. BEGHDADI EL HASSAN</option>
                                        <option value="52">Mme. BELHADJ OUIAME</option>
                                        <option value="104">M. BELLAIHOU MOHAMED</option>
                                        <option value="61">Mme. BENABDELLAH FADOUA</option>
                                        <option value="67">M. BENAMARI OMAR</option>
                                        <option value="78">M. BENDEFA OUSSAMA</option>
                                        <option value="129">Mme. BENGAG AMINA</option>
                                        <option value="18">M. BENGAMRA SAID </option>
                                        <option value="75">M. BOUAISS BILAL</option>
                                        <option value="103">M. BOUAJAJ AHMED</option>
                                        <option value="93">M. BOUAZZA EL HAJ</option>
                                        <option value="43">M. BOUDAA TARIK</option>
                                        <option value="133">Mme. BOUHAFER FADWA</option>
                                        <option value="85">M. BOUJRAF  AHMED</option>
                                        <option value="94">M. BOULANOUAR ABDERRAHIM</option>
                                        <option value="68">M. CHAABELASRI ELMILOUD</option>
                                        <option value="65">M. CHEIKH MEKKI</option>
                                        <option value="117">M. CHERRADI MOHAMED</option>
                                        <option value="64">M. CHOUKRI TAOUFIK</option>
                                        <option value="41">M. DADI EL WARDANI </option>
                                        <option value="24">M. DAOUDI SALAH </option>
                                        <option value="26">M. DIMANE FOUAD</option>
                                        <option value="57">M. DOUMA MOHAMED</option>
                                        <option value="73">M. DRIOUCH ISMAEL</option>
                                        <option value="39">M. DRIOUICH MOHAMED </option>
                                        <option value="69">M. EL AKKAD NABIL</option>
                                        <option value="42">M. EL ALLAOUI AHMAD </option>
                                        <option value="136">Mme. EL AYNI FATIMA ZAHRA</option>
                                        <option value="109">M. EL BORJI YASSINE</option>
                                        <option value="25">M. EL GHOULBZOURI ABDELOUAFI </option>
                                        <option value="83">M. EL HAIM MOHAMED</option>
                                        <option value="13">M. EL HIMRI ABDELOUAHID </option>
                                        <option value="106">Mme. EL JINANI SAMIA</option>
                                        <option value="123">M. EL KASMI ACHRAF</option>
                                        <option value="102">M. EL MAHRAOUI JAMAL</option>
                                        <option value="101">M. EL MANSOURI ABDELMOUGHIT</option>
                                        <option value="105">M. EL MATHARI MOHAMED</option>
                                        <option value="32">M. EL MOUTAOUAKIL KARIM </option>
                                        <option value="20">M. EL OUARGHI HOSSAIN </option>
                                        <option value="55">M. EL YOUSFI MUSTAPHA</option>
                                        <option value="56">M. ELHADDADI ANASS </option>
                                        <option value="128">M. ELKHALDI SAID</option>
                                        <option value="45">M. ELYOUBI MOHAMED SALAHDINE</option>
                                        <option value="51">Mme. FARICH NADIA</option>
                                        <option value="91">Mme. FATIMA AMALLAH</option>
                                        <option value="87">Mme. GHADBAN AMINA</option>
                                        <option value="16">Mme. HABOUBI KHADIJA </option>
                                        <option value="33">M. HADDOUCH KHALID </option>
                                        <option value="29">M. HANAFI ISSAM </option>
                                        <option value="11">M. HEYOUNI MOHAMED </option>
                                        <option value="114">M. HLIMI MOHAMED</option>
                                        <option value="125">Mme. IDDER HAJAR</option>
                                        <option value="12">M. IKHARRAZNE LMOKHTAR </option>
                                        <option value="119">M. INAHNAH RIDOUAN</option>
                                        <option value="84">M. JEFFALI FAOUAZ </option>
                                        <option value="124">M. KADRI TAOUFIQ</option>
                                        <option value="120">M. KANNOUF NABIL</option>
                                        <option value="23">M. KARZAZI YASSER </option>
                                        <option value="34">M. KERKOUR-EL MIAD ABDELHAMID </option>
                                        <option value="36">M. KHALED AISSAM </option>
                                        <option value="107">M. KHAMJANE AZIZ</option>
                                        <option value="97">Mme. KOULALI SARA</option>
                                        <option value="76">M. KRIRAA MOUNIR</option>
                                        <option value="115">M. LAHJOUJI  EL IDRISSI AHMED</option>
                                        <option value="38">M. LAMHAMDI ABDELLATIF</option>
                                        <option value="88">M. MAAZOUZI LAKHDAR</option>
                                        <option value="17">M. MAHJOUB HIMI</option>
                                        <option value="86">M. MAKAN  ABDELHADI</option>
                                        <option value="54">Mme. MAZOUZ SANAE</option>
                                        <option value="14">M. MESSAOUDI ABDELHAFID</option>
                                        <option value="72">M. MOQQADDEM SAFAA</option>
                                        <option value="60">Mme. MORADI FOUZIA</option>
                                        <option value="92">M. MOURABIT TAOUFIK</option>
                                        <option value="19">M. MOUSSA ABDELILAH </option>
                                        <option value="113">M. MOUSSAID AHMED</option>
                                        <option value="28">M. MOUSSAOUI MOHAMMED AMINE</option>
                                        <option value="116">Mme. NAAMANE SARA</option>
                                        <option value="99">M. NOUAYTI NORDINE</option>
                                        <option value="58">M. OURRAOUI ANASS</option>
                                        <option value="127">Mme. RAFII ZAKANI FATIMA</option>
                                        <option value="126">M. RAGRAGUI ANOUAR</option>
                                        <option value="108">Mme. ROUTAIB HAYAT</option>
                                        <option value="112">M. SAIDI HASSANI ALAOUI MOHAMED</option>
                                        <option value="111">M. SALMANI ABDELHAFID</option>
                                        <option value="89">M. SAMOUDI BOUSSELHAM</option>
                                        <option value="59">M. TAHRI ZAKARIA</option>
                                        <option value="35">M. TIMESLI ABDELAZIZ </option>
                                        <option value="121">M. TISKATINE RACHID</option>
                                        <option value="130">M. WAHID ACHRAF</option>
                                        <option value="47">M. ZARYOUHI MOHAMMED</option>
                                        <option value="37">M. ZERFAOUI MUSTAPHA </option>
                                        <option value="100">M. ZIAN AHMED</option>
                                        <option value="70">M. ZOUHAIR ABDELHAMID</option>    
                                    </select>
                                </div>
                                
                        
                        
                         
                     <div class="mb-3">
                        <label for="titre" class="form-label">Merci de télécharger votre rapport de PFE au format PDF  (<span class="textt">*</span>)</label>
                        <div class="input-group1"> 
                         
                        <div class="input-group mb-3">
                            <div class="input-group1">
                                <input type="file" class="form-control" name="rapport" accept="application/pdf">
                            </div>
                             
                          </div></div></div>
                          <div class="botonat">
                          <button type="submit" class="btn btn-primary">Envoyer</button>
                          <button type="reset" class="btn btn-secondary ">Annuler</button></div>
                        </form>
                       </div> </form></div>  <div id="responseMessage" class="alert mt-3 d-none"></div>
                                       </div>
                                   </div>
                               </div>
                       </div></div>
                    </div>
                          
                           <script>
                               function toggleMenu(elementId) {
                                   var element = document.getElementById(elementId);
                                   element.classList.toggle("open-menu");
                               }
                           </script>
                             <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
                             <script>
        document.getElementById('pfa').addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(this);
            fetch('../controllers/PfaController.php', {
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
                responseMessage.textContent = 'An error occurred. Please try again.';
                console.error('Error:', error);
            });
        });
    </script> 
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