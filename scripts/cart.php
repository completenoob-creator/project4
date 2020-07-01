<?php

if(isset($_SESSION['cart'])){
    $cart = json_decode($_SESSION['cart'], true);
} else {
    $cart = array();
}
 
if (isset($_POST['add'])){    
    $prdId = $_POST['product_id']; 
    if (isset($cart[$prdId])) {
        $cart[$prdId] = $cart[$prdId] + 1;
        header("Location: ./index.php?content=message&alert=product-toegevoegd");
    } else {
        $cart[$prdId] = 1;
        header("Location: ./index.php?content=message&alert=nog-een-toegevoegd");
    }
}

if (isset($_POST['remove'])){    
    $prdId = $_POST['product_id']; 
    if (isset($cart[$prdId]) && $cart[$prdId] > 1) {
        $cart[$prdId] = $cart[$prdId] - 1;
        header("Location: ./index.php?content=message&alert=min-een");
    } else {
        //hele product is verwijderd uit u winkelwagen of het zat er niet in
        header("Location: ./index.php?content=message&alert=product-verwijderd");
        unset($cart[$prdId]);
    }
}

$_SESSION['cart'] = json_encode($cart);
// TOEGEVOEGD OF VERWIJDERD UIT CART BERICHT
$cart = json_decode($_SESSION['cart'], true);