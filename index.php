<?php
// header('X-Redirected-By: PHP');
// header("Location: ./kitas.php");
// die;
?>

<?php
include "./routes.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "./views/components/head.php" ?>
</head>

<body>
    <?php include "./views/components/navbar.php" ?>

    <!-- <div class="container"> -->
    <h1>Biblioteka</h1>
    <form action="" method="post">
        <input type="text" name="title">
        <input type="text" name="genre">
        <input type="text" name="author_id">
        <button type="submit" name="save">do it!</button>
    </form>
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Genre</th>
                    <th>Author ID</th>
                    <th>show</th>
                    <th>edit</th>
                    <th>delete</th>
                </tr>
                <?php foreach ($books as $book) { ?>
                    <tr>
                        <td> <?= $book->id ?></td>
                        <td> <?= $book->title ?></td>
                        <td> <?= $book->genre ?></td>
                        <td> <?= $book->authorId ?></td>
                        <td><button class="btn btn-primary">show</button></td>
                        <td><button class="btn btn-success">edit</button></td>
                        <td>
                            <form action="" method="post">
                                <button class="btn btn-danger" name="destroy">delete</button>
                            </form>
                        </td>
                    </tr>
                <?php  } ?>
            </table>
        </div>
        <div class="col-sm-3"></div>
    </div>

    <!-- </div> -->

    <small style> šis tekstas bus matomas </small>

</body>

</html>