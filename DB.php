<?php
class DB{
    public $conn;

    public function __construct(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "221214_knygynas";
        $this->conn = new mysqli($servername, $username, $password, $db);
    }
}


?>