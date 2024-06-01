<?php
include('functions.php');

$the_prod_id = $_POST['prod_id'];

$the_prod_id = escapeString($the_prod_id);

$query = "SELECT * FROM products WHERE prod_id = '$the_prod_id'";
$select_prod = mysqli_query($connection,$query);
checkQuery($select_prod);

while($row = mysqli_fetch_assoc($select_prod)){
 $prod_title = $row['prod_title'];
 $prod_desc = $row['prod_desc'];
 $pricing = $row['pricing'];
 $prod_desc = $row['prod_desc'];
 $gender = $row['gender'];
 $cat = $row['category'];

}




?>

<form action="" method="post" id='update_product_form'>
 
<div class="feedback_update_product"></div>

<div class="form-floating mb-3">
  <input type="text" class="form-control" id="floatingInput" value='<?php  echo $prod_title; ?>' name='prod_title'>
  <label for="floatingInput">Product Name</label>
</div>   

<div class="form-floating">
  <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="category">

    <!-- <option>Open this select menu</option> -->
    <option value="<?php echo $cat  ?>" selected><?php echo $cat ?></option>
    <option value="shoes">shoe</option>
    <option value="wallets">wallets</option>

  </select>
  <label for="floatingSelect">Select category type</label>
</div>
<br>

<div class="form-floating mb-3">
  <input type="number"  class="form-control" id="floatingInput" value='<?php  echo $pricing; ?>' name='pricing'>
  <label for="floatingInput">Pricing</label>
</div>   

<div class="form-floating">
  <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="gender">
    <!-- <option>Open this select menu</option> -->
    <option value="<?php echo $gender  ?>" selected><?php echo $gender ?></option>
    <option value="male">male</option>
    <option value="female">female</option>

  </select>
  <label for="floatingSelect">Select gender type</label>
</div>


<div class="form-floating">
<textarea class="form-control"  id="floatingTextarea2" style="height: 200px;resize:none;margin:10px 0 10px 0;" name='prod_desc'><?php echo $prod_desc; ?></textarea>
  <label for="floatingTextarea2">Product Description</label>
</div>

<input type="hidden" name="prod_id" value='<?php echo $_POST['prod_id']; ?>'>

<input type="submit" value="Update product"   class='btn btn-primary'>



</form>

<script>
    $('#update_product_form').submit(function(e){

     e.preventDefault();
      
     let postData = $(this).serialize();

     $.post('../php/update_product.php',postData,function(data){
      $('.feedback_update_product').html(data);
      
     })
    

    })


</script>