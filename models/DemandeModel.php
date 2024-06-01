<?php
class DemandeModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getDemandes($limit, $offset) {
        $stmt = $this->conn->prepare("SELECT * FROM demandes LIMIT :limit OFFSET :offset");
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function countDemandes() {
        $stmt = $this->conn->prepare("SELECT COUNT(*) as total FROM demandes");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }

    public function validerDemande($demande_id) {
        $stmt = $this->conn->prepare("UPDATE demandes SET réalisé = 1 WHERE id = :demande_id");
        $stmt->bindParam(':demande_id', $demande_id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>
