
<?php
include('functions.php');

if(isset($_SESSION['ml_usr_id'])){

if(isset($_POST['location'])){
    $location = $_POST['location'];
    $order_grand_total = $_POST['order_grand_total'];

    $location = escapeString($location);
    $order_grand_total = escapeString($order_grand_total);

    $dollar_amount = $order_grand_total / 155;

}    
}

?>



<h3>Choose a mode of payment</h3>


<?php warnMsg("For demo purpose:In order to simulate an order without any charges use pay on delivery");?>
<?php warnMsg("The quoted price excludes both tax and any logistics (delivery) charges.") ?>

<button  class="btn btn-info w-100  pay_on_delivery mb-3" mode="pay-on-delivery"> <i class="fas fa-money-bill"></i> Pay on Delivery</button>

<!--paypal-->
<div id="paypal-button-container"></div>

<!-- <button type="submit" class="btn btn-success w-100">Proceed</button> -->





<!--first make payment proceed to create_order.php-->
<script>
    $(".pay_on_delivery").click(function(data){
        let location = "<?php echo $location ?>";
        let mode = $(this).attr("mode");

        let isConfirm = confirm("You're about to place an order. Are you sure you want to proceed?");


        if(isConfirm){

            $.post("php/create_order.php",{location:location,mode:mode},function(data){
            $(".order-body").html(data);
            $(".order-header").css("background-color","green");
            $(".cancel_order_btn").slideUp();
        })    

        }
    

    

    })
</script>

<script> 
         let amount =  <?php echo   $dollar_amount; ?>; 
         let dollar_amount =  amount.toFixed(2);
           // Replace 'YOUR_CLIENT_ID' with your actual PayPal client ID
           paypal.Buttons({
            createOrder: function(data, actions) {
                // Set the amount dynamically
               // Implement your logic to get the dynamic amount
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: dollar_amount,   
                        },
                        
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Handle the payment success
                    alert('Transaction completed by ' + details.payer.name.given_name);
                });
            }
        }).render('#paypal-button-container');
</script>

