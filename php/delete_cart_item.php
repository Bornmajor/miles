<?php
include('functions.php');

$cart_id = $_POST['cart_id'];
$cart_id = escapeString($cart_id);

$query = "DELETE FROM cart_products WHERE cart_id = '$cart_id'";
$del_cart = mysqli_query($connection,$query);
checkQuery($del_cart);
if($del_cart){
    successMsg("Cart item removed");
}

?>