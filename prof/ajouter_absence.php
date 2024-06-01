<?php
// Vérification si la classe est spécifiée dans l'URL
if (isset($_GET['classe'])) {
    $classe = $_GET['classe'];
    // Génération du nom de fichier avec la date actuelle (par exemple)
    $filename = date('Y-m-d') . '_' . str_replace(' ', '_', $classe) . '.txt';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Traitement du formulaire de saisie de l'absence
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $absence = $_POST['absence'];

        // Construction de la ligne à ajouter dans le fichier
        $data = "$nom $prenom: $absence\n";

        // Ajout de la ligne dans le fichier
        file_put_contents($filename, $data, FILE_APPEND | LOCK_EX);
        echo 'Absence ajoutée avec succès!';
    }
    ?>
    <h2>Ajouter une absence pour <?php echo $classe; ?></h2>
    <form method="post">
        Nom: <input type="text" name="nom"><br>
        Prénom: <input type="text" name="prenom"><br>
        Absence: <input type="text" name="absence"><br>
        <input type="submit" value="Ajouter">
    </form>
    <?php
} else {
    echo 'Erreur: Classe non spécifiée.';
}
?>
