<?php include "./DB.php" ?>
<?php include "./Book.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>Document</title>
</head>
<body>
    <?php

    $books = [];
    $db = new DB();
    $query = "SELECT * FROM `books`";
    $result = $db->conn->query($query);

    while($row = $result->fetch_assoc()){
        $books[] = new Book($row['id'], $row['title'], $row['genre'], $row['author_id']);
    }
    $db->conn->close();
   
    foreach ($books as $book) {
        // Access the properties of the current Book object using the arrow operator
        echo "Book ID: " . $book->id . "<br>";
        echo "Title: " . $book->title . "<br>";
        echo "Genre: " . $book->genre . "<br>";
        echo "Author ID: " . $book->authorId . "<br>";
        echo "<br>";
    }



    // echo '<table class="table">';
    // echo "<tr><th>ID</th><th>Title</th><th>Genre</th><th>Author ID</th></tr>";
    
    // // Loop through each Book object in the array
    // foreach ($books as $book) {
    //     // Output a row for the current Book object
    //     echo "<tr>";
    //     echo "<td>" . $book->id . "</td>";
    //     echo "<td>" . $book->title . "</td>";
    //     echo "<td>" . $book->genre . "</td>";
    //     echo "<td>" . $book->authorId . "</td>";
    //     echo "</tr>";
    // }
    
    // // Close the table
    // echo "</table>";


?>
</body>
</html>