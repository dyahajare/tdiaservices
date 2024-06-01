<?php
// Connexion à la base de données
$conn = new PDO("mysql:host=localhost;dbname=projetweb", "root", "");

// Vérification de la requête AJAX
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cne'])) {
    $cne = $_POST['cne'];
    
    // Mise à jour du nombre d'absences dans la base de données
    $stmt = $conn->prepare("UPDATE etudiant SET absence = absence + 1 WHERE cne = :cne");
    $stmt->bindParam(':cne', $cne);
    if ($stmt->execute()) {
        echo "Absence ajoutée avec succès";
    } else {
        echo "Erreur lors de l'ajout de l'absence";
    }
} else {
    echo "Requête invalide";
}
?>
