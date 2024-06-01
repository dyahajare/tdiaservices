<?php
include('connection.php');
session_start();

if(isset($_POST['user']) && isset($_POST['pass'])) { 
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

    if($count_etudiant == 1) {
        echo "<h1>Bonjour étudiant.</h1>";
    } else {
        // Requête pour le personnel
        $sql_personnel = "SELECT * FROM personnel WHERE emailPro_personnel = :username AND mot_pass = :password";
        $stmt_personnel = $conn->prepare($sql_personnel);
        $stmt_personnel->execute(array(':username' => $username, ':password' => $password));
        $count_personnel = $stmt_personnel->rowCount();

        if($count_personnel == 1) {
            echo "<h1>Bonjour personnel.</h1>";
        } else {
            // Requête pour les professeurs
            $sql_professeur = "SELECT * FROM professeur WHERE emailPro = :username AND mot_pass = :password";
            $stmt_professeur = $conn->prepare($sql_professeur);
            $stmt_professeur->execute(array(':username' => $username, ':password' => $password));
            $count_professeur = $stmt_professeur->rowCount();

            if($count_professeur == 1) {
                // Récupérer les informations du professeur
                $professeur = $stmt_professeur->fetch(PDO::FETCH_ASSOC);
                
                // Stocker les informations du professeur en session
                $_SESSION['nom'] = $professeur['nom_prof'];
                $_SESSION['profileImage'] =  'uploads/' .$professeur['photo'];
                $_SESSION['prenom'] = $professeur['prenom_prof'];
                $_SESSION['nomarab'] = $professeur['nom_prof_arabe'];
                $_SESSION['prenomarab'] = $professeur['prenom_prof_arabe'];
                $_SESSION['cin'] = $professeur['cin'];
                $_SESSION['telephone'] = $professeur['telephone'];
                $_SESSION['emailPro'] = $professeur['emailPro'];
                $_SESSION['emailPerso'] = $professeur['emailPerso'];
                $_SESSION['sex'] = $professeur['sexe'];
                $_SESSION['pays'] = $professeur['pays'];
                $_SESSION['situationFamiliale'] = $professeur['situationFamiliale'];
                $_SESSION['emploi_temps'] = $professeur['emploi_temps'];

               

              


                // Rediriger vers la page d'accueil
                header("Location:home.php");
                exit();
            } else {
                echo "<h1>Connexion échouée. Nom d'utilisateur ou mot de passe invalide.</h1>";
            }
        }
    }
} else {
    echo "Nom d'utilisateur ou mot de passe non fourni.";
}
?>
