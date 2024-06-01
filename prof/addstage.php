<?php 

  require_once'offrestage.php';
  
  
 ?>
 <?php
try{
   $conn=new PDO('mysql:host=localhost;dbname=projetweb;','root','');
}
catch(Exception $e){
   echo $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Stage Addition Portal</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
   
    .notification {
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: #ffffff;
      border: 1px solid #ced4da;
      border-radius: 10px;
      box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
      padding: 20px;
      max-width: 500px;
      width: 100%;
    }

    .close-btn {
      color: #6c757d;
      font-size: 24px;
      cursor: pointer;
    }

    .close-btn:hover {
      color: #343a40;
    }

    .panel-heading {
      background-color: #007bff;
      color: #fff;
      padding: 15px;
      border-radius: 10px 10px 0 0;
      text-align: center;
    }

    .panel-body {
      padding: 20px;
    }

    .form-group {
      margin-bottom: 3px;
    }

    .form-control {
      border-radius: 5px;
    }

    .btn-submit {
      background-color: #28a745;
      border-color: #28a745;
      padding: 10px 20px;
    }

    .btn-submit:hover {
      background-color: #218838;
      border-color: #1e7e34;
    }
  </style>
</head>
<body>
  <div class="notification">
    <span class="close-btn" onclick="this.parentElement.style.display='none';">&times;</span>
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h5>Welcome, Professor!</h5>
          <p>Veuillez ajouter les détails de votre stage :</p>
        </div>
        <div class="panel-body">
        <form action="saisihlndr.php" method="post" >

          <div class="form-group">
              <label for="offre" class="control-label">nom</label>
              <input type="text" id="nom" name="nom" class="form-control" placeholder="Entrez le nom de stage" required>
            </div>
            <div class="form-group">
              <label for="type" class="control-label">Type</label>
              <select id="type" name="type" class="form-control select-custom" placeholder="Entrez le type de stage" required>
                <option value="stage d'observation">Stage d'observation</option>
                <option value="stage de pratique">Stage de pratique</option>
                <option value="PFA">PFA</option>
                <option value="PFE">PFE</option>
              </select>
            </div>
            <div class="form-group">
              <label for="offre" class="control-label">Offer</label>
              <input type="text" id="offre" name="offre" class="form-control" placeholder="Entrez l'offre de stage" required>
            </div>
            <div class="form-group">
              <label for="debut" class="control-label">échéance</label>
              <input type="date" id="debut" name="debut" class="form-control" placeholder="Entrez la limite de stage"required>
            </div>
            <div class="form-group">
              <label for="lien" class="control-label">lien</label>
              <input type="text" id="lien" name="lien" class="form-control" placeholder="Entrez le lien de stage"required>
            </div>
            <div class="form-group text-center">
              <button type="submit" class="btn btn-submit">Add Stage</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>















