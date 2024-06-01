<div class='container'><!--container-->

  

<form action="" method="post" id='form_add_shoe' autocomplete="off">



<h3 class="h3 mb-3 text-gray-800">Adding <?php getCategory(); ?> category</h3>    

<div id="append-form"><!--append-form-->


<input type="hidden" name="category" value='<?php getCategory(); ?>'>

<div class="form-floating mb-3 prod-name">
  <input type="text" class="form-control" id="floatingInput" name='prod_title' required>
  <label for="floatingInput">Product Name</label>
</div>

<div class="form-floating mb-3 prod-name">
  <input type="number" class="form-control" id="floatingInput" name='pricing' required>
  <label for="floatingInput">Pricing</label>
</div>


<!--gender-->

<label for="" class='gender_label'>Gender</label>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="male" required>
  <label class="form-check-label" for="inlineRadio1"><i class="fas fa-male fa-lg" style='font-size:30px;color:blue;'></i></label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="female" >
  <label class="form-check-label mb-3" for="inlineRadio2"><i class="fas fa-female fa-lg" style='font-size:30px;color:#AA336A;'></i></label>
</div>    
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="others" >
  <label class="form-check-label mb-3" for="inlineRadio2"><i class="fas fa-venus-mars fa-lg" style='font-size:30px;color:gray;'></i></label>
</div>    

<!--gender-->

<div class="form-floating prod-desc">
  <textarea class="form-control"  id="floatingTextarea2" style="height: 150px;resize:none;" name='prod_desc' required></textarea>
  <label for="floatingTextarea2">Product description</label>
</div>

<br>
<input class="btn btn-primary" type="submit" value="Add images">

</div><!--append-form-->


</form>

</div><!--container-->

<script>
    $('#form_add_shoe').submit(function(e){
        e.preventDefault();
        var postData = $(this).serialize();

        $.post('../php/process_product.php',postData,function(data){
            $('#append-form').html(data);

            $("#form_add_shoe")[0].reset();
            document.getElementById('feedback').scrollIntoView({behavior:'smooth'});


        })

    })
</script>