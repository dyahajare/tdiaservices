<?php
session_start();
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\IOFactory;

$host = 'localhost';
$db_name = 'projetweb';
$user = 'root';
$password = '';

$dsn = "mysql:host=$host;dbname=$db_name;charset=utf8";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $password, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

function processGradesFile($filePath) {
    $spreadsheet = IOFactory::load($filePath);
    $sheet = $spreadsheet->getActiveSheet();
    return $sheet->toArray();
}

function getModuleData($pdo, $nom_classe) {
    $stmt = $pdo->prepare('SELECT nom_module, notes FROM modules WHERE nom_classe = ?');
    $stmt->execute([$nom_classe]);
    return $stmt->fetchAll();
}

function getStudentResult($grades, $cne) {
    foreach ($grades as $row) {
        if ($row[5] == $cne) {
            $final_grade = $row[4];
            $class_name = $_POST['nom_classe'] ?? '';
            return calculateResult($final_grade, $class_name);
        }
    }
    return 'N/A';
}

function calculateResult($final_grade, $class_name) {
    if (in_array($class_name, ['CP1', 'CP2'])) {
        if ($final_grade >= 10) {
            return 'validé';
        } else {
            return 'rattrapage';
        }
    } else {
        if ($final_grade >= 12) {
            return 'validé';
        } else {
            return 'rattrapage';
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_classe = $_POST['nom_classe'] ?? '';

    $moduleData = getModuleData($pdo, $nom_classe);

    $allGrades = [];
    foreach ($moduleData as $module) {
        $filePath = $module['notes'];
        $moduleGrades = processGradesFile($filePath);
        $module['grades'] = $moduleGrades;
        $allGrades[] = $module;
    }

    
}
?>