<?php

try{
    $conn=new PDO('mysql:host=localhost;dbname=projetweb;','root','');
 }
 catch(Exception $e){
    echo $e->getMessage();
 }
 if(isset($_POST['submit'])){
  $nom = $_POST['nom'];
  $type = $_POST['type'];
  $offer = $_POST['offre'];
  $debut = $_POST['debut'];
  $lien = $_POST['lien'];
  $req = $conn->prepare("UPDATE stage  SET type_stage=?, offre_stage=? , durée_stage=?, lien_offre=? WHERE nom_stage=?");
  $params = array( $type, $offer, $debut, $lien, $nom);
 }
  $req->execute($params);
  header("location:offrestage.php");
