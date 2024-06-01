<?php
include('functions.php');


$prod_id = $_POST['prod_id'];
$prod_title = $_POST['prod_title'];
$cat = $_POST['category'];
$pricing = $_POST['pricing'];
$gender = $_POST['gender'];
$prod_desc = $_POST['prod_desc'];


$prod_title = escapeString($prod_title);
$prod_id = escapeString($prod_id);
$cat  = escapeString($cat);
$pricing = escapeString($pricing);
$gender = escapeString($gender);
$prod_desc = escapeString($prod_desc);

$query = "UPDATE products SET prod_title = '$prod_title', prod_desc = '$prod_desc', category = '$cat' , pricing = $pricing , gender = '$gender' WHERE prod_id = '$prod_id'";
$update_product =  mysqli_query($connection,$query);
checkQuery($update_product);

if($update_product){
    successMsg('Product updated');
}
?>