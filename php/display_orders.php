<?php
include("functions.php");


?>


<table class="table table-striped">
<tr>
    <th>Username</th>
    <th>Payment</th>
    <th>Address</th>
    <th>Date</th>
    <th>Order type</th>
    <th>Action</th>
    <th>Remove</th>
</tr>

<?php

$query = "SELECT * FROM orders";
$select_orders = mysqli_query($connection,$query);
checkQuery($select_orders);
while($row= mysqli_fetch_assoc($select_orders)){
$order_id = $row['order_id'];
$usr_id =  $row['usr_id'];
$order_date = $row['order_date'];
$order_grand_total = $row['order_grand_total'];
$order_address = $row['order_address'];
$order_status = $row['order_status'];
$payment_mode = $row['payment_mode'];

?>
<tr>
   
    <td><?php echo displayUsername($usr_id); ?></td>
    <td><?php echo "Ksh ".$order_grand_total; ?></td>
    <td><?php echo $order_address; ?></td>
    <td><?php echo $order_date; ?></td>
    <td><?php echo  $payment_mode ?></td>
    <td>
        <span class="update_status" order-id="<?php echo $order_id ?>"  data-bs-toggle="modal" data-bs-target="#updateOrderStatusModal"><i class="fas fa-pen"></i></span>
        <span><?php echo $order_status;  ?></span>
    </td>
    <td><a  class='icon_link del_order' href="#" order-id='<?php echo $order_id  ?>'><i class="fas fa-trash"></i> </a></td>
</tr>

<?php
}

?>


</table>
<?php
$no_rows = mysqli_num_rows($select_orders);
if($no_rows === 0){
    echo "<div class='no_row_data'>Empty</div>";
}
?>



<script>
    // $('.edit_usr').click(function(data){
    //    let user_id  =  $(this).attr('user-id');
    //     $.post('../php/edit_form_role.php',{user_id:user_id},function(data){

    //         displayUsers();
    //     })
        
    // })

    $('.del_order').click(function(data){
        let order_id  =  $(this).attr('order-id');

        $.post('../php/delete_order.php',{order_id:order_id},function(data){

            displayOrders();
        })
        
    })

     
  
</script>


<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" >
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="updateOrderStatusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Order status</h1>
        <button type="button" class="btn-close" style="background-color:white;" onclick="displayOrders()" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body order-modal-status">
     
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<script>
    $(".update_status").click(function(){
        let order_id = $(this).attr("order-id");

        $.post("../php/update_order_modal.php",{order_id:order_id},function(data){
             $(".order-modal-status").html(data);
        })


    });

  
</script>