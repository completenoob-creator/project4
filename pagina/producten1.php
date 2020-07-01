<?php
//include alle scripts die nodig zijn
require_once("./scripts/product_db.php");
require_once("./scripts/compononent.php");
require_once("./scripts/cart.php");

//maakt van de session een json_encode
$_SESSION['cart'] = json_encode($cart);

//zorgt dat de producten uit de database worden gehaald en daarna loopt tussen de rows
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
