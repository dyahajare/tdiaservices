<?php
// Démarrer la session pour accéder aux variables de session
session_start();

try {
    $conn = new PDO('mysql:host=localhost;dbname=projetweb;', 'root', '');
} catch (Exception $e) {
    echo $e->getMessage();
}

if (isset($_POST['classe']) && isset($_POST['titre']) && isset($_POST['type']) && isset($_POST['module']) && isset($_FILES['file'])) {
    $classe = $_POST['classe'];
    $titre = $_POST['titre'];
    $type = $_POST['type'];
    $module = $_POST['module'];
    $fileTmpPath = $_FILES['file']['tmp_name'];
    $fileName = $_FILES['file']['name'];
    $date = date('Y-m-d');
    
    // Vérifier si le cin_prof est présent dans la session
    if (isset($_SESSION['cin'])) {
        $cin_prof = $_SESSION['cin'];
        
        // Déplacer le fichier téléchargé vers le dossier de destination
        $destination = "uploads/" . $fileName;
        move_uploaded_file($fileTmpPath, $destination);

        try {
            // Insérer le cours dans la base de données
            $req = $conn->prepare("INSERT INTO cours (classe_cours, type, titre, cin_prof, module, date_publication, document) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $params = array($classe, $type, $titre, $cin_prof, $module, $date, $fileName);
            $req->execute($params);
            header("Location: classecous.php"); // Redirection vers classecous.php
            exit();
        } catch (PDOException $ex) {
            echo "Erreur lors de l'insertion : " . $ex->getMessage();
        }
    } else {
        echo "Erreur: Professeur non authentifié.";
    }
} else {
    echo "Erreur: Veuillez remplir tous les champs.";
}
?>
