<?php include('includes/header.php'); ?>
    <title>Miles concepts store | Cart</title>
    <meta name="description" content="Miles concepts - Cart">
    <script src="https://www.paypal.com/sdk/js?client-id=AZTgoqj0EfGK89tr88fbxjbuxhfbjGNHVF9qD4jwoVeG8tPDEnMEi54rpT3ia_4J5hKiC-rD_pkh716k&currency=USD"></script>
</head>

<body>
<?php  
 //navbar
 include('includes/navbar.php');

 ?>
<div class='page_title_banner'>
Shopping cart 
</div>

<?php
if(!isset($_SESSION['ml_usr_id'])){
header("Location: ?page=login&request=no_cart");
}
?>

<div class="container_cart"><!--container_cart-->

<div class="card cart-list" style="width: 100%;"><!--cart-list-->
  <div class="card-header d-flex align-items-center justify-content-center" style='font-size:30px;font-weigh:600;'>
  <i class="fas fa-shopping-cart"></i> 
  </div>

  <!--individual cart item-->
  <ul class="list-group list-group-flush cart-items">
  <div class="loader"></div>
  </ul>
  <!--individual cart item-->


</div><!--cart-list-->

<div class="subtotal_price"><!--subtotal_price-->

<div class="loader"></div>

</div><!--subtotal_price-->


</div><!--container_cart-->






<script>

//load cart
function loadCartItems(){
  $.ajax({
    url: "php/display_cart.php",
    type: "POST",
    success:function(data){
      if(!data.error){
        $('.cart-items').html(data);
      }

    }
  })
}

//calling
setTimeout(function(){
  loadCartItems();

},2000);


//load grand total cart items
function loadGrandPrice(){
    $.ajax({
      url:"php/display_grand_price.php",
      type:"POST",
      success:function(data){
        if(!data.error){
          $('.subtotal_price').html(data)
        }
      }
    })
  }
//calling
setTimeout(function(){
  loadGrandPrice();

},2000);


</script>
