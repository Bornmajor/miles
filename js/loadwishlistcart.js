function loadAllProducts(){
  $.ajax({
    url: "php/all_products.php",
    type: "POST",
    success:function(data){
      if(!data.error){
        $('.all_products').html(data);
      }

    }

  })
}

loadAllProducts();


function loadWishlistCart(){
    $.ajax({
      url: "php/display_wishlist_cart.php",
      type: "POST",
      success:function(data){
        if(!data.error){
          $('.container_wishlist_cart').html(data);
        }

      }

    })
  }
  loadWishlistCart();
  


$('.wishlist').click(function(){

    let prod_id = $(this).attr('prod-id');
   
  
    
    $.post("php/add_wishlist.php",{prod_id:prod_id},function(data){
    //  console.log("ok");
    $('#feedback_notlogin').html(data);
    loadWishlistCart();
    loadAllProducts();
   loadSpecificWishlistProduct();
  
    
   
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


 