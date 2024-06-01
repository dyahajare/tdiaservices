<?php 

try{
    $conn= new PDO("mysql:host=localhost;dbname=gestion des etudiants","root","");
    echo"succ";

}
catch(PDOException $ex){
    echo"oops erreure".$ex->getMessage();
}
?>
