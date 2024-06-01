<?php
// Création d'un PDF d'exemple (vous devrez remplacer cela par votre propre logique de génération de PDF)
$pdfContent = "
<!DOCTYPE html>
<html lang='fr'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Emploi du temps</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Emploi du temps</h1>
    <p>Ceci est un exemple d'emploi du temps.</p>
</body>
</html>
";

// Nom du fichier PDF à télécharger
$fileName = "emploi_temps.pdf";

// Envoi des en-têtes pour indiquer au navigateur qu'il s'agit d'un fichier PDF à télécharger
header("Content-Type: application/pdf");
header("Content-Disposition: attachment; filename='$fileName'");

// Génération et sortie du contenu PDF
echo $pdfContent;
