<?php include('includes/header.php'); ?>
    <title>Miles concepts store | Wishlist</title>
    <meta name="description" content="Miles concepts - Wishlist">
</head>
<body>
<?php  
//navbar
include('includes/navbar.php');
?>    

<div class='page_title_banner'>
 Wishlist items
</div>

<?php
if(!isset($_SESSION['ml_usr_id'])){
header("Location: ?page=login&request=no_wishlist");
}
?>

<div class="products"><!--products-->


<div class="loader"></div>

</div><!--products-->

<script>
   function displayWislistItems(){
    $.ajax({
        url: "php/display_wishlist_items.php",
        type: "POST",
        success:function(data){
            if(!data.error){
              $('.products').html(data);  
            }

        }

    })
   }
   
   setTimeout(function(){
    displayWislistItems();

        },2000);

   

  

</script>