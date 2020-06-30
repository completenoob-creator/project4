<?php
require_once("./scripts/product_db.php");
require_once("./scripts/compononent.php");
require_once("./scripts/cart.php");


<<<<<<< HEAD
$_SESSION['cart'] = json_encode($cart);
// TOEGEVOEGD OF VERWIJDERD UIT CART BERICHT
//  $cart = json_decode($_SESSION['cart'], true);

//  $prdSql = 'SELECT * FROM productdb WHERE id IN ('.implode(',', array_keys($cart)).')';
//  foreach($DBresult as $prdId => $amount) {
    
//  }
=======
>>>>>>> 7453b3e1a81114b6090f020ff21d0657b018b96a

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
