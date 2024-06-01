<?php
require __DIR__ . '/../vendor/autoload.php';
include __DIR__ . '/../connect.php';
session_start();

$response = ['status' => 'error', 'message' => 'Erreur lors de l\'importation des données.'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['excelFile'])) {
    $destination = '/../uploads/';
    if (!file_exists($destination)) {
        mkdir($destination, 0777, true);
    }
    $cheminDestination = $destination . basename($_FILES['excelFile']['name']);
    
    if (move_uploaded_file($_FILES['excelFile']['tmp_name'], $cheminDestination)) {
        $filePath = __DIR__ . '/../uploads/' . basename($_FILES['excelFile']['name']);
        if (file_exists($filePath)) {
            if (($handle = fopen($filePath, 'r')) !== FALSE) {
                $header = fgetcsv($handle, 1000, ";");

                while (($row = fgetcsv($handle, 1000, ";")) !== FALSE) {
                    if (isset($row) && count($row) >= 36) {
                        $cne = $row[0];
                        $nom = $row[1];
                        $prenom = $row[2];
                        $nomArabe = $row[3];
                        $prenomArabe = $row[4];
                        $cin = $row[5];
                        $sexe = $row[6];
                        $pays = $row[7];
                        $dateNaissance = $row[8];
                        $VilleNaissance = $row[9];
                        $VilleNaissanceArabe = $row[10];
                        $provinceNaissance = $row[11];
                        $lieuNaissance = $row[12];
                        $lieuNaissanceArabe = $row[13];
                        $tel = $row[14];
                        $emailPro = $row[15];
                        $emailAcad = $row[16];
                        $telParent = $row[17];
                        $ProfessionPere = $row[18];
                        $ProfessionMere = $row[19];
                        $provinceParent = $row[20];
                        $adresseParent = $row[21];
                        $AnnéeBac = $row[22];
                        $typeBac = $row[23];
                        $mentionBac = $row[24];
                        $provinceObtentionBac = $row[25];
                        $académie = $row[26];
                        $lycée = $row[27];
                        $typelycée = $row[28];
                        $situation = $row[29];
                        $handicape = $row[30];
                        $annéeSup = $row[31];
                        $annéeUAE = $row[32];
                        $source = $row[33];
                        $nom_classe = $row[34];
                        $motPasse = $row[35];
                        
                        $hashedPassword = password_hash($motPasse, PASSWORD_DEFAULT);
                        
                        $req = $conn->prepare("INSERT INTO etudiant (`cne`, `nom`, `nomArabe`, `prenom`, `prenomArabe`, `cin`, `sexe`, `pays`, `dateNaissance`, `villeNaissance`, `villeNaissanceArabe`, `provinceNaissance`, `lieuNaissance`, `lieuNaissanceArabe`, `telephone`, `emailPerso`, `emailAcadémique`, `teleParent`, `ProfessionPere`, `ProfessionMere`, `ProvinceParent`, `adresseParent`, `anneeObtentionBac`, `typeBac`, `mentionBac`, `provinceObtentionBac`, `académie`, `lycée`, `typeLycée`, `situationFamiliale`, `handicape`, `AnnéeInscriptionSup`, `AnnéeInscrUAE`, `source`, `nom_classe`, `mot_pass`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                        if ($req->execute(array($cne, $nom, $nomArabe, $prenom, $prenomArabe, $cin, $sexe, $pays, $dateNaissance, $VilleNaissance, $VilleNaissanceArabe, $provinceNaissance, $lieuNaissance, $lieuNaissanceArabe, $tel, $emailPro, $emailAcad, $telParent, $ProfessionPere, $ProfessionMere, $provinceParent, $adresseParent, $AnnéeBac, $typeBac, $mentionBac, $provinceObtentionBac, $académie, $lycée, $typelycée, $situation, $handicape, $annéeSup, $annéeUAE, $source, $nom_classe, $hashedPassword))) {
                            $response['status'] = 'success';
                            $response['message'] = 'Importation des étudiants réussie !';
                        } else {
                            $response['message'] = 'Erreur lors de l\'insertion des données dans la base.';
                        }
                    } else {
                        $response['message'] = 'Les colonnes sont absentes ou non valides !';
                    }
                }
                fclose($handle);
            } else {
                $response['message'] = 'Erreur : Impossible d\'ouvrir le fichier CSV.';
            }
        } else {
            $response['message'] = 'Erreur : Le fichier CSV spécifié n\'existe pas.';
        }
    } else {
        $response['message'] = 'Erreur : Échec du téléchargement du fichier.';
    }
} else {
    $response['message'] = 'Erreur : Données POST invalides.';
}

header('Content-Type: application/json');
echo json_encode($response);
?>
