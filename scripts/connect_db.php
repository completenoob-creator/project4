<?php 
define("SERVERNAME", "localhost");
define("USERNAME", "technostuff");
define("PASSWORD", "3kzsOMgMFNYLk04s");
define("DATABASE", "technostuff");
$conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DATABASE);



class createdb{
    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $tbname;
    public $conn;
}

function __construct($dbname = "technostuff",
                    $tbname ="product",
                    $servername = "localhost",
                    $username = "technostuff",
                    $password = "3kzsOMgMFNYLk04s")
{
$this->dbname = $dbname;
$this->tbname = $tbname ;
$this->servername = $servername;
$this->username = $username;
$this->password = $password;




$this->conn = mysqli_connect()
}






?>