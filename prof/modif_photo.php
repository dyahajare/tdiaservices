<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Récupérer les données du formulaire
    $cin = $_POST['cin'];
    $photo = $_POST['photo'];

    // Validation des entrées (exemple basique)
    if (empty($cin) || empty($photo)) {
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
           photo = :photo
             WHERE cin = :cin";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':photo', $photo);
        $stmt->bindParam(':cin', $cin);

        // Exécution de la requête
        $stmt->execute();

        // Valider la transaction
        $conn->commit();

        header("Location: profile.php");
    } catch (PDOException $ex) {
        // En cas d'erreur PDO, annuler la transaction et afficher un message d'erreur
        $conn->rollBack();
        echo "Erreur PDO : " . $ex->getMessage();
    } catch (Exception $ex) {
        // En cas d'erreur générale, afficher un message d'erreur
        echo "Erreur : " . $ex->getMessage();
    }
} else {
    echo "Erreur : méthode de requête non autorisée.";
}
?>
