<?php
try{
   $conn=new PDO('mysql:host=localhost;dbname=projetweb;','root','');
}
catch(Exception $e){
   echo $e->getMessage();
}
?>