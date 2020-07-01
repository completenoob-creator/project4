<?php
require_once("./scripts/product_db.php");
require_once("./scripts/compononent.php");
require_once("./scripts/cart.php");


$_SESSION['cart'] = json_encode($cart);
// TOEGEVOEGD OF VERWIJDERD UIT CART BERICHT
//  $cart = json_decode($_SESSION['cart'], true);

//  $prdSql = 'SELECT * FROM productdb WHERE id IN ('.implode(',', array_keys($cart)).')';
//  foreach($DBresult as $prdId => $amont) {
    
//  }

$result = getData();
while($row = mysqli_fetch_assoc($result)){
    component(
        $row['product_img'],
        $row['product_name'], 
        $row['product_price'], 
        $row['total_price'],
        $row['id']);
}
?>
