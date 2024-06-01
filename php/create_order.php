<?php
include('functions.php');

if(isset($_SESSION['ml_usr_id'])){


if(isset($_POST['location'])){
$location = $_POST['location'];     

$location = escapeString($location);

    $the_usr_id = $_SESSION['ml_usr_id'];
    $mode = $_POST['mode'];

    $mode = escapeString($mode);

    $order_date = date('l jS \of F Y h:i:s A');

    //generate order id
    $order_id = generateOrderId();

    //grand_total
    $total_query = "SELECT SUM(grand_price) from cart_products WHERE usr_id = '$the_usr_id'";
    $total_item = mysqli_query($connection,$total_query);
    checkQuery($total_item);
    while($row = mysqli_fetch_assoc($total_item)){
      $total = $row['SUM(grand_price)'];
    }

    //create order id
    $query = "INSERT INTO orders(order_id,usr_id,order_date,order_grand_total,order_address,order_status,payment_mode)VALUES('$order_id','$the_usr_id','$order_date','$total','$location','confirmed','$mode')";
    $create_order = mysqli_query($connection,$query);
    checkQuery($create_order);


    $query = "SELECT * FROM cart_products WHERE usr_id = '$the_usr_id'";
    $select_cart = mysqli_query($connection,$query);
    checkQuery($select_cart);
    while($row = mysqli_fetch_assoc($select_cart)){
     $prod_id = $row['prod_id'];
     $quantity = $row['quantity'];

     //Create list of order products from usr
     $query = "INSERT INTO order_products(order_id,prod_id,quantity)VALUES('$order_id','$prod_id','$quantity')";
     $create_order_list = mysqli_query($connection,$query);
     checkQuery($create_order_list);


    }

    if($create_order_list){
      ?>

    <div class="d-flex flex-column align-items-center justify-content-center">
    <div class="mb-3"><i class="fas fa-check-circle fa-lg" style="font-size:200px;color:green;"></i></div> 
    <h3 class="text-center mb-3">Order confirmed</h3>
    <p class="text-center mb-3">Your order has been  placed successfully. 
        <a href="?page=track_order" class="text-decoration-none">Track order</a>
    </p>
    <a class="btn btn-success" href="?page=home" >Continue shopping</a>
    </div>

      <?php
        
    }else{
      failMsg('Order transaction failed!!Try again');
    }


}
 


}


?>