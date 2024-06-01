<?php
include('functions.php');

$order_id  = $_POST['order_id'];
$order_status  = $_POST['order_status'];
$order_status = escapeString($order_status);

$query = "UPDATE orders SET order_status = '$order_status' WHERE order_id = '$order_id'";
$update_status = mysqli_query($connection,$query);
checkQuery($update_status);
if($update_status){
    successMsg('Status updated');
}
?>