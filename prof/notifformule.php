<?php
require_once 'home.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer une Annonce</title>
    <!-- Inclure Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Ajoutez ici vos styles personnalisés qui ne sont pas couverts par Bootstrap */
        .notification-form {
            position: fixed;
            bottom: 20px;
            right: 20px;
            width: 300px;
            background-color: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .notification-form h1 {
            font-size: 18px;
            margin-bottom: 15px;
        }

        .notification-form .form-group {
            margin-bottom: 10px;
        }

        .notification-form label {
            font-weight: bold;
        }

        .notification-form .btn-primary {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="notification-form">
        <h1 class="text-center">Nouvelle Annonce</h1>
        <form action="ajouter_annonce.php" method="post">
            <div class="form-group">
                <label for="classe">Classe :</label>
                <input type="text" class="form-control" id="classe" name="classe" required>
            </div>

            
            <div class="form-group">
                <label for="titre">Titre :</label>
                <input type="text" class="form-control" id="titre" name="titre" required>
            </div>

            <div class="form-group">
                <label for="contenu">Contenu :</label>
                <textarea class="form-control" id="contenu" name="contenu" rows="2" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Créer</button>
        </form>
    </div>

    <!-- Inclure Bootstrap JS (nécessaire pour les fonctionnalités Bootstrap) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
