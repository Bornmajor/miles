<?php
include('functions.php');

    if(isset($_SESSION['ml_usr_id'])){


    $the_usr_id = $_SESSION['ml_usr_id'];

    $query = "SELECT * FROM wishlist WHERE usr_id = '$the_usr_id'";
    $select_wishlist = mysqli_query($connection,$query);
    checkQuery($select_wishlist);
    while($row = mysqli_fetch_assoc($select_wishlist)){
        $wishlist_id = $row['wishlist_id'];
        $prod_id =  $row['prod_id'];
        $usr_id = $row['usr_id'];
   
        

if(isset($usr_id)){
?>


<div class="card product wishlist_card" ><!--card-->
<a href="?page=product&prod_id=<?php echo $prod_id ?>">
    <?php
    $query = "SELECT * FROM product_images WHERE prod_id = '$prod_id' LIMIT 1";
    $select_img = mysqli_query($connection,$query);
    checkQuery($select_img);
    while($row = mysqli_fetch_assoc($select_img)){
      $img_link = $row['img_link'];

    }
    ?>
  <img src="uploads/<?php echo $img_link  ?>" class="card-img-top" alt="...">

  <?php
  $query = "SELECT * FROM products WHERE prod_id = '$prod_id'";
  $select_prod = mysqli_query($connection,$query);
  checkQuery($select_prod);
  while($row = mysqli_fetch_assoc($select_prod)){
    $prod_title = $row['prod_title'];
    $pricing = $row['pricing'];
  }
  ?>

  <div class="card-body">
  <p class="card_product_name"><?php echo $prod_title ?></p>
  <div class='card_links'>
  <div class="card_pricing">Ksh <span style='font-size:20px;font-weight:590;'><?php echo $pricing ?></span>  </div>
    <div class='btn btn-success'><a href="?page=product&prod_id=<?php echo $prod_id ?>"  style='color:white;'>View</a></div>
    
    <div  class='cw add-cart-product' prod-id='<?php echo $prod_id ?>' price='<?php echo $pricing ?>'><i class="fas fa-cart-plus fa-lg"></i></div>

    <div  class='cw del-wishlist'  wishlist-id='<?php echo $wishlist_id; ?>' prod-id='<?php echo $prod_id ?>'><i class="fas fa-trash fa-lg"></i></div>
  
  

  </div>

  </div>
  </a>
</div><!--card-->



<?php
}
}

echo emptyTableRowMsg($select_wishlist,'No items wishlist ');
 
    }else{
      echo "<script type='text/javascript'>
      window.setTimeout(function() {
          window.location = '?page=login&request=no_wishlist';
      }, 2000);
      </script>";
    }

?>


<script>
   $('.add-cart-product').click(function(){
    let prod_id = $(this).attr('prod-id');
    let pricing = $(this).attr('price');
    
    $.post("php/add_cart.php",{prod_id:prod_id,pricing:pricing},function(data){
    //  console.log("ok");
    $('#feedback_notlogin').html(data);
    loadWishlistCart();

    })
  })

    $('.del-wishlist').click(function(){
        let wishlist_id = $(this).attr("wishlist-id");
        
        $('.toast_feedback').fadeIn();
        // alert(wishlist_id);
        $.post('php/delete_wishlist_item.php',{wishlist_id:wishlist_id},function(data){

  
  

        setTimeout(function(){
        displayWislistItems();
        loadWishlistCart();
       

       $('.toast_feedback').fadeOut(4000);

        },2000);

        })
    })
</script>


