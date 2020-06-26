<?php
require_once("./scripts/product_db.php");
require_once("./scripts/compononent.php");

   
        if (isset($_POST['add'])){
            // var_dump($_POST['product_id']);
        if(isset($_SESSION['cart'])){
            // var_dump($_SESSION['cart']);
            array_column($_SESSION['cart'], 'product_id');
            
            var_dump($_SESSION['cart']);
        }else{
            $item_array= array('product_id'=>$_POST['product_id']);

            $_SESSION['cart'][0] = $item_array;

            var_dump($_SESSION['cart']);
        }


        }

    $result = getData();
    while($row = mysqli_fetch_assoc($result)){;
    component($row['product_name'], $row['product_price'], $row['total_price'],$row['product_img'],$row['id']);
   }
?>
