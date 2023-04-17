<?php

class Validate
{

    public static function Book() //jei naudosime updatinimui, reikia tikrinti ar POSTe yra id(book) ir Jei taip - tikrinti ar tas id atititinka realia knyga
    {
        $author = Author::find($_POST['authorId']);

        if ($author->id == null) {
            $_SESSION['errors']['author'] = "Tokio autoriaus nėra";
        }

        if (strlen($_POST['title']) == 0) {
            $_SESSION['errors']['title'] = "Įveskite knygos pavadinimą";
        }
        if (strlen($_POST['title']) < 1) {
            $_SESSION['errors']['title'] = "Per trumpas pavadinimas";
        }
        if (strlen($_POST['title']) > 100) {
            $_SESSION['errors']['title'] = "Per ilgas pavadinimas";
        }
        if (strlen(str_replace(" ", "", $_POST['title'])) == 0) {// "     "
            $_SESSION['errors']['title'] = "Vien tarpai?";
        }
        if (strlen(preg_replace("[^a-zA-Z0-9]","",$_POST['title'])) == 0) {// "  $#%&(*^%$&(*))   "
            $_SESSION['errors']['title'] = "Naudok raides";
        }


        if (strlen($_POST['genre']) == 0) {
            $_SESSION['errors']['genre'] = "Įveskite knygos žanrą";
        }
        if (strlen($_POST['title']) < 3) {
            $_SESSION['errors']['genre'] =  "Per trumpas žanras";
        }
        if (strlen($_POST['title']) > 150) {
            $_SESSION['errors']['genre'] =  "Per ilgas žanras";
        }
        if (strlen(str_replace(" ", "", $_POST['genre'])) == 0) {// "     "
            $_SESSION['errors']['genre'] = "Vien tarpai?";
        }
        if (strlen(preg_replace("[^a-zA-Z]","",$_POST['genre'])) == 0) {// "  54652344#$%^&   "
            $_SESSION['errors']['genre'] = "Naudok raides";
        }


        if (isset($_SESSION['errors'])) {
            return false;
        }
        return true;
    }
}
