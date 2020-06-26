<?php
require_once("./pagina/producten1.php");
require_once("./scripts/product_db.php");

?>

<?php
function component($product_name,$product_price,$total_price,$productimg,$product_id){
    $element="<div class='col-md-3 col-sm-6 my-3 my-md-0'>
    <form action='./index.php?content=producten1' method='POST'>
        <div class='card-shadow' style='width: 18rem;' >
            <div>
                <img src='$productimg' height='10px' alt='' class='img-fluid card-img-top'>
            </div>
        
            <div class='card-body'>
                <h5 class='card-title'>$product_name</h5>
                <h6>
                <img src='./img/star.png' height='14px' alt=''>
                <img src='./img/star.png' height='14px' alt=''>
                <img src='./img/star.png' height='14px' alt=''>
                <img src='./img/star.png' height='14px' alt=''>
                </h6>
                <p class='card-text'>
                    some quick example text to build on the card
                </p>
                <span class='price'> $$product_price</span>
                <span class='price'> inclusief btw $$total_price</span>
                <button tyoe='submit' name='add' class='btn btn-warning my-3'>add to cart <img src='./img/wagen.png' height='10px' alt=''></button>
                <input type='hidden' name='product_id' value='$product_id'>
                 </div>
        </div>
    </form>
 </div>";
 echo $element;

 }
 
 ?>