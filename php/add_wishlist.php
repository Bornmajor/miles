<?php
include('functions.php');

if(isset( $_SESSION['ml_usr_id'])){
 $usr_id  = $_SESSION['ml_usr_id'];

$the_prod_id = $_POST['prod_id'];
$the_prod_id = escapeString($the_prod_id);

$query = "SELECT * FROM wishlist WHERE prod_id = '$the_prod_id' AND usr_id = '$usr_id'";
$check_prod  = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($check_prod)){
$wishlist_id = $row['wishlist_id'];

}
if(!isset($wishlist_id)){
    //item does not exist
$query = "INSERT INTO wishlist(usr_id,prod_id)VALUES('$usr_id','$the_prod_id')";    
$insert_wishlist = mysqli_query($connection,$query);

if($insert_wishlist){
successMsg('Product added to wishlist!!');    
  
}else{
die("Query failed".mysqli_error($connection));    
}   

}else{
    //item already exist
    //warnMsg("Item already added to your wishlist");
$query = "DELETE FROM wishlist WHERE prod_id = '$the_prod_id' AND usr_id = '$usr_id'";
$remove_wishlist = mysqli_query($connection,$query);
checkQuery($remove_wishlist);
    
}



}else{
  
    // header("location: ?page=login");
           //redirecting
           echo "<script type='text/javascript'>
           window.setTimeout(function() {
               window.location = '?page=login&request=no_wishlist';
           }, 2000);
           </script>";
}



?>