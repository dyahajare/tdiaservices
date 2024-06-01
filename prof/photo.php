<?php
require_once 'entete.php';

try {
    // Connexion à la base de données
    $conn = new PDO("mysql:host=localhost;dbname=projetweb", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['cin'])) {
        // Récupérer les données du formulaire
        $cin = htmlspecialchars($_POST['cin']);
        $photo = isset($_POST['photo']) ? htmlspecialchars($_POST['photo']) : '';

        // Requête pour récupérer les informations du professeur
        $req = $conn->prepare("SELECT * FROM professeur WHERE cin = :cin");
        $req->bindParam(':cin', $cin);
        $req->execute();
        $professeur = $req->fetch(PDO::FETCH_ASSOC);

        // Vérifier si un professeur a été trouvé
        if (!$professeur) {
            echo "Aucun professeur trouvé avec ce CIN.";
            exit;
        }
    } else {
        echo "Aucun CIN fourni.";
        exit;
    }
} catch (PDOException $ex) {
    // Gestion des erreurs PDO
    echo "Erreur: " . $ex->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Profil du Professeur</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .btn {
            background-color: #007bff;
            border: none;
        }

        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Modifier le Profil du Professeur</h3>
                    </div>
                    <div class="card-body">
                        <form action="modif_photo.php" method="post">
                        <div class="form-group">
                                <label for="cin">CIN :</label>
                                <input type="text" class="form-control" id="cin" name="cin" value="<?php echo htmlspecialchars($professeur['cin']); ?>" readonly>
                            </div>
                            <div class="form-group">
                            <label for="nom">photo:</label>
                                <input type="text" class="form-control" id="photo" name="photo" value="<?php echo htmlspecialchars($professeur['photo']); ?>">
                            </div>
                          
                           
                         
                            <!-- Ajoutez ici d'autres champs à modifier -->
                            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
