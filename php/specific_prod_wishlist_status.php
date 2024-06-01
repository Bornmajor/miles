<?php
include('functions.php');

$prod_id = $_POST['prod_id'];
if(isset($_SESSION['ml_usr_id'])){
  $usr_id = $_SESSION['ml_usr_id'];
 $query = "SELECT prod_id FROM wishlist WHERE usr_id = '$usr_id' AND prod_id = '$prod_id'"; 
 $check_wishlist =  mysqli_query($connection,$query);
 checkQuery($check_wishlist);
 if(mysqli_num_rows($check_wishlist) !== 0){
    //dont yet wishlisted
  ?>
   
  <span  class='cw wishlist'  prod-id='<?php echo $prod_id ?>'  style="font-size:30px;">
  <i   class="fas fa-heart fa-lg heart-filled-icon"  ></i>
  </span>  

  <?php
 }else{
  ?>

<span  class='cw wishlist'  prod-id='<?php echo $prod_id ?>'  style="font-size:30px;">
    <i   class="fas fa-heart fa-lg heart-light-icon"  ></i>
  </span>
   <?php
 }
}

?>

<script src="js/owl_settings.js"></script>
<script src="js/loadwishlistcart.js"></script>