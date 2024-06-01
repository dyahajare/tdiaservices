<?php 
session_start();
require_once 'connection.php';
$id=$_SESSION['email'];
if(isset($_POST['submit'])){
    $nouvmodification=$_POST['form'];
    $req = $con->prepare("UPDATE etudiant SET emailPerso=? WHERE emailAcadémique=?");
    $params = array($nouvmodification,$id);
    $req->execute($params);
    header("location: student .php");
}
?>