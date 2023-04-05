<?php

include "./models/Book.php" ;

class BookController{

    public static function index()
    {
        $books = Book::all();
        return $books;
    }

    public static function show()
    {
        
    }

    public static function store()
    {
        Book::create();
    }

    public static function update()
    {
    
    }

    public static function destroy()
    {
      
    }

}














?>