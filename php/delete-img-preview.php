<?php
include('functions.php');

$the_img_id = $_POST['img_id'];
$the_prod_id = $_POST['prod_id'];
$the_img_id = escapeString($the_img_id);

//delete image from folder
$query = "SELECT * FROM product_images WHERE img_id = $the_img_id";
$select_img_link = mysqli_query($connection,$query);
checkQuery($select_img_link);
while($row = mysqli_fetch_assoc($select_img_link)){
$img_link =  $row['img_link'];

}
if($select_img_link){
    unlink('../uploads/'.$img_link);
}

$query = "DELETE FROM product_images WHERE img_id = $the_img_id";
$del_img = mysqli_query($connection,$query);
checkQuery($del_img);
if($del_img){

    $query = "SELECT * FROM product_images WHERE prod_id = '$the_prod_id'";
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
  


}

?>
<script>
    $('.delete_img_preview').click(function(){
     let img_id =  $(this).attr('img-id');
     let prod_id = '<?php echo $_POST['prod_id'] ?>';

     $.post("../php/delete-img-preview.php",{img_id:img_id,prod_id:prod_id},function(data){
        $('#feedback_img_preview').html(data);
     })

    })
</script>