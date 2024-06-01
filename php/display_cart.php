<?php
include('functions.php');

?>

    <?php
    $the_usr_id = $_SESSION['ml_usr_id'];
    $query = "SELECT * FROM cart_products WHERE usr_id = '$the_usr_id'";
    $select_cart = mysqli_query($connection,$query);
    checkQuery($select_cart);
    while($row = mysqli_fetch_assoc($select_cart)){
      $cart_id = $row['cart_id'];
     $prod_id = $row['prod_id'];
     $pricing = $row['pricing'];
     $grand_price =$row['grand_price'];
     $quantity = $row['quantity'];

     ?>
      <li class="list-group-item"><!--cart_item-->

      <div class="img_cart_others_cart_details" ><!--img_cart_others_cart_details-->
      <?php
      $query = "SELECT * FROM products WHERE prod_id = '$prod_id'";
      $select_prod_cart = mysqli_query($connection,$query);
      checkQuery($select_prod_cart);
      while($row = mysqli_fetch_assoc($select_prod_cart)){
      $prod_title =  $row['prod_title'];
    

      }
      ?>

      <?php
      $query = "SELECT * FROM product_images WHERE prod_id = '$prod_id' LIMIT 1";
      $select_cart_img = mysqli_query($connection,$query);
      checkQuery($select_cart_img);
      while($row = mysqli_fetch_assoc($select_cart_img)){
       $img = $row['img_link'];

      }
      ?>

      <div class="cart_img"><img src="uploads/<?php echo $img  ?>" width='100px' alt=""></div>


      <div class="cart_details"><!--cart_details-->

      <div class="cart_prod_title"><?php echo $prod_title ?></div>
      <div class="cart_prod_pricing">
        <span style='font-size:14px;'>Ksh</span>  <span style='font-size:20px;'><?php echo $pricing ?></span> 
       
      </div>

      <div class="div_quantity">

    <span class="quantity-remove quantity-button minus_quantity"> <i class="fas fa-minus"></i> </span>
      <input type="number" step="1" min="1" max='9' name="quantity" class='cart_quantity' value="<?php echo $quantity ?>"  cart-id='<?php echo $cart_id; ?>'>
      <span class="quantity-add quantity-button add_quantity"> <i class="fas fa-plus"></i> </span>
 
    </div>

    <div class="cart_prod_pricing grand_total">
        Total <i class="fas fa-arrow-right"></i> <span style='font-size:14px;'>Ksh</span>  <span style='font-size:25px;'><?php echo $grand_price ?></span> 
       
      </div>

      

      <div class='delete_cart' cart-id='<?php echo $cart_id; ?>'><i class="fas fa-times fa-lg"></i></div>

      </div><!--cart_details-->

        </div><!--img_cart_others_cart_details-->

        

      </li><!--cart_item-->
     

     <?php
    }
    echo emptyTableRowMsg($select_cart,'Cart empty!!');
    ?>
   

    <script>
        
$('.delete_cart').click(function(){
  let cart_id = $(this).attr('cart-id');
  

  $.post('php/delete_cart_item.php',{cart_id:cart_id},function(data){

    $('.toast_feedback').fadeIn();

    setTimeout(function(){
    loadCartItems();
    loadWishlistCart();
    loadGrandPrice();
    

    $('.toast_feedback').fadeOut(4000);

  },2000);

  })
})




$('.quantity-button').off('click').on('click', function () {
  
  if ($(this).hasClass('quantity-add')) {
    var addValue = parseInt($(this).parent().find('input').val()) + 1;
    if( addValue > 9 ) {
      addValue = 9;
		}
		$(this).parent().find('input').val(addValue).trigger('change');
	}

	if ($(this).hasClass('quantity-remove')) {
    var removeValue = parseInt($(this).parent().find('input').val()) - 1;
		if( removeValue == 0 ) {
      removeValue = 1;
		}
		$(this).parent().find('input').val(removeValue).trigger('change');
	}

});


$('.quantity input').off('change').on('change', function() {
  console.log($(this).val());
});



// $('.minus_quantity, .add_quantity').click(function(){
//  let cart_id = $('.cart_quantity').attr('cart-id');
//   alert(cart_id);
// })

$('.cart_quantity').change(function(){

  $(this).each(function(){
 let cart_id = $(this).attr('cart-id');
 let quantity = $(this).val();

 $.post('php/update_grand_price.php',{cart_id:cart_id,quantity:quantity},function(data){
  loadCartItems();
  loadGrandPrice();
 })


  })





})

    </script>
    

