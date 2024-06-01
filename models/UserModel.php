<?php

// File: models/UserModel.php

class UserModel {
    public $nom;
    public $profileImage;
    public $prenom;
    public $cin;
    public $telephone;
    public $emailPro;
    public $emailPerso;
    public $sexe;
    public $statut;
    public $situationFamiliale;

    public function __construct($sessionData) {
        $this->nom = $sessionData['nom'];
        $this->profileImage = $sessionData['profileImage'];
        $this->prenom = $sessionData['prenom'];
        $this->cin = $sessionData['cin'];
        $this->telephone = $sessionData['telephone'];
        $this->emailPro = $sessionData['emailPro'];
        $this->emailPerso = $sessionData['emailPerso'];
        $this->sexe = $sessionData['sexe'];
        $this->statut = $sessionData['Statut'];
        $this->situationFamiliale = $sessionData['situationFamiliale'];
    }
    public static function addStudent($db, $data) {
        $stmt = $db->prepare("INSERT INTO etudiants (nom, prenom, cin, email, telephone, classe) VALUES (:nom, :prenom, :cin, :email, :telephone, :classe)");
        return $stmt->execute([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'cin' => $data['cin'],
            'email' => $data['email'],
            'telephone' => $data['telephone'],
            'classe' => $data['classe']
        ]);
    }
    public static function getActualites($db, $limit, $offset) {
        $stmt = $db->prepare("SELECT * FROM actualité LIMIT :limit OFFSET :offset");
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function countActualites($db) {
        $stmt = $db->prepare("SELECT COUNT(*) as total FROM actualité");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
    public static function addAnnonce($db, $data) {
        $stmt = $db->prepare("INSERT INTO actualité (titre_actu, msg_actu, img_actu, type_img) VALUES (:titre, :description, :image, :type_img)");
        return $stmt->execute([
            'titre' => $data['titre'],
            'description' => $data['description'],
            'image' => $data['image'],
            'type_img' => $data['type_img']
        ]);
    }
    public static function getAnnonce($db, $titre) {
        $stmt = $db->prepare("SELECT * FROM actualité WHERE titre_actu = ?");
        $stmt->execute([$titre]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function updateAnnonce($db, $data) {
        $stmt = $db->prepare("UPDATE actualité SET titre_actu = ?, msg_actu = ?, type_img = ?, img_actu = ? WHERE titre_actu = ?");
        return $stmt->execute([
            $data['titre'],
            $data['description'],
            $data['type_img'],
            $data['image'],
            $data['ancien_titre']
        ]);
    }
    public static function deleteAnnonce($db, $titre) {
        $stmt = $db->prepare("DELETE FROM actualité WHERE titre_actu = ?");
        return $stmt->execute([$titre]);
    }
    
}

?>