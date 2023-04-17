<?php
include "./models/DB.php";
include "./UnifyData.php";
class Book
{
    public $id;
    public $title;
    public $genre;
    public $author;

    public function __construct($id = null, $title = "", $genre = "", $authorId = null, $name = "", $surname = "")
    {
        $this->id = $id;
        $this->title = $title;
        $this->genre = $genre;
        $this->author = new Author($authorId, $name, $surname);
    }


    public static function all()
    {
        $books = [];
        $db = new DB();
        $query = "SELECT * from `books_authors`";
        $result = $db->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $books[] = new Book($row['id'], $row['title'], $row['genre'], $row['author_id'], $row['name'], $row['surname']);
        }
        $db->conn->close();
        return $books;
    }

    public static function sortFilter()
    {
        $sort = "";
        switch ($_GET['sort']) {
            case 1:
                $sort = "title asc";
                break;
            case 2:
                $sort = "title desc";
                break;
            case 3:
                $sort = "genre asc";
                break;
            case 4:
                $sort = "genre desc";
                break;
            case 5:
                $sort = "surname asc, name asc";
                break;
            case 6:
                $sort = "surname desc, name desc";
                break;
        }
        $filter = "";
        if(isset($_GET['filter']) && $_GET['filter'] != 0 && is_numeric($_GET['filter'])){
            $filter = "where author_id = "  . $_GET['filter'];
        }

        $books = [];
        $db = new DB();
        $query = "SELECT * from `books_authors` " . $filter . " order by " . $sort;
        $result = $db->conn->query($query);

        while ($row = $result->fetch_assoc()) {
            $books[] = new Book($row['id'], $row['title'], $row['genre'], $row['author_id'], $row['name'], $row['surname']);
        }
        $db->conn->close();
        return $books;
    }

    public static function find($id)
    {
        $book = new Book();
        $db = new DB();
        $stmt = $db->conn->prepare("SELECT * FROM `books` WHERE `id` = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $book = new Book($row['id'], $row['title'], $row['genre'], $row['author_id']);
        }
        $stmt->close();
        $db->conn->close();
        return $book;
    }


    public function create()
    {
        $book = unifyData::unifyBook($this);
        $db = new DB();
        $stmt = $db->conn->prepare("INSERT INTO `books`(`title`, `genre`, `author_id`) VALUES (?,?,?)");
        $stmt->bind_param("ssi", $book->title, $book->genre, $book->author->id);
        $stmt->execute();
        $stmt->close();
        $db->conn->close();
    }

    public function update()
    {
        // var_dump(date("Y-m-d H:i:s",time()));die;
        $book = unifyData::unifyBook($this);
        $db = new DB();
        $stmt = $db->conn->prepare("UPDATE `books` SET `title`= ?,`genre`=?,`author_id`=?, `updated_at`=? WHERE `id` = ?");
        $stmt->bind_param("ssisi", $book->title, $book->genre, $book->author->id, date("Y-m-d H:i:s",time()), $book->id);
        $stmt->execute();
        $stmt->close();
        $db->conn->close();
    }

    public static function destroy($id)
    {
        $db = new DB();
        $stmt = $db->conn->prepare("DELETE FROM `books` WHERE `id` = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $stmt->close();
        $db->conn->close();
    }
}
