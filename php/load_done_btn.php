<?php
include('functions.php');

$new_prod_id = $_POST['new_prod_id'];
$new_prod_id = escapeString($new_prod_id);

$query = "SELECT * FROM product_images WHERE prod_id = '$new_prod_id'";
$check_img_exist = mysqli_query($connection,$query);
checkQuery($check_img_exist);

$total_imgs = mysqli_num_rows($check_img_exist);
if($total_imgs > 0){
echo '<a href="" class="btn btn-success">Done</a>';
}

?>