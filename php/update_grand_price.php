<?php
include('functions.php');

$the_quantity = $_POST['quantity'];
$the_cart_id = $_POST['cart_id'];

$the_quantity = escapeString($the_quantity);
$the_cart_id = escapeString($the_cart_id);

$query = "SELECT * FROM cart_products WHERE cart_id = $the_cart_id";
$select_price = mysqli_query($connection,$query);
checkQuery($select_price);
while($row = mysqli_fetch_assoc($select_price)){
$pricing = $row['pricing'];

}
$grand_price = $pricing * $the_quantity;

$query = "UPDATE cart_products SET quantity = $the_quantity , grand_price = $grand_price WHERE cart_id = $the_cart_id";
$update_price = mysqli_query($connection,$query);
checkQuery($update_price);


?>