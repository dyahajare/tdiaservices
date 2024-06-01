
<?php
require_once 'entete.php';



try {
    // Connexion à la base de données
    $conn = new PDO("mysql:host=localhost;dbname=projetweb", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Requête pour récupérer les informations du professeur
    $req = "SELECT * FROM professeur";

    // Exécution de la requête
    $ps = $conn->query($req);
    $professeurs = $ps->fetchAll();

    // Vérifier s'il y a des résultats
    if (!empty($professeurs)) {
        // Accéder aux données du premier professeur
        $professeur = $professeurs[0];
    } else {
        echo "Aucun professeur trouvé avec ce nom.";
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
    <title>Profil du Professeur</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
        }

        .profile-info {
            text-align: left;
        }

        .profile-info img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-bottom: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .profile-info p {
            margin: 5px 0;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            border-radius: 10px 10px 0 0;
            padding: 15px;
            text-align: center;
        }

        .card-title {
            margin-bottom: 0;
        }

        .card-body {
            padding: 30px;
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
                        <h3 class="card-title">Profil du Professeur</h3>
                    </div>
                    <div class="card-body">
                        <div class="profile-info text-center">
                        <img src="<?php echo $_SESSION['profileImage']; ?>" class="img-fluid profile-image" style=" width: 100px;  height: auto; max-width: 100%;  border-radius: 50%; " alt="Photo de profil">
                            <p><strong>Nom :</strong> <?php echo htmlspecialchars($_SESSION['nom']); ?></p>
                            <p><strong>Nom en arabe :</strong> <?php echo htmlspecialchars($_SESSION['nomarab']); ?></p>
                            <p><strong>Prénom :</strong> <?php echo htmlspecialchars($_SESSION['prenom']); ?></p>
                            <p><strong>Prénom en arabe :</strong> <?php echo htmlspecialchars($_SESSION['prenomarab']); ?></p>
                            <p><strong>CIN :</strong> <?php echo htmlspecialchars($_SESSION['cin']); ?></p>
                            <p><strong>Téléphone :</strong> <?php echo htmlspecialchars($_SESSION['telephone']); ?></p>
                            <p><strong>Email Professionnel :</strong> <?php echo htmlspecialchars($_SESSION['emailPro']); ?></p>
                            <p><strong>Email Personnel :</strong> <?php echo htmlspecialchars($_SESSION['emailPerso']); ?></p>
                            <p><strong>Sexe :</strong> <?php echo htmlspecialchars($_SESSION['sex']); ?></p>
                            <p><strong>Situation Familiale :</strong> <?php echo htmlspecialchars($_SESSION['situationFamiliale']); ?></p>
                            <p><strong>Pays :</strong> <?php echo htmlspecialchars($_SESSION['pays']); ?></p>
                        </div>
                        <div class="text-center">
                        <form action="modifprofile.php" method="POST" style="display:inline;">
                            <input type="hidden" name="cin" value="<?php echo htmlspecialchars($_SESSION['cin']); ?>">
                             <input type="submit" value="Modifier Profil" class="btn btn-primary">
                        </form>

                        </div>
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
