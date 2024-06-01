<?php 
include('functions.php');

$review = $_POST['review_desc'];
$prod_id = $_POST['prod_id'];
$usr_id = $_POST['usr_id'];

$prod_id = escapeString($prod_id);
$review = escapeString($review);
$usr_id = escapeString($usr_id);



if(isset($_SESSION['ml_usr_id'])){

$query = "INSERT INTO reviews(prod_id,usr_id,review_desc)VALUES('$prod_id','$usr_id','$review')";
$insert_review = mysqli_query($connection,$query);

checkQuery($insert_review);

}else{
    failMsg('You need to login to comment on this products');
}


?>