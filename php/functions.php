<?php
include('connection.php');


//correcting time
date_default_timezone_set('UTC');

function escapeString($string){
    global  $connection;
   return mysqli_real_escape_string($connection,$string);
 
 }
 
 //success msg
function successMsg($msg){
  echo '
  <div class="alert alert-success alert-dismissible fade show" role="alert">
  '.$msg.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

//fail msg
function failMsg($msg){
  echo '
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  '.$msg.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

//warning msg
function warnMsg($msg){
  echo '
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  '.$msg.'
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
}

function checkQuery($result){
  global $connection;
  if($result){

  }else{
      die("Query failed".mysqli_error($connection));
  
  }  
}

function generate_prod_id($length_of_string){
 
    // String of all alphanumeric character
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';   // Shuffle the $str_result and returns substring
    // of specified length
    return "ML". substr(str_shuffle($str_result),
                       0, $length_of_string);

}

function getCategory(){
 
  $cat = $_GET['category'];
  if(isset($cat)){
    if($cat == 'shoes'){
    echo 'shoes';
  }else if($cat == 'wallets'){
   echo 'wallets';
  }else{
    echo 'others';
  }
  }
  
}
function get_usr_id($length_of_string){
  global $connection;
 
  // String of all alphanumeric character
  $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';   // Shuffle the $str_result and returns substring
  // of specified length
  $gen_usr_id =  "MLU". substr(str_shuffle($str_result),
                     0, $length_of_string);
  $query = "SELECT * FROM miles_users WHERE usr_id = '$gen_usr_id'";
  $select_usr_id = mysqli_query($connection,$query);
  checkQuery($select_usr_id);
  while($row = mysqli_fetch_assoc($select_usr_id)){
  $db_usr_id =  $row['usr_id'];

  }
  if(isset($db_usr_id)){
      // String of all alphanumeric character
  $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';   // Shuffle the $str_result and returns substring
  // of specified length
  $gen_usr_id =  "MLU". substr(str_shuffle($str_result),
                     0, $length_of_string);

  }
  return $gen_usr_id;
}

function generateOrderId(){
    // String of all alphanumeric character
    $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';   // Shuffle the $str_result and returns substring
    // of specified length
    $gen_usr_id =  "ORD". substr(str_shuffle($str_result),
                       0, 10);

     return $gen_usr_id;                  

}

function getNewUsername($string){

  $character = "@";
  
  $position = strpos($string, $character);
  if ($position !== false) {
    $newString = substr($string, 0, $position);
    return $newString; // result: username
  }
  
  }
  function getUsrSession($usr_id){
    $_SESSION['ml_usr_id'] = $usr_id;
  } 

  function displayUsername($usr_id){
    global $connection;
    $query = "SELECT * FROM miles_users WHERE usr_id = '$usr_id'";
    $select_username = mysqli_query($connection,$query);

    checkQuery($select_username);
    while($row = mysqli_fetch_assoc($select_username)){
    $username =  $row['username'];
    }
    return $username;


  }

  function emptyTableRowMsg($query,$msg){
    global $connection;
    
    $total_rows = mysqli_num_rows($query);
    if($total_rows == 0){
        return '<div class="no_row_data">'.$msg.'</div>';
    }


  }

  function getTotalItemsFromQuery($query){
    global $connection;

    $select_item = mysqli_query($connection,$query);
    checkQuery($select_item);
    echo mysqli_num_rows($select_item);

  }

  function wishlistStatus (){
    global $connection, $prod_id;
    if(isset($_SESSION['ml_usr_id'])){
      $usr_id = $_SESSION['ml_usr_id'];
     $query = "SELECT prod_id FROM wishlist WHERE usr_id = '$usr_id' AND prod_id = '$prod_id'"; 
     $check_wishlist =  mysqli_query($connection,$query);
     checkQuery($check_wishlist);
     if(mysqli_num_rows($check_wishlist) == 0){
      ?>
       <span  class='cw wishlist '  prod-id='<?php echo $prod_id ?>' >
        <i   class="far fa-heart fa-lg heart-icon" ></i>
      </span>

      <?php
     }else{
      ?>
      
      <span  class='cw unwishlist' >
      <i   class="fas fa-heart fa-lg" style="color:#5a5c69;" ></i>
      </span>  

       <?php
     }
    }
  }
?>