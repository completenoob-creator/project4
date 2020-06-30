<?php

function get_cart() {
    require_once("./scripts/product_db.php");
    require_once("./scripts/cart.php");
    if (isset($cart) && !empty($cart)) {
        require_once("./scripts/connect_db.php");

        $prdSql = 'SELECT * FROM productdb WHERE id IN ('.implode(',', array_keys($cart)).')';
        
        $result = mysqli_query($conn, $prdSql);

        $dbArr = array();

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
</div>