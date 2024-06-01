<?php
session_start();
require_once 'connection.php';
$cne = $_SESSION['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['changer'])) {
    $current_password = $_POST['oldpassword'];
    $new_password = $_POST['newpassword'];
    $confirm_password = $_POST['confnewpassword'];

    if ($new_password !== $confirm_password) {
        echo "Les nouveaux mots de passe ne correspondent pas.";
        exit(); 
    }

    $sql = "SELECT mot_pass FROM etudiant WHERE cne = ?";
    $stmt = $con->prepare($sql);
    $stmt->execute([$cne]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$result || $current_password!=$result['mot_pass']){
        echo "Le mot de passe actuel est incorrect.";
        exit(); 
    }

    $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);
    $sql = "UPDATE etudiant SET mot_pass = ? WHERE cne = ?";
    $stmt = $con->prepare($sql);
    $stmt->execute([$hashed_new_password, $cne]);
    $_SESSION['nouvmdp']=$hashed_new_password;
    echo "Votre mot de passe a été changé avec succès.";
    header('Location:student .php');
    exit(); 
} else {
    echo "Erreur lors de la soumission du formulaire.";
}
?>
