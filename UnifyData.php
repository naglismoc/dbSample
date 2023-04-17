<?php
class unifyData
{
    public static function unifyBook($book)
    {
        $book->title = trim($book->title);
        $book->title = preg_replace("/\s+/", " ", $book->title);
        return $book;
    }
}
