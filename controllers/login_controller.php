 <?php
session_start();
include('../models/User.php');

if (isset($_POST['user']) && isset($_POST['pass'])) {
    $username = $_POST['user'];
    $password = $_POST['pass'];

    $userModel = new User();
    
    // Check if the user is a student
    $etudiant = $userModel->getEtudiant($username, $password);
    if ($etudiant) {
        // Store student details in session
        $_SESSION['user'] = [
            'type' => 'etudiant',
            'id' => $etudiant['id'], // Assuming 'id' exists
            'username' => $etudiant['emailAcadémique'],
            'cne' => $etudiant['cne'],
            'nom' => $etudiant['nom'],
            'prenom' => $etudiant['prenom'],
            'classe' => $etudiant['nom_classe'],
            'profil' => $etudiant['profil']
            
        ];
        header("Location: ../views/student.php");
        exit();
    }

    // Check if the user is a personnel
    $personnel = $userModel->getPersonnel($username, $password);
    if ($personnel) {

        session_start();

        // Stocker les informations du personnel en session
        $_SESSION['emailPro'] = $personnel['emailPro_personnel'];
        $_SESSION['nom'] = $personnel['nom_personnel'];
        $_SESSION['prenom'] = $personnel['prenom_personnel'];
        $_SESSION['profileImage'] = $personnel['photo_personnel'];
        $_SESSION['cin'] = $personnel['cin'];
        $_SESSION['telephone'] = $personnel['telephone'];
        $_SESSION['emailPerso'] = $personnel['emailPerso_personnel'];
        $_SESSION['sexe'] = $personnel['sexe'];
        $_SESSION['Statut'] = $personnel['Statut'];
        $_SESSION['situationFamiliale'] = $personnel['Situation_Famillial'];

        // Rediriger vers la page d'accueil
        header("Location: ../controllers/AdminController.php");
        exit();
    }

    // Check if the user is a professor
    $professeur = $userModel->getProfesseur($username, $password);
    if ($professeur) {
         // Recréer la session après la destruction
         session_start();

         // Stocker les informations du professeur en session
         $_SESSION['emailPro'] = $professeur['emailPro'];
         $_SESSION['nom'] = $professeur['nom_prof'];
         $_SESSION['profileImage'] = $professeur['photo'];
         $_SESSION['prenom'] = $professeur['prenom_prof'];
         $_SESSION['nomarab'] = $professeur['nom_prof_arabe'];
         $_SESSION['prenomarab'] = $professeur['prenom_prof_arabe'];
         $_SESSION['cin'] = $professeur['cin'];
         $_SESSION['telephone'] = $professeur['telephone'];
         $_SESSION['emailPerso'] = $professeur['emailPerso'];
         $_SESSION['sex'] = $professeur['sexe'];
         $_SESSION['pays'] = $professeur['pays'];
         $_SESSION['situationFamiliale'] = $professeur['situationFamiliale'];
         $_SESSION['emploi_temps'] = $professeur['emploi_temps'];

         // Rediriger vers la page d'accueil
         header("Location:  ../prof/home.php");
         exit();
    }

    header("Location: ../views/login.php");
    exit();
} else {
    echo "Nom d'utilisateur ou mot de passe non fourni.";
}

?>
