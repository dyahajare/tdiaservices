<?php
// Inclusion du fichier d'en-tête
require_once 'entete.php';
?>

<?php
try {
    // Etablir une connexion à la base de données
    $conn = new PDO("mysql:host=localhost;dbname=projetweb", "root", "");
    // Définir PDO pour lancer des exceptions en cas d'erreur
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête pour sélectionner tous les enregistrements de la table "actualité"
    $req = "SELECT * FROM actualité";
    $ps = $conn->prepare($req);
    $ps->execute();
    // Récupérer tous les résultats de la requête
    $res = $ps->fetchAll();
} catch (PDOException $ex) {
    // Capturer toute erreur de connexion à la base de données
    echo "Oops erreur: " . $ex->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualités</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

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
                            <img src="uploads/<?php echo htmlspecialchars($actualité['img_actu']); ?>" class="card-img-top" alt="Image de l'actualité">
                        <?php } ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo htmlspecialchars($actualité['titre_actu']); ?></h5>
                            <p class="card-text"><?php echo nl2br(htmlspecialchars($actualité['msg_actu'])); ?></p>
                            <?php if (!$isImageType && empty($actualité['img_actu'])) { ?>
                                <a href="uploads/<?php echo htmlspecialchars($actualité['msg_actu']); ?>" class="btn btn-primary" download>Télécharger</a>
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
