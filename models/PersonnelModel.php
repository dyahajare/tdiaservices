<?php
class PersonnelModel {
    private $conn;

    public function __construct() {
        $this->conn = $GLOBALS['conn']; // Utiliser la connexion globale à la base de données
    }

    public function getPersonnel($limit, $offset) {
        $stmt = $this->conn->prepare("SELECT * FROM personnel LIMIT :limit OFFSET :offset");
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countPersonnel() {
        $stmt = $this->conn->prepare("SELECT COUNT(*) as total FROM personnel");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
    public function ajouterPersonnel($data, $files) {
        $nom = htmlspecialchars($data['nom']);
        $prenom = htmlspecialchars($data['prenom']);
        $cin = htmlspecialchars($data['cin']);
        $emailPro = htmlspecialchars($data['emailPro']);
        $emailPerso = htmlspecialchars($data['emailPerso']);
        $telephone = htmlspecialchars($data['telephone']);
        $SituationFamiliale = htmlspecialchars($data['SituationFamiliale']);
        $Statut = htmlspecialchars($data['Statut']);
        $Sexe = htmlspecialchars($data['Sexe']);
        $mot_pass = htmlspecialchars($data['mot_pass']);

        $destination = '../uploads/';
        $cheminDestination = $destination . basename($files['photo']['name']);
        move_uploaded_file($files['photo']['tmp_name'], $cheminDestination);
        $img = $files['photo']['name'];

        $sql = "INSERT INTO personnel(nom_personnel, prenom_personnel, cin, emailPro_personnel, emailPerso_personnel, telephone, Statut, Situation_famillial, sexe, photo_personnel, mot_pass) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $params = array($nom, $prenom, $cin, $emailPro, $emailPerso, $telephone, $Statut, $SituationFamiliale, $Sexe, $img, $mot_pass);
        $stmt->execute($params);
    }
    public function supprimerPersonnel($cin) {
        $req = $this->conn->prepare("DELETE FROM personnel WHERE cin = :cin");
        $req->bindValue(':cin', $cin);
        $req->execute();
    }
    public function getPersonnelByCIN($cin) {
        $req = $this->conn->prepare("SELECT * FROM personnel WHERE cin = ?");
        $req->bindParam(1, $cin);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function getPhotoByCIN($cin) {
        $req = $this->conn->prepare("SELECT photo_personnel FROM personnel WHERE cin = ?");
        $req->bindParam(1, $cin);
        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC);
        return $result['photo_personnel'];
    }

    public function updatePersonnel($nom, $prenom, $cin, $emailPro, $emailPerso, $telephone, $statut, $sexe, $situationFamiliale, $photo, $ancien_cin) {
        $sql = "UPDATE personnel SET nom_personnel = ?, prenom_personnel = ?, cin = ?, emailPro_personnel = ?, emailPerso_personnel = ?, telephone = ?, Statut = ?, sexe = ?, Situation_famillial = ?, photo_personnel = ? WHERE cin = ?";
        $stmt = $this->conn->prepare($sql);
        $params = array($nom, $prenom, $cin, $emailPro, $emailPerso, $telephone, $statut, $sexe, $situationFamiliale, $photo, $ancien_cin);
        $stmt->execute($params);
    }
    public function getPersonnelByEmail($email) {
        $req = $this->conn->prepare("SELECT * FROM personnel WHERE emailPro_personnel = :email");
        $req->bindValue(':email', $email);
        $req->execute();
        return $req->fetch(PDO::FETCH_ASSOC);
    }
}
?>
