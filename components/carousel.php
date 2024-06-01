<div class="container_carousel"><!--carousel container-->

<div id="carouselExample" class="carousel carousel-dark slide"  data-bs-ride="carousel">
  

  <div class="carousel-inner">
     

  <?php
     //most wishlist product
     $query = "SELECT prod_id,COUNT(*) AS frequency FROM wishlist GROUP BY prod_id ORDER BY frequency DESC";
     $most_frequent_wishlist = mysqli_query($connection,$query);
     checkQuery($most_frequent_wishlist);
     if(mysqli_num_rows($most_frequent_wishlist) !== 0 ){
      //if wishlist has data
      while($row = mysqli_fetch_assoc($most_frequent_wishlist)){
        $wish_prod_id =  $row['prod_id'];
   
      
         $query = "SELECT prod_id,prod_title,pricing FROM products WHERE prod_id = '$wish_prod_id'";
         $select_featured = mysqli_query($connection,$query);
         checkQuery($select_featured);
         while($row = mysqli_fetch_assoc($select_featured)){
         $prod_title = $row['prod_title'];
         $prod_id = $row['prod_id'];
         $pricing = $row['pricing'];
   
         ?>
         <div class="carousel-item"><!--carousel-item-->
   
         <div class="d-flex flex-column align-items-center"><!--center container-->
   
         <img  src="images/best_choice.png" class="best_choice_badge"/>
   
        <?php  
        //fetch img based on prod_id
        $query = "SELECT img_link FROM product_images WHERE prod_id = '$prod_id' LIMIT 1";
        $select_prod_img = mysqli_query($connection,$query);
        checkQuery($select_prod_img);
        while($row = mysqli_fetch_assoc($select_prod_img)){
        $img_link =  $row['img_link'];
        }
        ?>
         <img src="uploads/<?php echo $img_link;  ?>"  class="d-block carousel_img" alt="...">
         <div class='d-flex flex-column justify-content-center align-items-center mx-3 my-3'>
   
           <p class="text-center mb-3 carousel_prod_title" style="">
           <?php echo $prod_title ?>
       </p>
           <h5  class="text-center mb-3 carousel_prod_title text-muted">Ksh <?php echo $pricing ?></h5>
           <a href="?page=product&prod_id=<?php echo $prod_id ?>" class="btn btn-primary " >View product</a>  
         </div>
   
      </div><!--center container-->
   
         </div><!--carousel-item-->
   
      
         <?php
         
         }
        }

     }
    

     ?>

 

    
      

 <!-- <a href="?page=category&cat=wallets" class='carousel_links'>
    <div class="carousel-item ">
    <div class='banner_container_1' >
      Wallets
      </div>
      <img src="images/sample_3.png" class="d-block w-100" alt="...">
    </div>
</a> -->

<?php
$query = "SELECT * FROM products";
$select_product = mysqli_query($connection,$query);
checkQuery($select_product);
while($row = mysqli_fetch_assoc($select_product)){
$prod_id = $row['prod_id'];
$prod_title = $row['prod_title'];
$pricing = $row['pricing'];

?>
<!-- <a href="?page=category&cat=wallets" class='carousel_links'>
    <div class="carousel-item">
    <div class='banner_container_1' >
      <?php echo $prod_title?>
      </div>
        
      <?php
      $query = "SELECT * FROM product_images WHERE prod_id = '$prod_id' LIMIT 1" ;
      $select_image = mysqli_query($connection,$query);
      checkQuery($select_image);
      while($row = mysqli_fetch_assoc($select_image)){
      $img_link =  $row['img_link'];

      }
      ?>
      <img src="uploads/<?php echo $img_link ?>" class="d-block w-100" alt="<?php echo $prod_title. "- ". $pricing?>">

      <div class='banner_container_2' >
      <?php echo $pricing?>
      </div>
    </div>
  </div>
</a> -->

<?php
}
?>



  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span  class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span  class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


</div><!--carousel container-->

<script>
   $('.carousel-item').first().addClass('active');  
</script>