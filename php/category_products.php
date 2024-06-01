<?php
include('functions.php');
$cat = $_GET['cat'];


$auto_prod_id = $_GET['auto_prod_id'];
$gender = $_GET['gender'];
$pricing = $_GET['pricing'];

$cat = escapeString($cat);
$auto_prod_id = escapeString($auto_prod_id);
$pricing =  escapeString($pricing);
$gender = escapeString($gender);

if(isset($_GET['gender'])){
if($gender == 'any'){
$query ="SELECT * FROM products WHERE category = '$cat' ORDER BY auto_prod_id $auto_prod_id, pricing $pricing";
}
else{
$query ="SELECT * FROM products WHERE category = '$cat' AND gender = '$gender' ORDER BY auto_prod_id $auto_prod_id, pricing $pricing";    
}

}else{
$query ="SELECT * FROM products WHERE category = '$cat' ORDER BY auto_prod_id $auto_prod_id, pricing $pricing";   
}

//  echo $query;


$select_all_products = mysqli_query($connection,$query);
checkQuery($select_all_products);
while($row = mysqli_fetch_assoc($select_all_products)){

$prod_id =  $row['prod_id'];
$prod_title = $row['prod_title'];
$pricing = $row['pricing'];

?>

<div class="card product wishlist_card" prod-name="<?php echo $prod_title ?>"><!--card-->
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
  <div class="card-body">
  <p class="card_product_name"><?php echo $prod_title ?></p>
  <div class='card_links'>
  <div class="card_pricing">Ksh <span style='font-size:20px;font-weight:590;'><?php echo $pricing ?></span>  </div>
    <div class='btn btn-success'><a href="?page=product&prod_id=<?php echo $prod_id ?>"  style='color:white;'>View</a></div>
    <div  class='cw add-cart-product' prod-id='<?php echo $prod_id ?>' price='<?php echo $pricing ?>'><i class="fas fa-cart-plus fa-lg"></i></div>
     

    <!--wishlist add/remove btn dynamic-->
    <div class="heart-icon-card" prod-id='<?php echo $prod_id ?>'>

    <?php 
    if(isset($_SESSION['ml_usr_id'])){
      $usr_id = $_SESSION['ml_usr_id'];
     $query = "SELECT prod_id FROM wishlist WHERE usr_id = '$usr_id' AND prod_id = '$prod_id'"; 
     $check_wishlist =  mysqli_query($connection,$query);
     checkQuery($check_wishlist);
     if(mysqli_num_rows($check_wishlist) !== 0){
      ?>
       
      <span  class='cw wishlist' prod-id='<?php echo $prod_id ?>'>
      <i   class="fas fa-heart fa-lg heart-filled-icon"  ></i>
      </span>  

      <?php
     }else{
      ?>
   
      <span  class='cw wishlist'  prod-id='<?php echo $prod_id ?>' >
        <i   class="fas fa-heart fa-lg heart-light-icon"  ></i>
      </span>

       <?php
     }
    }else{
      ?>
        <span  class='cw wishlist'  prod-id='<?php echo $prod_id ?>' >
        <i   class="fas fa-heart fa-lg heart-light-icon"  ></i>
      </span>

    <?php
    }
    

    ?>
    </div>
    <!--wishlist add/remove btn dynamic-->
  

   
  
  

  </div>

  </div>
  </a>
</div><!--card-->

<?php
}
echo emptyTableRowMsg($select_all_products,'Category unavailable!!');
?>

<script>

function filterProducts(){

let searchText = $('#search_prod').val().toUpperCase();

 
$('.product').each(function(i){

let prod_name = $(this).attr('prod-name').toUpperCase();
if(prod_name.indexOf(searchText) > -1){
$(this).css("display","");
}else{
 $(this).css("display","none");
}




})
}
    
  $('.wishlist').click(function(){

let prod_id = $(this).attr('prod-id');

$.post("php/add_wishlist.php",{prod_id:prod_id},function(data){
//  console.log("ok");
$('#feedback_notlogin').html(data);
loadWishlistCart();
loadAllProducts();
getCategoryProducts();

})
})

$('.add-cart-product').click(function(){
let prod_id = $(this).attr('prod-id');
let pricing = $(this).attr('price');

$.post("php/add_cart.php",{prod_id:prod_id,pricing:pricing},function(data){
//  console.log("ok");
$('#feedback_notlogin').html(data);
loadWishlistCart();

})
})
 
</script>