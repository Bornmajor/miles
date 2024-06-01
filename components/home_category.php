<div class="category_products"><!--category_products-->
<h3 class='title_group'>Category</h3>

<div class="container_products"><!--container_products-->
<div class="products"><!--products-->

<div class="owl-carousel"><!--carousel-->
<?php
$query = "SELECT * FROM category_products";
$select_category = mysqli_query($connection,$query);
checkQuery($select_category);
while($row = mysqli_fetch_assoc($select_category)){
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title'];
$cat_img = $row['cat_img'];

?>
<div class="card category" >
<a href="?page=category&cat=<?php echo $cat_title ?>">
  <img src="images/<?php echo $cat_img  ?>" class="card-img-top" alt="...">
  <div class="card-body">
  <h5 class="card-title"><?php echo ucfirst($cat_title) ?></h5>

  </div>
  </a>
</div>
<?php
} 
?>

</div><!--carousel-->
</div><!--products-->
</div><!--container_products-->



</div><!--category_products-->