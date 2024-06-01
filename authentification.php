<?php
session_start();
$session_duration = 900;
// Détruire la session si elle existe
session_unset();
session_destroy();

// Empêcher la mise en cache de la page
header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date dans le passé
header("Pragma: no-cache"); // HTTP/1.0

if (isset($_POST['user']) && isset($_POST['pass'])) {
    $username = $_POST['user'];
    $password = $_POST['pass'];

    // Connexion à la base de données avec PDO
    try {
        $conn = new PDO("mysql:host=localhost;dbname=projetweb", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Erreur de connexion à la base de données: " . $e->getMessage();
        exit();
    }

    // Requête pour les étudiants
    $sql_etudiant = "SELECT * FROM etudiant WHERE emailAcadémique = :username AND mot_pass = :password";
    $stmt_etudiant = $conn->prepare($sql_etudiant);
    $stmt_etudiant->execute(array(':username' => $username, ':password' => $password));
    $count_etudiant = $stmt_etudiant->rowCount();

    if ($count_etudiant == 1) {
        echo "<h1>Bonjour étudiant.</h1>";
    } else {
        // Requête pour le personnel
        $sql_personnel = "SELECT * FROM personnel WHERE emailPro_personnel = :username AND mot_pass = :password";
        $stmt_personnel = $conn->prepare($sql_personnel);
        $stmt_personnel->execute(array(':username' => $username, ':password' => $password));
        $count_personnel = $stmt_personnel->rowCount();
        
        // Afficher la requête SQL et les paramètres
        echo "SQL Query: " . $sql_personnel . "<br>";
        echo "Params: " . htmlspecialchars($username) . ", " . htmlspecialchars($password) . "<br>";


        echo "Personnel Count: " . $count_personnel . "<br>";

        if ($count_personnel == 1) {
            // Récupérer les informations du personnel
            $personnel = $stmt_personnel->fetch(PDO::FETCH_ASSOC);
            echo "<pre>";
            print_r($personnel);
            echo "</pre>";
            // Recréer la session après la destruction
            session_start();

            // Stocker les informations du personnel en session
            $_SESSION['emailPro'] = $personnel['emailPro_personnel'];
            $_SESSION['nom'] = $personnel['nom_personnel'];
            $_SESSION['prenom'] = $personnel['prenom_personnel'];
            $_SESSION['profileImage'] = $personnel['photo_personnel'];
            $_SESSION['cin'] = $personnel['cin'];
            $_SESSION['telephone'] = $personnel['telephone'];
            $_SESSION['emailPerso'] = $personnel['emailPerso_personnel'];
            $_SESSION['sexe'] = $personnel['sexe'];
            $_SESSION['Statut'] = $personnel['Statut'];
            $_SESSION['situationFamiliale'] = $personnel['Situation_Famillial'];

            // Rediriger vers la page d'accueil
            header("Location: ../controllers/AdminController.php");
            exit();
        } else {
            // Requête pour les professeurs
            $sql_professeur = "SELECT * FROM professeur WHERE emailPro = :username AND mot_pass = :password";
            $stmt_professeur = $conn->prepare($sql_professeur);
            $stmt_professeur->execute(array(':username' => $username, ':password' => $password));
            $count_professeur = $stmt_professeur->rowCount();

            if ($count_professeur == 1) {
                // Récupérer les informations du professeur
                $professeur = $stmt_professeur->fetch(PDO::FETCH_ASSOC);

                // Recréer la session après la destruction
                session_start();

                // Stocker les informations du professeur en session
                $_SESSION['emailPro'] = $professeur['emailPro'];
                $_SESSION['nom'] = $professeur['nom_prof'];
                $_SESSION['profileImage'] = $professeur['photo'];
                $_SESSION['prenom'] = $professeur['prenom_prof'];
                $_SESSION['nomarab'] = $professeur['nom_prof_arabe'];
                $_SESSION['prenomarab'] = $professeur['prenom_prof_arabe'];
                $_SESSION['cin'] = $professeur['cin'];
                $_SESSION['telephone'] = $professeur['telephone'];
                $_SESSION['emailPerso'] = $professeur['emailPerso'];
                $_SESSION['sex'] = $professeur['sexe'];
                $_SESSION['pays'] = $professeur['pays'];
                $_SESSION['situationFamiliale'] = $professeur['situationFamiliale'];
                $_SESSION['emploi_temps'] = $professeur['emploi_temps'];

                // Rediriger vers la page d'accueil
                header("Location:  mesclasses.php");
                exit();
            } else {
                echo "Nom d'utilisateur ou mot de passe incorrect.";
            }
        }
    }
} else {
    echo "Nom d'utilisateur ou mot de passe non fourni.";
}
?>