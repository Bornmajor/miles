<?php
include('functions.php');



?>
    <div class="subtotal_title">Total price</div>
    <span style='font-size:18px;'>Ksh</span>  
   
    <div class="grand_total_cart"><!--grand_total_cart-->
    <?php
    $usr_id = $_SESSION['ml_usr_id'];
    $total_query = "SELECT SUM(grand_price) from cart_products WHERE usr_id = '$usr_id'";
    $total_item = mysqli_query($connection,$total_query);
    while($row = mysqli_fetch_assoc($total_item)){
      $total = $row['SUM(grand_price)'];
    }
    if(isset($total)){
        echo $total;
    }else{
       echo 0;
    }
  
    
   
    ?>

    </div><!--grand_total_cart-->
   <?php
    if(isset($total)){
      ?>
      
    <br>
    <a href="#" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#orderModal">
      Place my order
    </a>
     
     <?php
    }
   ?>

  
<!-- Modal -->
<div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header order-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Order confirmation</h1>
        <button type="button" style="font-size:16px;background-color:white;"  class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body order-body" style="font-size:16px;">
        <!--location-->
        <?php
        

        ?>
       <p>Choose delivery location</p>
  
       <!--dynamic choose location-->
       <div class="delivery_location"></div>

       <form action="" method="post" id="new_location_form">

       <div class="form-floating">
        <textarea class="form-control" placeholder="Add precise address" name="location" id="floatingTextarea2" style="height: 100px" required></textarea>
        <label for="floatingTextarea2">Enter new location</label>
      </div>
      <br>
        <button type="submit" class="btn btn-secondary submit_new_loc_btn" >Add</button>

       </form>
     

  
    


        <!--location-->
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary cancel_order_btn" onclick="window.location.reload()" data-bs-dismiss="modal">Cancel process</button>
        <a  class="btn btn-primary unlock_new_loc_form" href="?page=delivery_location"><i class="fas fa-plus-circle"></i>
         Add new location
        </a>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){

  // $(".unlock_new_loc_form").click(function(){
  //   $("#new_location_form").slideToggle();
  // });

  $("#new_location_form").submit(function(e){

   e.preventDefault();
   $('.submit_new_loc_btn').prop("disabled",true);

   let postData = $(this).serialize();

   $.post("php/add_delivery_location.php",postData,function(data){
    $('.submit_new_loc_btn').prop("disabled",false);
    $("#new_location_form")[0].reset();

    loadDeliveryLocation();
   })
  })

 
});

function loadDeliveryLocation(){
  $.ajax({
    url:"php/choose_delivery_location.php",
    type:"POST",
    success:function(data){
        if(!data.error){
          $('.delivery_location').html(data);
        }

      }
  })
}

loadDeliveryLocation();




</script>