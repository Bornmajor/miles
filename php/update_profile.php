<?php
include('functions.php');

$username = $_POST['username'];
$official_names = $_POST['official_names'];
$phone_number = $_POST['phone_number'];
$usr_loc = $_POST['usr_loc'];


$usr_id = $_SESSION['ml_usr_id'];
$username = escapeString($username);

$query = "UPDATE miles_users SET username = '$username', official_names = '$official_names', phone_number = '$phone_number' , usr_loc = '$usr_loc' WHERE usr_id = '$usr_id'";
$update_user = mysqli_query($connection,$query);
checkQuery($update_user);


if($update_user){
 successMsg('Profile updated');
}

?>