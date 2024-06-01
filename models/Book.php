<?php

class Book
{
    private $conn;
    private $table = 'bibliotheque';

    public $id;
    public $titre;
    public $code;
    public $theme;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function searchBooks($titre, $code, $theme = null)
    {
        $sql = "SELECT * FROM $this->table WHERE titre LIKE :titre AND code LIKE :code";
        $params = [':titre' => '%' . $titre . '%', ':code' => '%' . $code . '%'];

        if (!empty($theme)) {
            $sql .= " AND theme = :theme";
            $params[':theme'] = $theme;
        }

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>