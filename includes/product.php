<?php include('includes/header.php'); ?>
    <title>
    <?php
    $the_prod_id = $_GET['prod_id'];
    $the_prod_id = escapeString($the_prod_id);
    $query = "SELECT * FROM products WHERE prod_id = '$the_prod_id'";
    $select_product = mysqli_query($connection,$query);
    checkQuery($select_product);
    while($row = mysqli_fetch_assoc($select_product)){
        $prod_title = $row['prod_title'];
        $pricing = $row['pricing'];
     
        
    }
    echo $prod_title;
  ?>
      
    </title>
    <meta name="description" content="<?php    echo $prod_title. " - ". "Ksh " .$pricing;?>">
</head>
<body>

<?php  
 //navbar
 include('includes/navbar.php');

 ?>

<?php
    $the_prod_id = $_GET['prod_id'];
    $the_prod_id = escapeString($the_prod_id);
    $query = "SELECT * FROM products WHERE prod_id = '$the_prod_id'";
    $select_product = mysqli_query($connection,$query);
    checkQuery($select_product);
    while($row = mysqli_fetch_assoc($select_product)){
        $prod_id =  $row['prod_id'];
        $prod_title = $row['prod_title'];
        $pricing = $row['pricing'];
        $prod_desc = $row['prod_desc'];
        $gender = $row['gender'];
        
    }

    ?>


<div class="carousel_vw_prod_details"><!--carousel_vw_prod_details-->

<div class="prod_img_carousel_view"><!--prod_img_carousel_view-->

<?php
include('components/slideshow_product.php');
?>


</div><!--prod_img_carousel_view-->

<div class="product_details_view"><!--product_details_view-->
 
<div class="prod_title"><?php echo $prod_title ?></div>

<div class="prod_pricing"><span style='font-size:14px;'>Ksh</span>  <?php echo $pricing; ?></div>

<!--dynamic product wishlist btn-->
<div class='prod_wishlist'>

</div>
<!--dynamic product wishlist btn-->

<form action="#" method="post" id='add_cart_form'>


<div class="prod_quantity">
     <div class="quantity_title">Quantity</div>
     
   <button type='button' class='minus_quantity' onclick="decreaseValue()"> <i class="fas fa-minus"></i> </button>
    <input type="number" name="quantity" class='cart_quantity' min='1' max='10' value='1'  >
    <button  type='button' class='add_quantity' onclick="increaseValue()" ><i class="fas fa-plus"></i> </button> 

</div>

<?php 
$query = "SELECT * FROM product_images WHERE prod_id = '$prod_id'";
$select_variant = mysqli_query($connection,$query);
checkQuery($select_variant);
while($row = mysqli_fetch_assoc($select_variant)){
  $variant =  $row['variant'];
}
if(!empty($variant)){
?>
<div class="prod_variants">
    <div class="variant_title">Variations available </div>
    <select class='select_variant' name="variant" id="" required>
    <option value="" selected>Select product variation</option>
    <?php
    
    $query = "SELECT * FROM product_images WHERE prod_id = '$prod_id'";
    $select_variant = mysqli_query($connection,$query);
    checkQuery($select_variant);
    while($row = mysqli_fetch_assoc($select_variant)){
    $variant =  $row['variant'];
    ?>
    
   
   <option value="<?php echo $variant  ?>"><?php echo $variant  ?></option>
    <?php
    }
    ?>  
    </select>
</div>

<?php
}
?>




<div class="prod_add_cart">
<input type="hidden" name="prod_id" value='<?php echo $prod_id ?>'>
<input type="hidden" name="pricing" value='<?php echo $pricing ?>'>
<button type="submit"  class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Add cart </button>

</div>

</form>

<div class="like_dislike_container">

<span>Do you like this product?</span>

<span class='like_prod'><i class="far fa-thumbs-up fa-lg" ></i></span>
<span class='dislike_prod'><i class="far fa-thumbs-down fa-lg"></i></span>

</div>

</div><!--product_details_view-->

</div><!--carousel_vw_prod_details-->



<div class="product_description"><!--product_description-->
<div class="desc_title">Product description</div>
<?php 
echo $prod_desc;
?>
</div><!--product_description-->


<div class="comments_container"><!--comments_container-->

<!--current_usr_profile-->
<!-- <form action="" method="post" id='form_review'>

<div class="current_usr_profile">
<span><i class="fas fa-user-circle"></i></span>
<?php  
if(isset($_SESSION['ml_usr_id'])){

 echo displayUsername($_SESSION['ml_usr_id']);
}
?> 
</div>

<input type="hidden" name="prod_id" value='<?php echo $prod_id ?>'>
<input type="hidden" name="usr_id" value='<?php echo $_SESSION['ml_usr_id']; ?>'>

<div class="form-floating">
  <textarea class="form-control review_txt_area" placeholder="Leave a comment here" id="floatingTextarea" style='height:100px;' name='review_desc' required></textarea>
  <label for="floatingTextarea">Comment here</label>
  
  <div class="feedback_comment" style='margin-top:10px;'></div>
  <br>
  <button type="submit" class='btn btn-primary send_review'>Send comment <i class="fab fa-telegram fa-lg"></i></button>

</div>


</form> -->
<!--current_usr_profile-->

<div class="other_comments"><!--other_comments-->

<div class="comments_prod_title">
Reviews on this product
</div>


<div id="load_comment">
  <div class="loader"></div>
</div>






</div><!--other_comments-->

</div><!--comments_container-->


<script>
  $('.like_prod ,.dislike_prod').click(function(){
  $('.like_dislike_container').html('Thank you for your feedback');  
  })

   function loadProductComments(){
     let prod_id = '<?php echo $prod_id ?>'; 
      $.ajax({
    url: "php/display_prod_comments.php",
    data:{prod_id:prod_id},
    type: "POST",
    success:function(comments){
      if(!comments.error){
        $('#load_comment').html(comments);
      }

    }
  })
   }
   
   setTimeout(function(){
    loadProductComments();

    },2000);
  


$('#form_review').submit(function(e){
  e.preventDefault();
  let postData = $(this).serialize();

  $.post('php/add_review.php',postData,function(data){
    $('.feedback_comment').html(data);
    $("#form_review")[0].reset();
    loadProductComments();

  })

})

    function increaseValue() {
  
  var value = parseInt($('.cart_quantity').val(), 10);
  value = isNaN(value) ? 0 : value;
  value > 8 ? value = 8 : '';
  value++;
  $('.cart_quantity').val(value);
  // document.getElementById('number').value = value;
}

function decreaseValue() {
  var value = parseInt($('.cart_quantity').val(), 10);
  value = isNaN(value) ? 0 : value;
  value < 2 ? value = 2 : '';
  value--;
  $('.cart_quantity').val(value);
  // document.getElementById('number').value = value;
}

$('#add_cart_form').submit(function(e){
  e.preventDefault();
  let postData = $(this).serialize();

  $.post("php/add_cart_quantity.php",postData,function(data){
    $('#feedback_notlogin').html(data);
    loadWishlistCart();

  })

})

function loadSpecificWishlistProduct(){
  let prod_id = '<?php echo $prod_id ?>'; 
  $.ajax({
      url: "php/specific_prod_wishlist_status.php",
      data:{prod_id:prod_id},
      type: "POST",
      success:function(data){
        if(!data.error){
          $('.prod_wishlist').html(data);
        }
      }

    })
}
loadSpecificWishlistProduct();

</script>