
    <?php
if(isset($_GET['page'])){
    $source = $_GET['page'];

}else{
    $source = '';

}
switch($source){
case 'home';
include('includes/home.php');
break; 
case 'registration';
include('includes/registration.php');
break;
case 'login';
include('includes/login.php');
break;
case 'logout';
include('includes/signout.php');
break;
case 'category';
include('includes/category.php');
break;
case 'product';
include('includes/product.php');
break;
case 'wishlist';
include('includes/wishlist_products.php');
break;
case 'cart';
include('includes/cart.php');
break;
case 'terms_conditions';
include('includes/terms_conditions.php');
break;
case 'privacy_policy';
include('includes/privacy_policy.php');
break;
case 'delivery_location';
include('includes/delivery_location.php');
break;
case 'track_order';
include('includes/track_order.php');
break;
default:
include('includes/home.php');
}

include('components/modal.php');
?>
</body>
<?php include('includes/footer.php'); ?>

<div id="feedback_notlogin"></div>

<div class="toast_feedback">Please wait...</div>


<script src='js/loadwishlistcart.js'></script>

