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
 <head>                 <meta charset="UTF-8">
                        <title>Bibliothèque</title>
                        <link href="../bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">  
                        <link href="../css/student.css"  rel="stylesheet">
                        <link href="../css/biblio.css" rel="stylesheet">
                        <script src="https://kit.fontawesome.com/c2dee1731d.js" crossorigin="anonymous"></script>
                        <link rel="icon" href="../images/t3.png" />
                        <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@100..900&family=Oswald:wght@300..700&display=swap" rel="stylesheet">
                        <script src="../bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
                        <style>
                      
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
                            .row1 {
                                height: 190vh;
                                background:    linear-gradient(to bottom,   rgb(204, 202, 202), rgb(249, 249, 250));
                                 
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
                            .biblio {
                        background:    linear-gradient(to bottom,   rgb(204, 202, 202), rgb(249, 249, 250));}
                    
                      
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
                                             
                    <div class="biblio">
                        <div class="text1">Recherche d'un livre</div>
                        <div class="text2">Trouvons votre livre</div>
                        <!DOCTYPE html>
                        <html>
                        <head>
                            <title>Search Books</title>
                            <meta charset="UTF-8">
                            <link href="bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">
                        </head>
                        <body>
                            <div class="container">
                                
                                <form method="post" action="../controllers/BookController.php">
                                    <div class="mb-3">
                                        <label for="titre" class="form-label">Titre</label>
                                        <input type="text" class="form-control" id="titre" name="titre" placeholder="Entrer le nom du livre">
                                    </div>
                                    <div class="mb-3">
                                        <label for="code" class="form-label">Code</label>
                                        <input type="text" class="form-control" id="code" name="code" placeholder="Entrer le code du livre">
                                    </div>
                                    <div class="mb-3">
                                        <label for="theme" class="form-label">Thème</label>
                                        <select class="form-select" id="theme" name="theme">
                                            <option value=""></option>
                                            <option value="Algèbre">Algèbre</option>
                                            <option value="Algorithmique et Développement Informatique">Algorithmique et Développement Informatique</option>
                                            <option value="Analyse">Analyse</option>
                                            <option value="Analyse numérique et Analyse de données">Analyse numérique et Analyse de données</option>
                                            <option value="Architecture des ordinateurs">Architecture des ordinateurs</option>
                                            <option value="Base de données">Base de données</option>
                                            <option value="Biologie">Biologie</option>
                                            <option value="Chimie">Chimie</option>
                                            <option value="Conception et fabrication mécanique">Conception et fabrication mécanique</option>
                                            <option value="Culture générale">Culture générale</option>
                                            <option value="Dictionnaires">Dictionnaires</option>
                                            <option value="Divers">Divers</option>
                                            <option value="E-Commerce">E-Commerce</option>
                                            <option value="Eau et assainissement">Eau et assainissement</option>
                                            <option value="Électrocinétique">Électrocinétique</option>
                                            <option value="Électromagnétisme">Électromagnétisme</option>
                                            <option value="Electronique et Electrotechniques">Electronique et Electrotechniques</option>
                                            <option value="Énergétique">Énergétique</option>
                                            <option value="Environnement">Environnement</option>
                                            <option value="ERP, Logiciel / Progiciel de Gestion">ERP, Logiciel / Progiciel de Gestion</option>
                                            <option value="Génie Civil (Divers)">Génie Civil (Divers)</option>
                                            <option value="Géologie">Géologie</option>
                                            <option value="Géométrie">Géométrie</option>
                                            <option value="Geophysique et en Geotechnique">Geophysique et en Geotechnique</option>
                                            <option value="Gestion de projet">Gestion de projet</option>
                                            <option value="Hydrologie et hydraulique">Hydrologie et hydraulique</option>
                                            <option value="Informatique (Divers)">Informatique (Divers)</option>
                                            <option value="Informatique décisionnelle">Informatique décisionnelle</option>
                                            <option value="Informatique Industrielle">Informatique Industrielle</option>
                                            <option value="Intelligence Artificielle">Intelligence Artificielle</option>
                                            <option value="Interface Homme Machine">Interface Homme Machine</option>
                                            <option value="Langues et communication">Langues et communication</option>
                                            <option value="Logiciels de Calcul Scientifique et Symbolique">Logiciels de Calcul Scientifique et Symbolique</option>
                                            <option value="Matériaux et Techniques de Construction">Matériaux et Techniques de Construction</option>
                                            <option value="Mathématiques (Divers)">Mathématiques (Divers)</option>
                                            <option value="Mécanique">Mécanique</option>
                                            <option value="Modélisation, Conception et architecture logicielle">Modélisation, Conception et architecture logicielle</option>
                                            <option value="Non classé">Non classé</option>
                                            <option value="Optique">Optique</option>
                                            <option value="Outils bureautiques">Outils bureautiques</option>
                                            <option value="Pédologie">Pédologie</option>
                                            <option value="Physique (Divers)">Physique (Divers)</option>
                                            <option value="Probabilités et Statistiques">Probabilités et Statistiques</option>
                                            <option value="Problèmes et Exercices de physique">Problèmes et Exercices de physique</option>
                                            <option value="Qualité Logicielle">Qualité Logicielle</option>
                                            <option value="RDM et MMC">RDM et MMC</option>
                                            <option value="Réseaux">Réseaux</option>
                                            <option value="Ressources humaines">Ressources humaines</option>
                                            <option value="Risques naturels">Risques naturels</option>
                                            <option value="Sciences Economiques">Sciences Economiques</option>
                                            <option value="Sécurité et Cryptographie">Sécurité et Cryptographie</option>
                                            <option value="Systèmes d'acquisition de données">Systèmes d'acquisition de données</option>
                                            <option value="Systèmes d'exploitation">Systèmes d'exploitation</option>
                                            <option value="Systèmes Distribués">Systèmes Distribués</option>
                                            <option value="Systèmes temps réel">Systèmes temps réel</option>
                                            <option value="Théorie des Graphes et Recherche Opérationnelle">Théorie des Graphes et Recherche Opérationnelle</option>
                                            <option value="Thérmodynamique">Thérmodynamique</option>
                                            <option value="Topographie et SIG">Topographie et SIG</option>
                                            <option value="Traitement du signal">Traitement du signal</option>
                                            <option value="Urbanisme">Urbanisme</option>
                                            <option value="XML, Multimédia et Web">XML, Multimédia et Web</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Rechercher</button>
                                    <button type="reset" class="btn btn-secondary">Annuler</button>
                                </form>
                            </div>
                            <script src="bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js"></script>
                        </body>
                        </html>
                        
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
                    