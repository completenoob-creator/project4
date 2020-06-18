<?php
function sanitize($raw_data){
    global $conn;
    $data = htmlspecialchars($raw_data);
    $data = mysqli_real_escape_string($conn, $data);
    $data = trim($data);
    return $data;
 }


 function mk_password_hash_from_microtime(){
    $mut= microtime();

    $time = explode(" ", $mut);

    $password = $time[1] * $time[0] * 1000000;

    $password_hash = password_hash($password,PASSWORD_BCRYPT);

    $onehour = mktime(1,0,0,1,1,1970);

    $date_formated = date("d-m-Y", ($time[1] + $onehour));

    $time_formated = date("H:i:s",($time[1] + $onehour));

    return array("password_hash" => $password_hash,
                 "date" => $date_formated,
                 "time" => $time_formated);
 };

 function component($productname , $productprice,$productimage){
    $element="
    <div class=\"col-4\">
    <form>
        <div class=\"card-shadow" style="width: 18rem;\">
            <div>
                <img src=\"$productimage\" height=\"10px" alt="" class="img-fluid card-img-top\">
            </div>
        
            <div class="card-body">
                <h5 class="card-title">$productname</h5>
                <h6>
                <img src="./img/wagen.png" height="10px" alt="">
                <img src="./img/wagen.png" height="10px" alt="">
                <img src="./img/wagen.png" height="10px" alt="">
                <img src="./img/wagen.png" height="10px" alt="">
                </h6>
                <p class="card-text">
                    some quick example text to build on the card
                </p>
                <small><s class="text-secondary">$519</s></small>
                <span class="price">$productprice</span>
                <button tyoe="submit" name="add" class="btn btn-warning my-3">add to cart <img src="./img/wagen.png" height="10px" alt=""></button>
            </div>
        </div>
    </form>
 </div>';
 echo $element;

 }
 



?>
   
 