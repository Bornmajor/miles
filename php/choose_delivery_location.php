<?php
include('functions.php');

?>

<form action="" method="post" id="users_delivery_locations">

<?php
if(isset( $_SESSION['ml_usr_id'])){
$usr_id = $_SESSION['ml_usr_id'];

$query = "SELECT * FROM locations WHERE usr_id = '$usr_id'";
$select_delivery_locations = mysqli_query($connection,$query);
checkQuery($select_delivery_locations);
if(mysqli_num_rows($select_delivery_locations) !== 0){
while($row = mysqli_fetch_assoc($select_delivery_locations)){
$location_id =   $row['location_id'];
$county = $row['county'];
$sub_county = $row['sub_county'];
$ward = $row['ward'];
$street = $row['street'];
$home_address = $row['home_address']

?>
<input type="radio" class="btn-check location-radio-check"
 name="location" id="<?php echo $location_id; ?>" 
 autocomplete="off"
 value="<?php echo $county.'-'.$sub_county.'-'.$ward.'-'.$street.' | '.$home_address ?>">
 <label class="btn btn-outline-secondary radio_location_btn" 
   for="<?php echo $location_id; ?>">
   <?php echo $county.'-'.$sub_county.'-'.$ward.'-'.$street.' | '.$home_address;  ?>
</label>
 <br>

<?php
}

}else{
 warnMsg("No saved locations");   
}

}


?>






 <button type="submit" class="btn btn-success submit_location_btn  my-3" disabled="true">Proceed</button>

</form>

<script>
    $(document).ready(function(){

    $(".location-radio-check").click(function(){
     $(".submit_location_btn").prop("disabled",false); 
      })

      $("#users_delivery_locations").submit(function(e){
        e.preventDefault();

        let postData = $(this).serialize();

        $.post("php/submit_order.php",postData,function(data){
           $(".order-body").html(data);
           //hide add new location btn
           $('.cancel_order_btn').slideDown();
           $('.unlock_new_loc_form').slideUp();

        })

      })


    })
</script>