<?php
include('functions.php');

$order_id = $_POST['order_id'];
$order_id = escapeString($order_id);


?>

<form action="" method="post" id="form_update_order_status">

       <div id="order_status_feedback"></div>

       <input type="hidden" name="order_id" value="<?php echo $order_id ?>">
           
           <input type="radio" class="btn-check" id="confirmed" name="order_status" value="confirmed" autocomplete="off" required>
           <label class="btn btn-outline-success" for="confirmed" > <i class="fas fa-check-circle"></i> Confirmed</label>
  
           <input type="radio" class="btn-check" id="shipped"  name="order_status" value="shipped" autocomplete="off">
           <label class="btn btn-outline-primary" for="shipped"> <i class="fas fa-shuttle-van"></i>  Shipped</label><br><br>
  
           <input type="radio" class="btn-check" id="returned"  name="order_status" value="returned" autocomplete="off">
           <label class="btn btn-outline-warning" for="returned"> <i class="fas fa-exchange-alt"></i> Returned</label>
  
           <input type="radio" class="btn-check" id="cancelled"  name="order_status" value="cancelled" autocomplete="off">
           <label class="btn btn-outline-danger" for="cancelled"> <i class="fas fa-ban"></i> Cancelled</label><br><br>
  
           <input type="radio" class="btn-check" id="picked-up" name="order_status" value="picked up" autocomplete="off">
           <label class="btn btn-outline-info" for="picked-up"> <i class="fas fa-shopping-bag"></i> Picked Up</label>
           <br><br>
  
  
  
              <button type="submit" class="btn btn-success">Update</button>
</form>

<script>
      $("#form_update_order_status").submit(function(e){
        e.preventDefault();

        let postData =  $(this).serialize();
   

        $.post("../php/update_order_status.php",postData,function(data){
            $("#order_status_feedback").html(data);
         
          
        })
       
         


    })
</script>