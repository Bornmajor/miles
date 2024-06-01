<div class='container'><!--container-->

<h3 class="h3 mb-0 text-gray-800">
<?php
$cat = $_GET['category']; 
echo ucfirst($cat). " table";
 ?>
</h3>
<br>

<div class="table-responsive view_table"><!--table-responsive-->
<div class="loader"></div>

</div><!--table-responsive-->

</div><!--container-->

<script>
function displayProducts(){
    let category = '<?php echo $_GET['category'] ?>';
    $.ajax({
        url: "../php/display_products.php",
        type: "GET",
        data: {category:category},
        success: function(show_prod){
            if(!show_prod.error){
                $('.view_table').html(show_prod);

            }

        }
    })
}

setTimeout(function(){
    displayProducts();

        },2000);

</script>