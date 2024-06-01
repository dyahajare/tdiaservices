<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=projetweb;', 'root', '');
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<?php
if (isset($_GET['nom_stage'])) {
    $id = $_GET['nom_stage'];
    $req = $conn->prepare('DELETE FROM stage WHERE nom_stage=?');
    $params = array($id);
    $req->execute($params);
    header('location: offrestage.php');
}
?>
