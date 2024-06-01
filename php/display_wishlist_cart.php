<?php
include('functions.php');

?>
<a  href ='?page=wishlist' class="position-relative wishlist_icon">
<i class="fas fa-heart" style='font-size:20px;'></i>
  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
    <?php
     if(isset($_SESSION['ml_usr_id'])){
     $usr_id =  $_SESSION['ml_usr_id'];

     $query = "SELECT * FROM wishlist WHERE usr_id = '$usr_id'";
     $select_wishlist = mysqli_query($connection,$query);
     checkQuery($select_wishlist);
     while($row = mysqli_fetch_assoc($select_wishlist)){
      $wishlist_id =  $row['wishlist_id'];
      
     }
     if(isset($wishlist_id)){
      echo $total_saves = mysqli_num_rows($select_wishlist);

     }else{
        echo $total_saves = mysqli_num_rows($select_wishlist);
     }

     }else{
        echo "0";
     }
    ?>
    <span class="visually-hidden">unread messages</span>
  </span>
</a>

<a   href ='?page=cart' class=" position-relative cart_icon">
<i class="fas fa-shopping-cart" style='font-size:20px;'></i>
  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
  <?php
     if(isset($_SESSION['ml_usr_id'])){
     $usr_id =  $_SESSION['ml_usr_id'];

     $query = "SELECT * FROM cart_products WHERE usr_id = '$usr_id'";
     $select_cart = mysqli_query($connection,$query);
     checkQuery($select_cart);
     while($row = mysqli_fetch_assoc($select_cart)){
      $cart_id =  $row['cart_id'];
      
     }
     if(isset($cart_id)){
      echo $total_carts = mysqli_num_rows($select_cart);

     }else{
        echo $total_carts = mysqli_num_rows($select_cart);
     }

     }else{
        echo "0";
     }
    ?>
    <span class="visually-hidden">unread messages</span>
  </span>
</a>