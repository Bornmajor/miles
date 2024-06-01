<?php
include("functions.php");


?>


<table class="table table-striped">
<tr>
     <th>#</th>
    <th>Prod title</th>
    <th>Pricing</th>
    <th>Gender</th>
    <th>Edit</th>
    <th>Delete</th>
</tr>

<?php

$cat = $_GET['category']; 
$query = "SELECT * FROM products WHERE category =  '$cat'";
$select_products = mysqli_query($connection,$query);
checkQuery($select_products);
while($row= mysqli_fetch_assoc($select_products)){

$prod_id =  $row['prod_id'];
$prod_title = $row['prod_title'];
$pricing = $row['pricing'];
$gender = $row['gender'];

?>
<tr>
    <td><?php echo $prod_id ?></td>
    <td><?php echo $prod_title ?></td>
    <td><?php echo $pricing ?></td>
    <td><?php echo $gender ?></td>
    <td><a  class='icon_link edit_prod'  href="#" prod-id='<?php echo $prod_id  ?>' data-bs-toggle="modal" data-bs-target="#update_product"><i class="fas fa-pen"></i> </a></td>
    <td><a   class='icon_link del_prod' href="#" prod-id='<?php echo $prod_id  ?>'><i class="fas fa-trash"></i> </a></td>
</tr>

<?php
}

?>


</table>


<!-- Update -->
<div class="modal fade" id="update_product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Update product</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style='background-color:white;'></button>
      </div>
      <div class="modal-body feedback_update_prod">
      
      <div class="loader"></div>

      </div>
      <div class="modal-footer">
    
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>

<?php
$no_rows = mysqli_num_rows($select_products);
if($no_rows === 0){
    echo "<div class='no_row_data'>Empty table</div>";
}
?>

<script>
    $('.edit_prod').click(function(){
        let prod_id = $(this).attr('prod-id');


        $.post('../php/edit_product_form.php',{prod_id:prod_id},function(data){
         $('.feedback_update_prod').html(data);
        })
    })

    $('.del_prod').click(function(){
    let prod_id = $(this).attr('prod-id');
    
    $.post('../php/delete_product.php',{prod_id:prod_id},function(data){
     
       displayProducts();  
    })
   


    })
</script>

