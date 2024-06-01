<?php
try{
    $conn=new PDO('mysql:host=localhost;dbname=projetweb;','root','');
 }
 catch(Exception $e){
    echo $e->getMessage();
 }
 
  
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          // Vérifier si tous les champs requis sont présents
          if (isset($_POST['nom']) && isset($_POST['cin']) && isset($_POST['ds_percentage']) && isset($_POST['exam_percentage']) && isset($_FILES['file'])) {
              // Récupérer les données du formulaire
              $nom_classe = $_POST['nom'];
              $cin_prof = $_POST['cin'];
              $ds_percentage = $_POST['ds_percentage'];
              $exam_percentage = $_POST['exam_percentage'];
              $modules = $_POST['modules'];
      
              // Gérer le téléchargement du fichier
              $file_name = $_FILES['file']['name'];
              $file_tmp = $_FILES['file']['tmp_name'];
              $file_size = $_FILES['file']['size'];
              $file_error = $_FILES['file']['error'];
      
              // Vérifier si aucun problème n'est survenu lors du téléchargement du fichier
              if ($file_error === 0) {
                  // Déplacer le fichier téléchargé vers le dossier de destination
                  $destination = '../uploads/' . $file_name;
                  move_uploaded_file($file_tmp, $destination);
      
                  // Maintenant, vous pouvez faire ce que vous voulez avec les données et le fichier téléchargé
                  // Par exemple, insérez-les dans votre base de données
                  try {
                      $conn = new PDO('mysql:host=localhost;dbname=projetweb;', 'root', '');
                      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
                      // Préparer la requête d'insertion
                      $stmt = $conn->prepare('INSERT INTO modules (nom_classe, cin_prof, pourcentage_ds, pourcentage_exam, nom_module , notes) VALUES (?, ?, ?, ?, ?, ?)');
                      // Exécuter la requête
                      $stmt->execute([$nom_classe, $cin_prof, $ds_percentage, $exam_percentage, $modules, $destination]);
      
                      header("location:affclasse.php");
                  } catch (PDOException $e) {
                      echo 'Erreur : ' . $e->getMessage();
                  }
              } else {
                  echo 'Une erreur est survenue lors du téléchargement du fichier.';
              }
          } else {
              echo 'Veuillez remplir tous les champs du formulaire.';
              
          }
      } else {
          echo 'Le formulaire n\'a pas été soumis.';
      }
      ?>
      
 