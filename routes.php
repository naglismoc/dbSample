<?php include "./controllers/BookController.php";



if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    // Arba išsaugosim knygą
    if (isset($_POST['save'])) {
        BookController::store();
        header("Location: ./index.php");
        die;
    }

    //Arba atnaujinsim knygą

    //arba ištrinsim knygą
    if (isset($_POST['destroy'])) {
        echo "Destroy";
    }
}




if ($_SERVER['REQUEST_METHOD'] == "GET") {

    // atvaizduosim knygą


}




//paimti visas knygas
$books = BookController::index();
