<?php
require_once("./scripts/product_db.php");
require_once("./scripts/compononent.php");

if(isset($_SESSION['cart'])){
    $cart = json_decode($_SESSION['cart'], true);
} else {
    $cart = array();
}
   
if (isset($_POST['add'])){    
    $prdId = $_POST['product_id']; 
    if (isset($cart[$prdId])) {
        $cart[$prdId] = $cart[$prdId] + 1;
    } else {
        $cart[$prdId] = 1;
    }
}

if (isset($_POST['remove'])){    
    $prdId = $_POST['product_id']; 
    if (isset($cart[$prdId]) && $cart[$prdId] > 1) {
        $cart[$prdId] = $cart[$prdId] - 1;
    } else {
        unset($cart[$prdId]);
    }
}

$_SESSION['cart'] = json_encode($cart);
// TOEGEVOEGD OF VERWIJDERD UIT CART BERICHT
// $cart = json_decode($_SESSION['cart'], true);

// $prdSql = 'SELECT * FROM productdb WHERE id IN ('.implode(',', array_keys($cart)).')';
// foreach($DBresult as $prdId => $amount) {
    
// }

$result = getData();
while($row = mysqli_fetch_assoc($result)){;
    component(
        $row['product_name'], 
        $row['product_price'], 
        $row['total_price'],
        $row['product_img'],
        $row['id']);
}
?>
