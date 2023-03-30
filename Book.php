<?php
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

}



?>