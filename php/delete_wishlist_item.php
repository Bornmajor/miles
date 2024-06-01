<?php
include('functions.php');

$the_wishlist_id  = $_POST['wishlist_id'];

$query = "DELETE FROM wishlist WHERE wishlist_id = '$the_wishlist_id'";
$del_wishlist = mysqli_query($connection,$query);
checkQuery($del_wishlist);
if($del_wishlist){
    successMsg("Wishlist item removed");
}
?>