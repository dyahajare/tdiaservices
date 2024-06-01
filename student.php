<!DOCTYPE html>
<html>
<head>
    <title>student</title>
    <meta charset="UTF-8">
    <link href="../bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet">  
    <link href="../css/student.css"  rel="stylesheet">
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
        .col-md-3 {
            height: 222vh;
             
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
                        <img src="download.jpeg"  class="image" style="width:40%;">
                        <h3>hajar</h3></div>
                    </button>
                    <ul class="dropdown-menu" style="background-color: aliceblue;width:90%">
                      <li><a class="dropdown-item" href="#" style="display: flex;"> <i class="fas fa-user fa-sm fa-fw mr-2row text-gray-400"></i>
                        <p>Mon compte</p>
                        <span>></span></a></li>
                      <li><a class="dropdown-item" href="#"> <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        <p>Changer mot de passe</p>
                        <span>></span></a></li>
                        <hr>
                        <li><a class="dropdown-item" href="../controllers/DeconnexionController.php" style="padding-top:8%;"> <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
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
                    <div class="reinscription">
                        <div class="sub-menu-wrap" id="subMenu3">
                            <div class="sub-menu">
                                <ul style="padding-left:30%;margin-top:0px;color: aliceblue;padding-top: 10px;"><li  onclick="toggleMenu('subMenu3')">Reinscription</li></ul>
                                <div style="background-color: aliceblue;width:70%;margin-left: 70px;height:auto;padding-top: 2px;border-radius:10px">
                                    <ul style="padding-left: 2px;list-style: none;"><li style="margin-left:0px ;"> <a href="" style="padding-left: 10px;color:#3a3b45;">Reinscription a l'Ensah</a></li>
                                    <li> <a href="" style="padding-left: 10px;color:#3a3b45">Reinscription a l'internat</a></li></ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="demandes">
                        <div class="sub-menu-wrap" id="subMenu4">
                            <div class="sub-menu">
                                <ul style="padding-left:30%;margin-top:0px;color: aliceblue;padding-top: 10px;"><li  onclick="toggleMenu('subMenu4')">Demandes</li></ul>
                                <div style="background-color: aliceblue;width:70%;margin-left: 70px;height:auto;padding-top: 2px;border-radius: 10px;">
                                    <ul style="list-style: none;padding-left: 2px;"><li><a href="" style="padding-left: 10px;color:#3a3b45;">Nouvelle demande</a></li>
                                    <li style="padding-left: 0px;"> <a href="" style="padding-left: 10px;color:#3a3b45">Etat de ma demande</a></li></ul>
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
                                <a style="padding-left: 10px;color:#3a3b45;margin-top: 30px;">Consulter</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="endbar" style="margin-bottom:0%">
                <a href="" style="padding-top:10%;" > <i class="fa-solid fa-gear" style="color: antiquewhite;padding-left:5%;"></i></a>
                <div style="padding-left:30%;padding-right:0%;"> <a href=""><img src="abdelmalek_saadi-removebg-preview.png" style="width:70%;"></a></div>
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
                        <i class="fas fa-bell notification" ></i>
                        <i class="fa-solid fa-envelope message"></i>
                        <button class="btn btn-primary" type="submit">
                            <i class="fa-solid fa-robot chat" onclick="window.location.href = '../chatbot/index.html'"></i>

                    </button>
                    </div>
                </div>
            </nav>
            <div class="topbar" style="background-color:rgb(238, 237, 237);" style="height: 80px;" style="margin-top:0%;">
                <a href="" class="items" style="background-color:#095bf5;" ><span>Cours</span> 
                    <span><i class="fas fa-book-reader fa-2x text-gray-300" id="notif"></i></span></a>
                <a href="" class="items" style="background-color: #77787a;"><span>Notifications</span>
                    <span><i class="fa-solid fa-bell"></i></span></a>
                <a href="" class="items" style="background-color:  #6e0606"><span>Demandes</span>
                    <span><i class="fas fa-file-alt fa-2x text-gray-300"></i></span>
                </a>
                <a href="" class="items" style="background-color: #e60d79;"><span>Emplois</span>
                    <span><i class="fas fa-calendar fa-2x text-gray-300"></i></span>
                </a>
            </div>
            <div class="row1" style=" background: linear-gradient(to bottom,   rgb(204, 202, 202), rgb(249, 249, 250));"> 
                <div class="container-fluid" style="padding: 0;">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="Avisbar">
                                <div class="card-header" style="padding-top: 10px;">
                                    <h5 style="color:#0c6cfc">Avis</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text"><a href="" style="color:rgb(93, 97, 104);text-decoration: none;">Avis aux élèves ingénieurs GEER1. Module : Modélisation numérique 1 : Séance de rattrapage </a></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="groupbar">
                                <div class="notifcoursbar">
                                    <div class="coursbar" style="padding-left: 30px;">
                                            <button type="submit" class="btn btn-primary" style="margin-top: 2%;width:100px">Cours</button>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo nostrum deserunt voluptates magni temporibus facilis, sunt placeat commodi quae id voluptas veniam ipsam consequuntur corporis animi fugiat dolorem consequatur. Repellat.</p>
                                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dolorum ea provident exercitationem iure, consectetur doloremque quae veniam corporis quas dolores quos quasi expedita eligendi. Hic, molestias. Et sed autem praesentium!</p>
                                    </div>
                                    <div class="notifsbar" style="padding-left: 30px;">
                                        <h5 style="color:  #0c6cfc;">Notifications</h5>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo nostrum deserunt voluptates magni temporibus facilis, sunt placeat commodi quae id voluptas veniam ipsam consequuntur corporis animi fugiat dolorem consequatur. Repellat.</p>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus eius quibusdam inventore iure, illo autem! Distinctio cupiditate architecto eos itaque quis iusto praesentium iure quibusdam facere commodi, quisquam sint pariatur.</p>
                                    </div>
                                </div> 
                                <div class="eventsbar" style="padding-left: 30px;">
                                    <h5  style="color:  #0c6cfc;">Évènements</h5>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo nostrum deserunt voluptates magni temporibus facilis, sunt placeat commodi quae id voluptas veniam ipsam consequuntur corporis animi fugiat dolorem consequatur. Repellat.</p>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus eius quibusdam inventore iure, illo autem! Distinctio cupiditate architecto eos itaque quis iusto praesentium iure quibusdam facere commodi, quisquam sint pariatur.</p>
                                </div>
                            </div>
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