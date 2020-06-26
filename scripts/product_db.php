<?php


function getData(){
include("./scripts/connect_db.php");
 $sql="SELECT * FROM `productdb`";

 $result = mysqli_query($conn,$sql);

 if(mysqli_num_rows($result)>0){
     return $result;
 }
}
?>