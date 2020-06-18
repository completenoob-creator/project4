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




$this->conn = mysqli_connect($servername,$username,$password);


if(!$this->conn){
    die("connection faild:" . mysqli_connect_error());
}

$sql ="CREATE DATABASE IF NOT EXISTS $dbname";

if(mysqli_query($this->conn,$sql)){
    $this->conn = mysqli_connect($servername,$username,$password,$dbname);

    $sql = "CREATE TABLE IF NOT EXISTS $tbname
    (id INT (11) NOT NULL AUTO_INCREMENT PRIMARY KEY
    product_name VARCHAR (25) NOT NULL,
    product_price FLOAT NOT NULL,
    total_price FLOAT NOT NULL,
    product_image VARCHAR (100) NOT NULL);";

    if(!mysqli_query($this->conn,$sql)){
        echo"creating table:" . mysqli_error($this->conn);
    }
}else{
    return false;
}



}






?>