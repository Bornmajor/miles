<?php
include('functions.php');

if(isset( $_SESSION['ml_usr_id'])){
 $usr_id  = $_SESSION['ml_usr_id'];

$the_prod_id = $_POST['prod_id'];
$pricing = $_POST['pricing'];

$pricing = escapeString($pricing);
$the_prod_id = escapeString($the_prod_id);

$query = "SELECT * FROM cart_products  WHERE prod_id = '$the_prod_id' AND usr_id = '$usr_id'";
$check_prod  = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($check_prod)){
$cart_id = $row['cart_id'];

}
if(!isset($cart_id)){
    //item does not exist

$query = "INSERT INTO cart_products(usr_id,prod_id,pricing,quantity,variant,grand_price)VALUES('$usr_id','$the_prod_id',$pricing,1,'unspecified',$pricing)";    
$insert_cart = mysqli_query($connection,$query);

if($insert_cart){
    successMsg('Product added to shop cart!!');     
}else{
die("Query failed".mysqli_error($connection));
}   

}else{
    //item already exist in cart
    warnMsg("Item already added to your cart");
}



}else{
    // header("location: ?page=login");
           //redirecting
           echo "<script type='text/javascript'>
           window.setTimeout(function() {
               window.location = '?page=login&request=no_cart';
           }, 2000);
           </script>";
}



?>