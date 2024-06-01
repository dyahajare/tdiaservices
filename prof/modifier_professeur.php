<?php

 session_start();


?>
<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $cin = $_POST['cin'];
    $nom = $_POST['nom'];
    $nom_arabe = $_POST['nom_arabe'];
    $prenom = $_POST['prenom'];
    $prenom_arabe = $_POST['prenom_arabe'];
    $telephone = $_POST['telephone'];
    $emailPro = $_POST['emailPro'];
    $emailPerso = $_POST['emailPerso'];
    $sexe = $_POST['sexe'];
    $situationFamiliale = $_POST['situationFamiliale'];
    $pays = $_POST['pays'];

    // Validation des entrées (exemple basique)
    if (empty($cin) || empty($nom) || empty($prenom) || empty($emailPro)) {
        echo "Erreur : Les champs obligatoires ne peuvent pas être vides.";
        exit;
    }

    try {
        // Connexion à la base de données
        $conn = new PDO("mysql:host=localhost;dbname=projetweb", "root", "");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Commencer une transaction
        $conn->beginTransaction();

        // Requête pour mettre à jour le professeur
        $sql = "UPDATE professeur SET 
                    nom_prof = :nom, 
                    nom_prof_arabe = :nom_arabe, 
                    prenom_prof = :prenom, 
                    prenom_prof_arabe = :prenom_arabe, 
                    telephone = :telephone, 
                    emailPro = :emailPro, 
                    emailPerso = :emailPerso, 
                    sexe = :sexe, 
                    situationFamiliale = :situationFamiliale, 
                    pays = :pays 
                WHERE cin = :cin";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':nom_arabe', $nom_arabe);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':prenom_arabe', $prenom_arabe);
        $stmt->bindParam(':cin', $cin);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':emailPro', $emailPro);
        $stmt->bindParam(':emailPerso', $emailPerso);
        $stmt->bindParam(':sexe', $sexe);
        $stmt->bindParam(':situationFamiliale', $situationFamiliale);
        $stmt->bindParam(':pays', $pays);

        // Exécution de la requête
        $stmt->execute();

        // Valider la transaction
        $conn->commit();

        header("Location: profile.php");
    } catch (PDOException $ex) {
        // En cas d'erreur, annuler la transaction
        $conn->rollBack();
        echo "Erreur : " . $ex->getMessage();
    }
} else {
    echo "Erreur : méthode de requête non autorisée.";
}
?>
