<?php
include('functions.php');


if(isset($_POST['category'])){

//escaping strng
$category = $_POST['category'];
$prod_title = $_POST['prod_title'] ;
$pricing = $_POST['pricing'];
$gender = $_POST['gender'];
$prod_desc = $_POST['prod_desc'];

$category = escapeString($category);
$prod_title = escapeString($prod_title);
$pricing = escapeString($pricing);
$gender = escapeString($gender);
$prod_desc = escapeString($prod_desc);

if(!empty($prod_title)&& !empty($pricing) && !empty($gender) && !empty($prod_desc) && !empty($category)){

//gen prod -id
$new_prod_id =  generate_prod_id(8);

$query = "SELECT * FROM products WHERE prod_id = '$new_prod_id'";
$check_product = mysqli_query($connection,$query);
checkQuery($check_product);
while($row = mysqli_fetch_assoc($check_product)){
   $db_prod_id =  $row['prod_id'];
}
//prod_id exist
if(isset($db_prod_id)){
$new_prod_id =  generate_prod_id(8);

}else{
$new_prod_id =  generate_prod_id(8);
}

$query = "INSERT INTO products(prod_id,category,prod_title,pricing,gender,prod_desc) VALUES('$new_prod_id','$category','$prod_title',$pricing,'$gender','$prod_desc')";
$insert_product = mysqli_query($connection,$query);

//success insert
if($insert_product){
    successMsg('Product created!!');

?>
<form action="" method="post" id='form_img_upload' enctype="multipart/form-data">

<div class="alert alert-success" role="alert">
  <h3 class="alert-heading">Product name -> <?php echo $prod_title;  ?></h3>
  <p class="mb-0">Image extensions allow png , jpg , jpeg.</p>
  <p class="mb-0">Multiple images allowed .</p>

</div>


<div class="mb-3">
    <input type="hidden" name="prod_id" value='<?php echo $new_prod_id ?>' id="">
  <!-- <label for="formFile" class="form-label">Upload product images</label> -->
  <input class="form-control" type="file" id="file" name='image' accept="image/png, image/jpeg" required>
</div>

<span class='load_btn_done'></span>


<input class="btn btn-primary" type="submit" value="Add image">

</form>

<div class="preview_imgs">
   <div id="feedback"></div> 
</div>

<?php

    //add upload image

}

}else{
    failMsg('All fields required!!');
}


}
?>
<script>
  

    function loadBtnDone(){
        let new_prod_id = '<?php echo $new_prod_id ?>';
        $.ajax({
        url: '../php/load_done_btn.php',
        type: 'POST',
        data:{new_prod_id:new_prod_id},
        success:function(response){
            if(response != 0){
              $('.load_btn_done').html(response);
            }

        }
    })  
    }

    $('#form_img_upload').submit(function(e){
      e.preventDefault();

 
    $.ajax({
        url: "../php/upload_img_prod.php",
        type:"POST",
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function(response){
            if(response != 0){
               $('#feedback').html(response);
               $("#form_img_upload")[0].reset();
               loadBtnDone();
            }
        }


    })
  
    })

    

</script>