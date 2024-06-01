<?php
include('functions.php');

$order_id = $_POST['order_id'];
$order_id = escapeString($order_id);

$query = "DELETE FROM orders WHERE order_id = '$order_id'";
$del_order = mysqli_query($connection,$query);
checkQuery($del_order);



?>