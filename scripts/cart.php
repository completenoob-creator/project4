<?php
//kijken of de cart is aangemaakt zoja gaat hij in de sessie zo nee  maakt hij er een aan
if(isset($_SESSION['cart'])){
    $cart = json_decode($_SESSION['cart'], true);
} else {
    $cart = array();
}
 
//als der op de add to cart button gedrukt wordt voert hij dit script uit dus wordt er 1 aan toegevoegd
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
//als je remove from cart klikt kom je bij dit script uit
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