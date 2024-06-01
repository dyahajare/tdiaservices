<?php
 
require_once 'entete.php';


try {
    // Establishing a connection to the database
    $conn = new PDO("mysql:host=localhost;dbname=projetweb", "root", "");
    // Setting PDO to throw exceptions on error
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to select all records from the "classe" table
    $req = "
        SELECT DISTINCT classe.nom, classe.année, classe.département, classe.coordinateur
        FROM classe
        INNER JOIN cours ON classe.nom = cours.classe_cours
        WHERE cours.cin_prof = :cin";
    $ps = $conn->prepare($req);
    $ps->execute(['cin' => $_SESSION['cin']]);
    // Fetching all rows from the result set
    $res = $ps->fetchAll();
} catch (PDOException $ex) {
    // Catching any database connection errors
    echo "Oops erreur: " . $ex->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes classes existantes</title>
    <!-- Liens vers des fichiers CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Style CSS personnalisé -->
    <style>
        .container {
            margin-top: 10px;
        }
        .panel-heading {
            background-color: #f8f9fa;
            padding: 20px;
            border-bottom: 1px solid #dee2e6;
        }
        .panel-body {
            padding: 20px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .btn-details {
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container" >
        <div class="col-md-10 offset-md-1" >
            <div class="panel panel-default " style="margin-top: 0%;">
                <div class="panel-heading">
                <h1 style="font-size: 24px; font-weight: bold; color: #333; text-align: center"><a href="Addcours.php"><i class="fas fa-plus" style="padding-right: 5%;"></i></a>mes classe existe</h1>
                </div>
                <div class="panel-body" >
                    <!-- Table to display fetched data -->
                    <table class="table table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Classe</th>
                                <th>Année</th>
                                <th>Département</th>
                                <th>Coordinateur</th>
                                <th>Cours</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($res)) : ?>
                                <?php foreach ($res as $classe) : ?>
                                    <tr>
                                        <td><?php echo $classe['nom']; ?></td>
                                        <td><?php echo $classe['année']; ?></td>
                                        <td><?php echo $classe['département']; ?></td>
                                        <td><?php echo $classe['coordinateur']; ?></td>
                                        <td>
                                            <a href="coursarchive.php?classe_cours=<?php echo $classe['nom']; ?>" class="btn btn-success btn-details">archivage</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="5">Aucune classe trouvée pour le moment</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
