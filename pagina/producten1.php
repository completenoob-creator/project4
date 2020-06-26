<?php
require_once("./scripts/product_db.php");
require_once("./scripts/compononent.php");

   
        if (isset($_POST['add'])){
            // print_r($_POST['product_id']);
            if (isset($_SESSION['cart'])){
                $item_array_id= array_column($_SESSION['cart'],'product_id');
                
            }else{
                $item_array = array(
                    'product_id' => $_POST['product_id']
                );

                $_SESSION['cart'][0] = $item_array;

            }
        }

    $result = getData();
    while($row = mysqli_fetch_assoc($result)){;
    component($row['product_name'], $row['product_price'], $row['total_price'],$row['product_img'],$row['id']);
   }
?>