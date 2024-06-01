<div class='container'><!--container-->

<div class="feedback_role"></div>


<h3 class="h3 mb-0 text-gray-800">
Client orders
</h3>
<br>

<div class="table-responsive view_table"><!--table-responsive-->

<div class="loader"></div>

</div><!--table-responsive-->

</div><!--container-->

<script>
function displayOrders(){
    $.ajax({
        url: "../php/display_orders.php",
        type: "POST",
        success: function(show_usr){
            if(!show_usr.error){
                $('.view_table').html(show_usr);

            }

        }
    })
}
setTimeout(function(){
displayOrders();
},2000);

</script>