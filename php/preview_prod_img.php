<?php 
 include('functions.php');
 
  
    $query = "SELECT * FROM product_images WHERE prod_id = '$new_prod_id'";
    $select_images = mysqli_query($connection,$query);
    checkQuery($select_images);
    while($row = mysqli_fetch_assoc($select_images)){
      $img =  $row['img_link'];
      ?>

      <img src="../uploads/<?php echo $img ?>" width='200px' alt="">
    <?php
    }

?>