<?php


try {
    $conn = new PDO('mysql:host=localhost;dbname=projetweb;', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    echo $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si tous les champs requis sont présents
    if (isset($_POST['nom']) && isset($_POST['cin']) && isset($_POST['ds_percentage']) && isset($_POST['exam_percentage']) && isset($_FILES['file']) ) {
        // Récupérer les données du formulaire
        $nom_classe = htmlspecialchars($_POST['nom']);
        $cin_prof = htmlspecialchars($_POST['cin']);
        $ds_percentage = htmlspecialchars($_POST['ds_percentage']);
        $exam_percentage = htmlspecialchars($_POST['exam_percentage']);
        $module = htmlspecialchars($_POST['modules']);

        // Gérer le téléchargement du fichier
        $file_name = $_FILES['file']['name'];
        $file_tmp = $_FILES['file']['tmp_name'];
        $file_size = $_FILES['file']['size'];
        $file_error = $_FILES['file']['error'];

        // Vérifier si aucun problème n'est survenu lors du téléchargement du fichier
        if ($file_error === 0) {
            // Déplacer le fichier téléchargé vers le dossier de destination
            $destination = 'uploads/' . $file_name;
            move_uploaded_file($file_tmp, $destination);

            try {
                // Préparer la requête d'insertion
                $stmt = $conn->prepare('INSERT INTO modules (nom_classe, cin_prof, pourcentage_ds, pourcentage_exam, nom_module, notes) VALUES (?, ?, ?, ?, ?, ?)');
                // Exécuter la requête
                $stmt->execute([$nom_classe, $cin_prof, $ds_percentage, $exam_percentage, $module, $file_name]);

                // Chemin vers le fichier CSV
                $filePath = $destination;

                if (file_exists($filePath)) {
                    // Ouvrir le fichier CSV en lecture
                    if (($handle = fopen($filePath, 'r')) !== FALSE) {
                        $data = [];
                        $header = fgetcsv($handle, 1000, ";"); // Lire la première ligne comme en-tête

                        // Lire les lignes suivantes
                        while (($row = fgetcsv($handle, 1000, ";")) !== FALSE) {
                            // Remplacer les virgules par des points pour les valeurs numériques
                            $row[2] = str_replace(',', '.', $row[2]);
                            $row[3] = str_replace(',', '.', $row[3]);

                            // Vérifiez que les colonnes existent avant de les utiliser
                            if (isset($row[2]) && isset($row[3]) && is_numeric($row[2]) && is_numeric($row[3])) {
                                $noteDs = floatval($row[2]); // Supposons que la note DS est dans la colonne 3
                                $noteExam = floatval($row[3]); // Supposons que la note Exam est dans la colonne 4
                                // Assurez-vous que les pourcentages sont corrects
                                if (is_numeric($ds_percentage) && is_numeric($exam_percentage)) {
                                    $noteTotale = ($noteDs * $ds_percentage / 100 ) + ($noteExam * $exam_percentage / 100 );
                                    $row[4] = $noteTotale;
                                } else {
                                    $row[4] = 'N/A';
                                }
                            } else {
                                // Si les colonnes sont absentes ou non numériques, ajouter 'N/A'
                                $row[4] = 'N/A';
                            }
                            $data[] = $row; // Ajoutez chaque ligne traitée au tableau de données
                        }
                        fclose($handle);

                        // Ajouter la colonne de note totale à l'en-tête si elle n'existe pas
                        if (!in_array('Note Totale', $header)) {
                            $header[] = 'Note Totale';
                        }

                        // Écrire les données mises à jour dans le fichier CSV
                        if (($handle = fopen($filePath, 'w')) !== FALSE) {
                            fputcsv($handle, $header, ";"); // Écrire l'en-tête
                            foreach ($data as $row) {
                                fputcsv($handle, $row, ";");
                            }
                            fclose($handle);
                        }

                        // Redirection après la mise à jour des notes
                        header("Location: /prof/affclasse.php");

                        exit();
                    } else {
                        echo "Erreur : Impossible d'ouvrir le fichier CSV.";
                    }
                } else {
                    echo "Erreur : Le fichier CSV spécifié n'existe pas.";
                }
            } catch (PDOException $e) {
                echo 'Erreur : ' . $e->getMessage();
            }
        } else {
            echo 'Une erreur est survenue lors du téléchargement du fichier.';
        }
    } else {
        echo 'Veuillez remplir tous les champs du formulaire.';
    }
} else {
    echo 'Le formulaire n\'a pas été soumis.';
}
?>
