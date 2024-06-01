<?php 

  require_once'classecous.php';
  
  
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
      top: 2px; /* Ajustez la position verticale de la notification */
      left: 50%;
      transform: translateX(-50%);
      background-color: #ffffff;
      border: 1px solid #ced4da;
      border-radius: 10px;
      box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
      padding: 10px; /* Réduisez le padding */
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

    .panel-heading2 {
      background-color: #007bff;
      color: #fff;
      padding: 2px;
      border-radius: 10px 10px 0 0;
      text-align: center;
    }

    .panel-body {
      padding: 20px;
    }

    .form-group {
      margin-bottom: 5px;
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
        <div class="panel-heading2">
          <h5>Welcome, Professor!</h5>
          <p>Please add your lesson details:</p>
        </div>
        <div class="panel-body">
          <form action="courshnd.php" method="post" enctype="multipart/form-data">
          <div class="form-group">
              <label for="lesson-title" class="control-label">classe</label>
              <input type="text" id="classe" name="classe" class="form-control" required />
            </div>
            <div class="form-group">
              <label for="lesson-type" class="control-label">Type</label>
              <select id="type" name="type" class="form-control" required>
                <option value="cour">Cour</option>
                <option value="td">TD</option>
                <option value="tp">TP</option>
              </select>
            </div>
            <div class="form-group">
              <label for="lesson-title" class="control-label">Titre</label>
              <input type="text" id="titre" name="titre" class="form-control" required />
            </div>
            <div class="form-group">
              <label for="module-name" class="control-label">Module</label>
              <input type="text" id="module" name="module" class="form-control" required />
            </div>
            <div class="form-group">
              <label for="additional-files" class="control-label">Fichies</label>
              <input type="file" id="file" name="file" class="form-control" multiple />
            </div>
            
            <div class="form-group text-center">
              <button type="submit" name="submit" class="btn btn-submit">ajouter</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
