<?php
include('functions.php');

if(isset($_SESSION['ml_usr_id'])){
  if(isset($_POST['order_id'])){
    $order_id = $_POST['order_id'];
    $order_id = escapeString($order_id);

  }

       $query = "SELECT * FROM orders WHERE order_id = '$order_id'";
      $select_orders = mysqli_query($connection,$query);
      checkQuery($select_orders);

        while($row = mysqli_fetch_assoc($select_orders)){
        $order_id = $row['order_id'];
        $order_date = $row['order_date'];
        $order_grand_total = $row['order_grand_total'];
        $order_status = $row['order_status'];
        $order_address = $row['order_address'];  
        }
  ?>





<div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $order_id  ?></h1>

        <button type="button" class="btn-close" style="background-color:white;" data-bs-dismiss="modal" aria-label="Close"></button>
     
      </div>
      <div class="modal-body">



      <div class="order_address">
       <span class="emphasis-text" style="font-size:20px;" > <i class="fas fa-map-marker-alt"></i> </span>   <span><?php echo $order_address ?></span>
      </div>

      <div class="order-date">
       <span class="emphasis-text" style="font-size:20px;"><i class="fas fa-clock"></i> </span>   <span><?php  echo $order_date ?></span>
      </div>

      <div class="order-products">
      <?php
      $query = "SELECT * FROM order_products WHERE order_id = '$order_id'";
      $select_order_products = mysqli_query($connection,$query);
      checkQuery($connection,$query);
      while($row = mysqli_fetch_assoc($select_order_products)){
          $prod_id = $row['prod_id'];
          $quantity  = $row['quantity'];


      //fetch product details
      $query = "SELECT * FROM products WHERE prod_id = '$prod_id'";
      $select_products = mysqli_query($connection,$query);
      checkQuery($select_products);
      while($row = mysqli_fetch_assoc($select_products)){
      $prod_title = $row['prod_title'];
      $pricing = $row['pricing'];

      ?>
      <!--product -->
      <div class="products-ordered">
      <?php
      //get image
      $query = "SELECT * FROM product_images WHERE prod_id = '$prod_id' LIMIT 1";
      $select_prod_img = mysqli_query($connection,$query);
      checkQuery($select_prod_img);
      while($row = mysqli_fetch_assoc($select_prod_img)){
          $img_link = $row['img_link'];

          ?>
      <img class="img-products-ordered" src="uploads/<?php echo $img_link ?>"  alt="addidas_1.jpg">
          <?php
      }
      
      
      ?>


      <div class="product-order-title">
      <span class="quantity-tag">Quantity</span> <i class="fas fa-arrow-right"></i> <span ><?php echo $quantity ?></span>
      <div><span><?php echo $prod_title; ?></span> </div>   
      </div>

      <div class="product-order-quantity-price">
     
            <span>Ksh</span>  <span  style="font-size:20px;font-weight:650"><?php echo $pricing; ?> </span>
      </div>


      
    

      </div>  
      <!-- #product -->



      <?php
      } 
      }
      ?>


      </div>
        
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>

<?php
}

?>

