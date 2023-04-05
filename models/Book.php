<?php
include "./models/DB.php";
class Book{
public $id;
public $title;
public $genre;
public $authorId;

  
public function __construct($id, $title, $genre, $authorId) {
    $this->id = $id;
    $this->title = $title;
    $this->genre = $genre;
    $this->authorId = $authorId;
}

public static function all(){
    $books = [];
    $db = new DB();
    $query = "SELECT * FROM `books`";
    $result = $db->conn->query($query);

    while ($row = $result->fetch_assoc()) {
        $books[] = new Book($row['id'], $row['title'], $row['genre'], $row['author_id']);
    }
    $db->conn->close();
    return $books;

}

public static function create(){
    $db = new DB();
    $stmt = $db->conn->prepare("INSERT INTO `books`(`title`, `genre`, `author_id`) VALUES (?,?,?)");
    $stmt->bind_param("ssi",$_POST['title'], $_POST['genre'],$_POST['author_id']);
    $stmt->execute();

    $stmt->close();
    $db->conn->close();
}



}



?>