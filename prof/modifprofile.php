<?php
require_once 'entete.php';

try {
    // Connexion à la base de données
    $conn = new PDO("mysql:host=localhost;dbname=projetweb", "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Vérifier si le CIN est passé en paramètre
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cin'])) {
        $cin = htmlspecialchars($_POST['cin']);

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
                        <form action="modifier_professeur.php" method="post">
                            <div class="form-group">
                                <label for="cin">CIN :</label>
                                <input type="text" class="form-control" id="cin" name="cin" value="<?php echo htmlspecialchars($professeur['cin']); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="nom">Nom :</label>
                                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo htmlspecialchars($professeur['nom_prof']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="nom_arabe">Nom en arabe :</label>
                                <input type="text" class="form-control" id="nom_arabe" name="nom_arabe" value="<?php echo htmlspecialchars($professeur['nom_prof_arabe']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="prenom">Prénom :</label>
                                <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo htmlspecialchars($professeur['prenom_prof']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="prenom_arabe">Prénom en arabe :</label>
                                <input type="text" class="form-control" id="prenom_arabe" name="prenom_arabe" value="<?php echo htmlspecialchars($professeur['prenom_prof_arabe']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="telephone">Téléphone :</label>
                                <input type="text" class="form-control" id="telephone" name="telephone" value="<?php echo htmlspecialchars($professeur['telephone']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="emailPro">Email Professionnel :</label>
                                <input type="email" class="form-control" id="emailPro" name="emailPro" value="<?php echo htmlspecialchars($professeur['emailPro']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="emailPerso">Email Personnel :</label>
                                <input type="email" class="form-control" id="emailPerso" name="emailPerso" value="<?php echo htmlspecialchars($professeur['emailPerso']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="sexe">Sexe :</label>
                                <input type="text" class="form-control" id="sexe" name="sexe" value="<?php echo htmlspecialchars($professeur['sexe']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="situationFamiliale">Situation Familiale :</label>
                                <input type="text" class="form-control" id="situationFamiliale" name="situationFamiliale" value="<?php echo htmlspecialchars($professeur['situationFamiliale']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="pays">Pays :</label>
                                <input type="text" class="form-control" id="pays" name="pays" value="<?php echo htmlspecialchars($professeur['pays']); ?>">
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
