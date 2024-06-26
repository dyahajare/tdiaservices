<?php 
    
  require_once'affclasse.php';
 ?>
 <?php
try{
   $conn=new PDO('mysql:host=localhost;dbname=projetweb;','root','');
}
catch(Exception $e){
   echo $e->getMessage();
}
if(isset($_GET['nom'])){
$id = $_GET['nom'];
$req = $conn->prepare('SELECT * FROM classe WHERE nom=?');
$params = array($id);
$req->execute($params);
$classe = $req->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>stages</title>
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
          <p>"Veuillez entrer les notes de votre classe:"</p>
        </div>
        <div class="panel-body">
        <form action="src/calcul.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
    <label for="nom">Nom du classe:</label>
    <span class="badge"><?php echo $classe['nom']; ?></span>
     <input type="hidden" name="nom" class="form-control" value="<?php echo $classe['nom']; ?>" required />
        </div>
        <label for="cin_prof">CIN du Professeur:</label>
        <span class="badge"><?php echo  $_SESSION['cin'] ?></span>
          <input type="hidden" name="cin" class="form-control" value="<?php echo $_SESSION['cin'] ?>" required />
            </div>
            <div class="form-row">
            <div class="col">
    <label for="ds_percentage" class="small-input">Pourcentage de DS:</label>
    <input type="number" name="ds_percentage" class="form-control small-input" step="5" min="0" max="100" required />
</div>
<div class="col">
    <label for="exam_percentage" class="small-input">Pourcentage d'Examen:</label>
    <input type="number" name="exam_percentage" class="form-control small-input" step="5" min="0" max="100" required />
</div>

            </div>
            <div class="form-group">
              <label for="modulees">modules:</label>
              <input type="text" name="modules" class="form-control"  required />
            </div>
            <div class="form-group">
              <label for="file">Note</label>
              <input type="file" name="file" class="form-control" />
            </div>
    

            <div class="form-group">
                        <input type="submit" name="submit" class="form-control btn btn-warning" value="enregistrer" />
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>
</html>















