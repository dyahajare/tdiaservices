<?php

require_once '../models/Book.php';

class BookController
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titre = $_POST['titre'];
            $code = $_POST['code'];
            $theme = $_POST['theme'];

            $bookModel = new Book($this->conn);
            $books = $bookModel->searchBooks($titre, $code, $theme);

            include '../views/books.php';
        }
    }
}

// Database connection
try {
    $host = "localhost";
    $user = "root";
    $password = '';
    $db_name = "projetweb";

    $conn = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $controller = new BookController($conn);
    $controller->search();
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
