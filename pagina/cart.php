<?php

function get_cart() {
    require_once("./scripts/product_db.php");
    require_once("./scripts/cart.php");
    if (isset($cart) && !empty($cart)) {
        //include database
        require_once("./scripts/connect_db.php");
        //maakt variabele van select statement
        $prdSql = 'SELECT * FROM productdb WHERE id IN ('.implode(',', array_keys($cart)).')';
        //kijkt of er resultaat is
        $result = mysqli_query($conn, $prdSql);
        //maakt een array aan
        $dbArr = array();
        //loopt door product id
        while($row = mysqli_fetch_assoc($result)){
            $id = $row['id'];
            unset($row['id']);
            $dbArr[$id] = $row;
        }
        
        $cartTotal = 0;
        
        $cartStr = '<div id="cart-table">';
        $cartStr .= '<table class="table table-sm">';
        $cartStr .= '<thead>
        <tr>
          <th scope="col">img</th>
          <th scope="col">naam-product</th>
          <th scope="col">aantal</th>
          <th scope="col">prijs</th>
          <th scope="col">totaal prijs</th>
          <th scope="col"><img src="./img/plus.png" height="14px"></th>
          <th scope="col"><img src="./img/delete.png" height="14px"></th>
        </tr>
      </thead>';
        foreach($cart as $prdId => $amount) {
            $prdTotal = $amount * $dbArr[$prdId]['product_price'];
            $cartTotal += $prdTotal;
            $cartStr .= '<tr>';
            $cartStr .= '<td>'.$dbArr[$prdId]['product_img'].'</td>';
            $cartStr .= '<td>'.$dbArr[$prdId]['product_name'].'</td>';
            $cartStr .= '<td>'.$amount.'</td>';
            $cartStr .= '<td>'.$dbArr[$prdId]['product_price'].'</td>';
            $cartStr .= '<td>'.$prdTotal.'</td>';
            // $cartStr .= '<td>
            // <form action="index.php?content=cart" method="POST">
            //     <button type="submit" name="add" class="btn btn-warning my-3">add to cart 
            //         <img src="./img/wagen.png" height="10px">
            //     </button>
            //     <input type="hidden" name="product_id" value="$id">
            // </form>
            // </td>';
            $cartStr .= '</tr>';
        }
        $cartStr .= '</table>';
        $cartStr .= '</div>';

        return $cartStr;
    } else{
        return 'geen producten in winkelwagen.';

    }
}
?>

<div class="container">
    <?=get_cart();?>
    <a href="./index.php?content=producten1" class="btn btn-secondary btn-lg btn-block" role="button" aria-pressed="true">verder gaan met winkelen</a>
    <a href="./index.php?content=message&alert=nog-niet-begonnen" class="btn btn-success btn-lg btn-block" role="button" aria-pressed="true">afronden</a>
</div>