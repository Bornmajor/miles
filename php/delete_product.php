<?php   
include('functions.php');

$prod_id = $_POST['prod_id'];
$prod_id = escapeString($prod_id);

$query = "SELECT * FROM product_images WHERE prod_id = '$prod_id'";
$select_imgs = mysqli_query($connection,$query);
checkQuery($select_imgs);

while($row = mysqli_fetch_assoc($select_imgs)){
$img = $row['img_link'];

//delete all img folders
unlink('../uploads/'.$img);

}

//delete wishlist item
$query = "DELETE FROM wishlist WHERE prod_id = '$prod_id'";
$delete_wishlist = mysqli_query($connection,$query);

checkQuery($delete_wishlist);


//delete review item
$query = "DELETE FROM reviews WHERE prod_id = '$prod_id'";
$delete_reviews = mysqli_query($connection,$query);

checkQuery($delete_reviews);


//delete cart item 
$query = "DELETE FROM cart_products WHERE prod_id = '$prod_id'";
$delete_carts = mysqli_query($connection,$query);

checkQuery($delete_carts);



// Delete all images from DB associate with product
$query = "DELETE FROM product_images WHERE prod_id = '$prod_id'";
$delete_imgs = mysqli_query($connection,$query);



$query = "DELETE FROM products WHERE prod_id = '$prod_id'";
$del_product = mysqli_query($connection,$query);
checkQuery($del_product);


?>