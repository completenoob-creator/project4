<?php
require_once("./scripts/product_db.php");
require_once("./scripts/compononent.php");
require_once("./scripts/cart.php");



$result = getData();
while($row = mysqli_fetch_assoc($result)){
    component(
        $row['product_name'], 
        $row['product_price'], 
        $row['total_price'],
        $row['product_img'],
        $row['id']);
}
?>
