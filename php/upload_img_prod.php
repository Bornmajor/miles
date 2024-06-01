<div id='feedback_img_preview'>
<?php  
include('functions.php');


    $prod_id = $_POST['prod_id'];

    $img_link = $_FILES['image']['name'];
    $img_tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($img_tmp,"../uploads/$img_link");

    $prod_id = escapeString($prod_id);
    $img_link = escapeString($img_link);

    $query = "INSERT INTO product_images(prod_id,img_link)VALUES('$prod_id','$img_link')";
    $insert_img  = mysqli_query($connection,$query);

    if($insert_img){

        // successMsg("Image added");
        //display related images
        $query = "SELECT * FROM product_images WHERE prod_id = '$prod_id'";
        $select_images = mysqli_query($connection,$query);
        checkQuery($select_images);
        while($row = mysqli_fetch_assoc($select_images)){
          $img_id = $row['img_id'];
          $img =  $row['img_link'];
          ?>
            <div class='previews_container_upload'>
                <span title='Delete Image' img-id='<?php echo $img_id ?>' class='delete_img_preview'><i class="fas fa-times"></i></span>
             <img src="../uploads/<?php echo $img ?>" width='200px' alt="">   
            </div>
          
        <?php
        }
    



    }else{
        die("Query failed".mysqli_error($connection));
    }



?>
</div>
<script>
    $('.delete_img_preview').click(function(){
     let img_id =  $(this).attr('img-id');
     let prod_id = '<?php echo $_POST['prod_id'] ?>';

     $.post("../php/delete-img-preview.php",{img_id:img_id,prod_id:prod_id},function(data){
        $('#feedback_img_preview').html(data);
     })

    })
</script>