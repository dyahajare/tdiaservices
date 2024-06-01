<?php  
session_start();
require_once 'connection.php';
if (!isset($_SESSION['user'])) {
    echo "User session is not set.";
    exit();
}

if(isset( $_SESSION['profilmodified']) && $_SESSION['profilmodified']=true ){
    $image_name = $_SESSION['nouvprofil'] ;
    $image_path = "../uploads/". $image_name; 
}else{
$image_name = $_SESSION['user']['profil'] ?? 'default_profile';
$image_path = "../uploads/" . $image_name; 
}
$student_name=$_SESSION['user']['prenom'] ?? 'default_username';

$id=$_SESSION['user']['classe'] ?? 'default_class';
$id = $_SESSION['email'];
if (isset($_POST['envoyer'])) {
    $photoname = $_FILES['photo']['name'];
    $photopath = $_FILES['photo']['tmp_name'];
    if ($photoname != "") {
        move_uploaded_file($photopath, "../uploads/$photoname");
        $req = $con->prepare("UPDATE etudiant SET profil=? WHERE emailAcadémique=?");
        $params = array($photoname, $id);
        $req->execute($params);
        $_SESSION['profilmodified']=true;
        $_SESSION['nouvprofil']=$photoname;
        header("location: student .php");
        exit();
    } else {
        echo "Veuillez s'il vous plaît télécharger une photo !!";
    }
}
?>
