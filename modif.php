<?php
// Activer le tampon de sortie
ob_start();

// Connexion à la base de données
try {
    $conn = new PDO('mysql:host=localhost;dbname=projetweb;', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion réussie.<br>";
} catch (PDOException $e) {
    die("Échec de connexion : " . $e->getMessage());
}

if (isset($_POST['submit'])) {
    echo "Formulaire soumis.<br>";

    // Sanitize inputs
    $nom = htmlspecialchars($_POST['titre']);
    $type = htmlspecialchars($_POST['description']);
    $offer = htmlspecialchars($_POST['type_img']);
    $debut = htmlspecialchars($_POST['titr']);
    $img = ''; // Valeur par défaut pour l'image

    echo "Données reçues : Titre - $nom, Description - $type, Type d'image - $offer, Ancien titre - $debut.<br>";

    // Gestion du téléchargement de l'image
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $destination = 'uploads/';
        $cheminDestination = $destination . basename($_FILES['image']['name']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $cheminDestination)) {
            $img = $_FILES['image']['name'];
            echo "Image téléchargée : $img.<br>";
        } else {
            echo "Échec du téléchargement de l'image.<br>";
        }
    } else {
        // Conserver l'ancienne image si aucune nouvelle image n'est téléchargée
        $sql = "SELECT img_actu FROM actualité WHERE titre_actu = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$debut]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            $img = $result['img_actu'];
            echo "Utilisation de l'ancienne image : $img.<br>";
        } else {
            echo "Ancien titre non trouvé. Aucune image existante à utiliser.<br>";
        }
    }

    // Préparer la requête de mise à jour
    $sql = "UPDATE actualité SET titre_actu = ?, msg_actu = ?, type_img = ?, img_actu = ? WHERE titre_actu = ?";
    $stmt = $conn->prepare($sql);
    $params = array($nom, $type, $offer, $img, $debut);

    try {
        if ($stmt->execute($params)) {
            echo "Mise à jour réussie. Redirection en cours...<br>";

            // Redirection JavaScript
            echo '<script type="text/javascript">
                    alert("Mise à jour réussie.");
                    window.location.href = "gestionAnnonces.php";
                  </script>';
            exit; // Toujours utiliser exit après une redirection
        } else {
            echo "Erreur lors de l'exécution de la mise à jour.<br>";
        }
    } catch (PDOException $e) {
        echo "Erreur PDO : " . $e->getMessage() . "<br>";
    }
} else {
    echo "Aucun formulaire soumis.<br>";
}

// Terminer le tampon de sortie
ob_end_flush();
?>
