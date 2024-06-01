<?php  
include('includes/header.php');
?>

<?php
//check if admin

if(isset($_SESSION['ml_usr_id'])){
    $usr_id = $_SESSION['ml_usr_id'];
  
    $query = "SELECT * FROM miles_users WHERE usr_id = '$usr_id'";
    $select_role = mysqli_query($connection,$query);
    checkQuery($select_role);
    while($row = mysqli_fetch_assoc($select_role)){
    $usr_role =   $row['usr_role'];
  
    }
    if($usr_role !== 'admin'){
      header("Location: ../?page=home");
    
    }
  }else{
    header("Location: ../?page=home");
  }

?>

  <title>Miles - Dashboard</title>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
      <?php
      include('includes/db_sidebar.php');
      ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
               <?php
               include('includes/db_topnav.php');
               ?>
                <!-- End of Topbar -->


                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div> -->

                    <!--dashboard-->


                    <!--dashboard-->

                    <?php
                    if(isset($_GET['page'])){
                        $source = $_GET['page'];
                    
                    
                    
                    }else{
                        $source = '';
                    
                    
                    }
                    switch($source){
                        case 'dashboard';
                        include('components/dashboard.php');
                        break;
                        case 'add_product';
                        include('components/add_product.php');
                        break;
                        case 'view_products';
                        include('components/view_products.php');
                        break;
                        case 'view_users';
                        include('components/view_users.php');
                        break;
                        case 'view_orders';
                        include('components/view_orders.php');
                        break;
                        default:
                        include('components/dashboard.php');
                           
                    }
                    include('components/modal.php');

                    ?>
              
         


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <?php  
             include('includes/db_footer.php');
            ?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->



</body>


</html>