<?php

require 'connection.php';

$q = "SELECT p_name, p_unitOfMeasure, p_price FROM t_products WHERE c_id = ".$_POST["item"];
$result = $db->query($q);

while($row = $result->fetch_assoc()){

    echo
    '
    <div class="selection-item">
      <img src="img/placeholder.jpg" alt="">
      <a href="">'.$row["p_name"].'</a>
      <span>₱'.$row["p_price"].' / '.$row["p_unitOfMeasure"].'</span>
      <div class="quantity-adjust">
        <span class="material-symbols-outlined">remove</span>
        <span class="counter">1</span>
        <span class="material-symbols-outlined">add</span> 
      </div>
      <button>
        <span class="material-symbols-outlined">
        shopping_cart
        </span>
        <span>Add to Cart</span>
      </button>
    </div>';
}

// echo $db->query($q);
?>