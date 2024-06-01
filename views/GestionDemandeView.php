<?php
class GestionDemandeView {
    public static function render($nom, $profileImage, $prenom, $demandes, $page_number, $total_pages) {
        ?>
        <!doctype html>
        <html lang="en">
        <head>
            <title>Gestion des Demandes</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="../css/pageAdmin.css">
            <script src="https://kit.fontawesome.com/6059183beb.js" crossorigin="anonymous"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <style>
                .dataTables_wrapper .dataTables_filter {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                }

                .dataTables_wrapper .dataTables_filter input {
                    background-color: rgba(19, 19, 97, 0.4);
                    color: #FFE4C4;
                    border: 1px solid #FFE4C4;
                    border-radius: 5px;
                    padding: 5px;
                }

                .dataTables_wrapper .dataTables_filter input::placeholder {
                    color: #FFE4C4;
                }
                
                .dataTables_wrapper .dataTables_filter label {
                    color: #FFE4C4;
                    margin-bottom: 0; /* To align properly with the input */
                }

                .title {
                    font-size: 24px;
                    font-weight: bold;
                    color: #333;
                    margin-right: auto; /* Push the search bar to the right */
                }

                .pagination .page-item .page-link {
                    background-color: rgba(19, 19, 97, 0.4);
                    color: #FFE4C4;
                    border: none;
                    margin: 0 2px;
                    transition: background-color 0.3s, color 0.3s;
                }

                .pagination .page-item.active .page-link {
                    background-color: #131361;
                    color: #FFE4C4;
                    border: none;
                }

                .pagination .page-item .page-link:hover {
                    background-color: #2b2b85;
                    color: #ffffff;
                }

                .table tbody td {
                    background-color: rgba(19, 19, 97, 0.4);
                    color: #FFE4C4;
                }

                .table thead th {
                    background-color: rgba(19, 19, 97, 0.6);
                    color: #FFE4C4;
                }
            </style>
        </head>
        <body>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-0 col-xs-0 sidebar" id="t1">
                        <div id="t2">
                            <cite>E-service Admin</cite>
                        </div>
                        <br><br><br>
                        <div id="t3">
                            <img src="../uploads/<?php echo htmlspecialchars($profileImage, ENT_QUOTES, 'UTF-8'); ?>" height="100" width="100" id="r2">
                            <br>
                            <small><?php echo htmlspecialchars($nom, ENT_QUOTES, 'UTF-8') . " " . htmlspecialchars($prenom, ENT_QUOTES, 'UTF-8'); ?></small>
                        </div>
                        <br><br><hr>
                        <table class="table table-lg">
                            <tbody>
                                <tr>
                                    <th style="padding-left: 10%;">
                                        <i class="fa-solid fa-house" style="color: #FFE4C4;"></i>
                                        <a href="../controllers/AdminController.php" style="text-decoration: none;color: #FFE4C4;font-weight:normal;padding-left: 10%;">Home</a>
                                    </th>
                                </tr>
                                <tr>
                                    <th style="padding-left: 10%;">
                                        <i class="fa-solid fa-address-card" style="color: #FFE4C4;"></i>
                                        <a href="../controllers/AjoutEtudiantController.php" style="text-decoration: none;color: #FFE4C4;font-weight: normal;padding-left: 7%;">Ajout des étudiants</a>
                                    </th>
                                </tr>
                                <tr>
                                    <th style="padding-left: 10%;">
                                        <i class="fa-solid fa-bullhorn" style="color: #FFE4C4;"></i>
                                        <a href="../controllers/GestionAnnoncesController.php" style="text-decoration: none;color: #FFE4C4;font-weight: normal;padding-left: 7%;">Gestion des annonces</a>
                                    </th>
                                </tr>
                                <tr>
                                    <th>
                                        <div id="r4">
                                            <i class="fa-solid fa-clipboard" style="color: #FFE4C4;"></i>
                                            <a href="../controllers/NiveauxController.php" style="text-decoration: none;color: #FFE4C4;font-weight: normal;padding-left: 10%;">Gestion des notes</a>
                                        </div>
                                    </th>                            
                                </tr>
                                <tr>
                                    <th style="padding-left: 10%;">
                                        <i class="fa-solid fa-angles-up" style="color: #FFE4C4;"></i>
                                        <a href="../controllers/NiveauxController.php" style="text-decoration: none;color: #FFE4C4;font-weight:normal;font-size: 15px; padding-left: 10%;">Les niveaux</a>
                                    </th>
                                </tr>
                                <tr>
                                    <th style="padding-left: 10%;">
                                        <i class="fa-solid fa-file-pen" style="color: #FFE4C4;padding-left: 1px;"></i>
                                        <a href="../controllers/GestionDemandeController.php" style="text-decoration: none;color: #FFE4C4;font-size: 95%; font-weight: normal; padding-left: 5%;">Gestion des demandes</a>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                        <br><br><br><br><br><br>
                        <div style="padding-bottom: 0;display: flex;justify-content: space-between;align-items: center;">
                            <div class="dropup">
                                <i class="fa-solid fa-gear" style="color: #FFE4C4;" id="menuButton"></i>
                                <div id="menuContent" class="menu-content">
                                    <a href="../controllers/DeconnexionController.php">Se déconnecter</a>
                                    <a href="../controllers/InfoController.php">Mon profil</a>
                                </div>
                            </div>
                            <img src="../images/abdelmalek_saadi-removebg-preview.png" height="70px" width="70px">
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
                                    <img src="../images/Capture_d_écran_2024-03-28_224640-removebg-preview.png" width="40px" height="40px">
                                </li>
                            </ul>
                        </nav>
                        <br>
                        <br>
                        <br>
                        <div class="title" style="color: #FFE4C4;text-align:center;">Gestion des demandes</div>
                        <br>
                        <br>
                        <table class="table  table-responsive" style="width: 80%;margin-left: 20%;">
                            <thead>
                                <tr>
                                    <th>CNE</th>
                                    <th>Nom</th>
                                    <th>Prénom</th>
                                    <th>Type de Demande</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php foreach ($demandes as $row): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['cne_etu'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars($row['nom_etu'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars($row['prenom_etu'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo htmlspecialchars($row['typeDemande'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><?php echo $row['réalisé'] ? 'Réalisé' : 'Non réalisé'; ?></td>
                                    <td>
                                        <?php if ($row['réalisé'] == 0): ?>
                                            <form method="post" action="GestionDemandeController.php">
                                                <input type="hidden" name="demande_id" value="<?php echo $row['id']; ?>">
                                                <button class="btn btn-success" type="submit" name="valider" id="valider_<?php echo $row['id']; ?>">Valider</button>
                                            </form>
                                        <?php else: ?>
                                            Réalisé
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <!-- Pagination -->
                        <nav>
                            <ul class="pagination justify-content-center">
                                <?php if ($page_number > 1): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?php echo $page_number - 1; ?>">Précédent</a>
                                    </li>
                                <?php endif; ?>
                                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                    <li class="page-item <?php if ($i == $page_number) echo 'active'; ?>">
                                        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                    </li>
                                <?php endfor; ?>
                                <?php if ($page_number < $total_pages): ?>
                                    <li class="page-item">
                                        <a class="page-link" href="?page=<?php echo $page_number + 1; ?>">Suivant</a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </nav>
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
                    if (menu.classList.contains("show")) {
                        menu.classList.remove("show");
                    } else {
                        menu.classList.add("show");
                    }
                });
                $(document).ready(function() {
                    $('#tableDemandes').DataTable({
                        "paging": false,
                        "lengthChange": false,
                        "searching": true,
                        "ordering": true,
                        "info": false,
                        "autoWidth": false
                    });
                });
            </script>
        </body>
        </html>
        <?php
    }
}
?>
