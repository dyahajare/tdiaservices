// controller.php
<?php
session_start();
require_once 'vendor/autoload.php';
require_once 'models/GradeModel.php';

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

$model = new GradeModel($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_classe = $_POST['nom_classe'] ?? '';

    $moduleData = $model->getModuleData($nom_classe);

    $allGrades = [];
    foreach ($moduleData as $module) {
        $filePath = $module['notes'];
        $moduleGrades = $model->processGradesFile($filePath);
        $module['grades'] = $moduleGrades;
        $allGrades[] = $module;
    }

    include 'views/result.php';
}
?>
