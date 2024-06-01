<nav class="navbar sticky-top navbar-expand-lg" style="background-color: #5a5c69;" >
<div  class="container-fluid">

<a class="navbar-brand" href="?page=home"><img src="images/miles_logo_3.png"  width="80px" alt="logo"></a>




<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>



<div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
<ul  class="navbar-nav me-5  mb-2 mb-lg-0">

<?php
if(isset($_SESSION['ml_usr_id'])){
  $usr_id = $_SESSION['ml_usr_id'];

  $query = "SELECT * FROM miles_users WHERE usr_id = '$usr_id'";
  $select_role = mysqli_query($connection,$query);
  checkQuery($select_role);
  while($row = mysqli_fetch_assoc($select_role)){
  $usr_role =   $row['usr_role'];

  }
  if($usr_role == 'admin'){
    ?>
<li class="nav-item">
  <a class="nav-link " href="milesDB/">Dashboard</a>
</li>
    <?php
  }
}
?>




<?php
if(isset($_SESSION['ml_usr_id'])){
?>
<li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-expanded="false" >
     <?php  

    echo displayUsername($_SESSION['ml_usr_id']); 

     ?>
      </a>
      <ul class="dropdown-menu">
    
        
        <li><a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#profile"> Profile</a></li>
        <li><a class="dropdown-item" href="?page=track_order"> Orders </a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="?page=logout"> Logout</a></li>
      
      </ul>
</li> 

<?php
}else{
?>




<li class="nav-item">
  <a class="nav-link register" href="?page=registration">Registration</a>
</li>


<li class="nav-item">
  <a class="nav-link login"  href='?page=login'>Login</a>
</li>
<?php
}
?>


<li class="nav-item">
<div  class="container_wishlist_cart lg_ws_cart" > <!--cart like-->
</div><!--cart like--> 
</li>

<li class="nav-item">
  <a class="nav-link  link_cart" href="?page=cart">Cart</a>
</li>

<li class="nav-item">
  <a class="nav-link link_wishlist" href="?page=wishlist">Wishlist</a>
</li>
      
</ul>


    </div>

  </div>
</nav>