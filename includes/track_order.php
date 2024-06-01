<?php include('includes/header.php'); ?>
    <title>My Order</title>
    <meta name="description" content="Miles concepts - Login">
    <style>
    .nav-track-order a{
        color:black;
    }
    .tab-pane{
        margin:20px;
    }    
    </style>
</head>
<body>

<?php  
 //navbar
 include('includes/navbar.php');

 ?>

<div class='page_title_banner'>
Orders
</div>


<?php
if($_SESSION['ml_usr_id']){
$usr_id = $_SESSION['ml_usr_id'];


?>
<!--tabs-->

<div class="container mt-5">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" id="myTabs">
        <li class="nav-item nav-track-order">
            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home">Active </a>
        </li>
        <li class="nav-item nav-track-order">
            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile">History</a>
        </li>
        <li class="nav-item nav-track-order">
            <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact">Cancelled</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <!--active-->
    <div class="tab-content">
        <div class="tab-pane fade show active" id="home">
            <h3>Active order</h3>

            <div class="order-container">
             
            <div class="order-card-header">

                <div class="order-id-header">
                Order ID
                </div>

               

                <div class="order-header-payment">
                    Payment
                </div>

                <div class="order-header-status">
                    Status
                </div>

                <div class="order-header-products">
                    Action
                </div>
                
                </div>


          

                <?php
                
                $query = "SELECT * FROM orders WHERE usr_id = '$usr_id'";
                $select_orders = mysqli_query($connection,$query);
                checkQuery($select_orders);
                if(mysqli_num_rows($select_orders) !== 0){

                while($row = mysqli_fetch_assoc($select_orders)){
                $order_id = $row['order_id'];
                $order_date = $row['order_date'];
                $order_grand_total = $row['order_grand_total'];
                $order_status = $row['order_status'];
                $order_address = $row['order_address'];
                


                ?>
                <!--order-->
            <div class="order-card">


            <div class="order-id">
                <div><i class="fas fa-archive" style="font-size:80px;"></i></div>
             <span><?php echo $order_id ?></span> 
            </div>


            
           <!--order-details-->
          

         

            <div class="order-grand-total">
                <span>Ksh </span> <span style="font-size:20px;font-weight:650"><?php echo $order_grand_total ?></span>
            </div>

          

            <div class="order-status">
             <span><i class="fas fa-check-circle"></i></span>   <span><?php echo $order_status ?></span>
            </div>   

               <!-- Button trigger modal -->
               <button type="button" class="btn btn-primary view-products-btn" order-id="<?php echo $order_id ?>" data-bs-toggle="modal" data-bs-target="#orderproductsModal">
                more details
                </button>
            </div>

         
            <!--order-details-->

          


            <!--order-->


                <?php

                }


                }else{
                    warnMsg("No active orders");
                }
               

                ?>

             

            </div>

            
        </div>
  <!--active-->


        <div class="tab-pane fade" id="profile">
            <h4>Order history</h4>

            
            <div class="order-container">
             
            <div class="order-card-header">

                <div class="order-id-header">
                Order ID
                </div>

               

                <div class="order-header-payment">
                    Payment
                </div>

                
                <div class="order-header-date">
                    Date 
                </div>

         

                <div class="order-header-products">
                    Action
                </div>
                
                </div>


          

                <?php
                
                $query = "SELECT * FROM orders WHERE usr_id = '$usr_id'";
                $select_orders = mysqli_query($connection,$query);
                checkQuery($select_orders);
                if(mysqli_num_rows($select_orders) !== 0){

                while($row = mysqli_fetch_assoc($select_orders)){
                $order_id = $row['order_id'];
                $order_date = $row['order_date'];
                $order_grand_total = $row['order_grand_total'];
                $order_status = $row['order_status'];
                $order_address = $row['order_address'];
                


                ?>
                <!--order-->
            <div class="order-card">


            <div class="order-id">
                <div><i class="fas fa-archive" style="font-size:80px;"></i></div>
             <span><?php echo $order_id ?></span> 
            </div>


            
           <!--order-details-->
        

         

            <div class="order-grand-total">
                <span>Ksh </span> <span style="font-size:20px;font-weight:650"><?php echo $order_grand_total ?></span>
            </div>

                <div class="order-grand-date text-center"  style="width:150px;margin:10px;">
                 <span><?php echo $order_date ?></span>
            </div>

               <!-- Button trigger modal -->
               <button type="button" class="btn btn-primary view-products-btn" order-id="<?php echo $order_id ?>" data-bs-toggle="modal" data-bs-target="#orderproductsModal">
                more details
                </button>
            </div>

         
            <!--order-details-->

          


            <!--order-->


                <?php

                }


                }else{
                    warnMsg("No  order history");
                }
               

                ?>

             

            </div>

            
            
 
        </div>



        <div class="tab-pane fade" id="contact">
            <h4>Cancelled order</h4>

            
            <div class="order-container">
             
            <div class="order-card-header">

                <div class="order-id-header">
                Order ID
                </div>

               

                <div class="order-header-payment">
                    Payment
                </div>

             

                <div class="order-header-products">
                    Action
                </div>
                
                </div>


          

                <?php
                
                $query = "SELECT * FROM orders WHERE usr_id = '$usr_id' AND order_status = 'cancelled'";
                $select_orders = mysqli_query($connection,$query);
                checkQuery($select_orders);
                if(mysqli_num_rows($select_orders) !== 0){

                while($row = mysqli_fetch_assoc($select_orders)){
                $order_id = $row['order_id'];
                $order_date = $row['order_date'];
                $order_grand_total = $row['order_grand_total'];
                $order_status = $row['order_status'];
                $order_address = $row['order_address'];
                


                ?>
                <!--order-->
            <div class="order-card">


            <div class="order-id">
                <div><i class="fas fa-archive" style="font-size:80px;"></i></div>
             <span><?php echo $order_id ?></span> 
            </div>


            
           <!--order-details-->
          
            
         

            <div class="order-grand-total">
                <span>Ksh </span> <span style="font-size:20px;font-weight:650"><?php echo $order_grand_total ?></span>
            </div>

          

               <!-- Button trigger modal -->
               <button type="button" class="btn btn-primary view-products-btn" order-id="<?php echo $order_id ?>" data-bs-toggle="modal" data-bs-target="#orderproductsModal">
                more details
                </button>
            </div>

         
            <!--order-details-->

          


            <!--order-->


                <?php

                }


                }else{
                    warnMsg("No cancelled orders");
                }
               

                ?>

             

            </div>

            
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="orderproductsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">

   <div class="fetch_order_products"></div>

  </div>
</div>


<script>
    $(".view-products-btn").click(function(data){
      let order_id =  $(this).attr('order-id');

      $.post("php/fetch_order_items.php",{order_id:order_id},function(data){
        $(".fetch_order_products").html(data);
      })
    })
</script>

<?php

}else{
    header("Location: ?page=home");
}

?>