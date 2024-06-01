<?php include('includes/header.php'); ?>
    <title>Miles concepts | Homepage</title>
    <meta name="description" content="Miles concepts - Home">
  
</head>
<body>
<div style='margin:0;' class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Note</strong>  The website is undergoing improvements and is not ready for production
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
    
 <?php  
 //navbar
 include('includes/navbar.php');

 ?>
<!--carousel-->
<?php  
include('components/carousel.php');
?>
<!--carousel-->


<!--category-->
<?php  
include('components/home_category.php');
?>
<!--category-->

<!--products-->

<?php
include('components/home_all_products.php');
?>
<!--products-->

<!--custom order-->
<?php
include('components/custom_order.php');
?>
<!--custom order-->
<script>
    $('.home').css("border-bottom","2px solid white");
</script>

