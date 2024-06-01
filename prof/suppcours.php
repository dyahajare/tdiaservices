<?php
try {
    $conn = new PDO('mysql:host=localhost;dbname=projetweb;', 'root', '');
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<?php
if (isset($_GET['titre'])) {
    $id = $_GET['titre'];
    $req = $conn->prepare('DELETE FROM cours WHERE titre=?');
    $params = array($id);
    $req->execute($params);
    header("Location: ".$_SERVER['HTTP_REFERER']);
}
?>
