<?php
include('functions.php');


if(isset($_SESSION['ml_usr_id'])){
$usr_id = $_SESSION['ml_usr_id'];    

if(isset($_POST['location'])){

$location = $_POST['location'];
$location = escapeString($location);



}



}

?>

<div class="mx-3" style="border-radius:8px;padding:5px;border:1px solid #f1f1f1;">
<h3>Location</h3>
<i class="fas fa-map-marker-alt" style="font-size:20px;"></i> <?php echo $location; ?>   
</div>


  <!--individual cart item-->
  <ul class="list-group list-group-flush cart-items"   style="margin:0px;">
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

      <div class="cart_img"><img src="uploads/<?php echo $img  ?>" width='80px' alt=""></div>


      <div class="cart_details"><!--cart_details-->

      <div class="cart_prod_title" style="font-size:14px;"><?php echo $prod_title ?></div>
      <div class="cart_prod_pricing">
        <span style='font-size:14px;'>Ksh</span>  <span style='font-size:16px;'><?php echo $pricing ?></span> 
       
      </div>

      <div class="div_quantity" style="font-size:14px;">
       <span>Quantity <i class="fas fa-arrow-right"></i> <?php echo $quantity ?></span> 
      </div>

    <div class="cart_prod_pricing grand_total">
        Total <i class="fas fa-arrow-right"></i> <span style='font-size:14px;'>Ksh </span>  <span style='font-size:22px;'><?php echo $grand_price ?></span> 
       
      </div>

    

      </div><!--cart_details-->

        </div><!--img_cart_others_cart_details-->

        

      </li><!--cart_item-->
     

     <?php
    }
    echo emptyTableRowMsg($select_cart,'Cart empty!!');
    ?>
  </ul>
  <!--individual cart item-->

  <!--grand_total-->

  <div class="mx-3 my-2">
    <?php
    $total_query = "SELECT SUM(grand_price) from cart_products WHERE usr_id = '$usr_id'";
    $total_item = mysqli_query($connection,$total_query);
    while($row = mysqli_fetch_assoc($total_item)){
      $total = $row['SUM(grand_price)'];
    }
     ?>
    <span>Grand  total <i class="fas fa-arrow-right"></i> Ksh</span> 
    <span class="mb-3" style="font-size:25px;"><?php echo $total; ?></span>
  </div>

  <button type="submit" class="btn btn-success w-100 proceed_payment_btn">Proceed to payment</button>

  <script>
     $(document).ready(function(){
        $('.proceed_payment_btn').click(function(data){
            let location = "<?php echo $location ?>";
            let order_grand_total = "<?php echo $total ?>"

            $.post('php/order_payment.php',{location:location,order_grand_total:order_grand_total},function(data){
              $(".order-body").html(data);
            })
        })
     })
  </script>