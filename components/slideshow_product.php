<div class="container">
<?php

$i=1;
$query = "SELECT * FROM product_images WHERE prod_id = '$prod_id'";
$selec_prod = mysqli_query($connection,$query);
while($row = mysqli_fetch_assoc($selec_prod)){
 $img = $row['img_link'];
  
?>
  <div class="mySlides">
    <div class="numbertext"><?php echo $i++; ?> / <?php echo mysqli_num_rows($selec_prod);  ?></div>
    <img class='img_thumbail' src="uploads/<?php echo $img ?>" style="width:100%">
  </div>


<?php
}
?>

    
  <a class="prev" onclick="plusSlides(-1)"> <i class="fas fa-chevron-left"></i> </a>
  <a class="next" onclick="plusSlides(1)"> <i class="fas fa-chevron-right"></i> </a>

  <div class="caption-container">
    <p id="caption"></p>
  </div>

  <div class="row">

  <?php
  $i=1;
  $query = "SELECT * FROM product_images WHERE prod_id = '$prod_id'";
  $selec_prod = mysqli_query($connection,$query);
  while($row = mysqli_fetch_assoc($selec_prod)){
    $img = $row['img_link'];
    $variant = $row['variant'];
     
   ?>
     <div class="column-thumbnail">
      <img class="demo cursor img_thumbail" src="uploads/<?php echo $img ?>" style="width:100%" onclick="currentSlide(<?php echo $i++; ?>)" alt="<?php echo $variant ?>">
    </div>
   
   
   <?php
   }
   ?>

  
  

  </div>

</div>


<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("demo");
  let captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>