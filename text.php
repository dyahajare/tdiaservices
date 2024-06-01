<?php
require __DIR__ . '/../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

// Chemin vers le fichier Excel
$filePath = 'path/to/your/excel/file.xlsx';

// Charger le fichier Excel existant
$spreadsheet = IOFactory::load($filePath);

/** @var Worksheet $worksheet */
$worksheet = $spreadsheet->getActiveSheet();

// Parcourir les lignes pour lire les données et calculer la note totale
$highestRow = $worksheet->getHighestRow();
for ($row = 2; $row <= $highestRow; $row++) { // Supposons que la première ligne est l'en-tête
    $nomModule = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
    $nomEtudiant = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
    $noteDs = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
    $noteExam = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
    
    // Calcul de la note totale (exemple : 40% DS + 60% Exam)
    $noteTotale = ($noteDs * 0.4) + ($noteExam * 0.6);
    
    // Écrire la note totale dans la colonne appropriée (colonne 5 dans cet exemple)
    $worksheet->setCellValueByColumnAndRow(5, $row, $noteTotale);
}

// Enregistrer les modifications dans le fichier Excel
$writer = new Xlsx($spreadsheet);
$writer->save($filePath);

echo "Les calculs ont été effectués et les notes totales ont été mises à jour dans le fichier Excel.";
