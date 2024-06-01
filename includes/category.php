<?php include('includes/header.php'); ?>
    <title>Miles concepts | 
    <?php 
    $cat = $_GET['cat'];
    echo ucfirst($cat);
 
    
    ?>
    </title>
    <meta name="description" content="Miles concepts - <?php  echo ucfirst($cat); ?>">
</head>
<body>

<?php  
 //navbar
 include('includes/navbar.php');

 ?>

<div class='filter_container'><!--filter_container-->

<div class="filter_top"><!--filter-->
<form action="" method="get" class="filter_category_form">
  
<input type="hidden" name="page" value='category'>
<input type="hidden" name="cat" value='<?php echo $_GET['cat'];  ?>'>


<div class='select_inline'><!--select_inline-->
    <select  class='form-select' name="gender" id="gender" >
        <option value="any" selected>Gender</option>
        <option value="male">Gents</option>
        <option value="female">Ladies</option>
    </select>

    <select class='form-select' name="pricing" id="pricing" >
        <option value="" selected>Sort by price</option>
        <option value="ASC" >Lowest to highest</option>
        <option value="DESC">Highest to lowest</option>
        
    </select>

    <select class='form-select' name="auto_prod_id" id="auto_prod_id" >
    <option value="" selected>Sort by date</option>
        <option value="DESC" >Newest to oldest </option>
        <option value="ASC">Oldest to newest</option>
    </select>

    <input type="submit"   class="form-select btn btn-success apply_btn" value='Apply filter'>

</div><!--select_inline-->

</form>

</div><!--filter-->

<div class="aside_products_container"><!--aside_products_container-->



<div class="filter_aside"><!--filter_aside-->

<input type="text" class="form-control" id='search_prod' onkeyup="filterProducts()" placeholder='Search product'>

</div><!--filter_aside-->

<div class="query_products"><!--query_products-->

</div><!--query_products-->

</div><!--aside_products_container-->




</div><!--filter_container-->

<script>


  function getCategoryProducts(){
    let cat = "<?php echo  $cat  ?>";
    $.ajax({
      url:"php/category_products.php",
      method:'GET',
      data:{cat:cat},
      success:function(data){
        $(".query_products").html(data);
      }

    })
  }

  getCategoryProducts();

   $(".filter_category_form").submit(function(e){

    e.preventDefault();
    let cat = "<?php echo  $cat  ?>";
    let auto_prod_id = $("#auto_prod_id").val();
    let gender = $("#gender").val();
    let pricing = $("#pricing").val();

    // let postData = $(this).serialize();
      $.get("php/category_products.php",{cat:cat,auto_prod_id:auto_prod_id,gender:gender,pricing:pricing},function(data){
        $(".query_products").html(data);
      })
   })
</script>