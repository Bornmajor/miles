<?php
include('functions.php');

$user_id = $_POST['user_id'];
$user_id = escapeString($user_id);

$query = "DELETE FROM miles_users WHERE usr_id = '$user_id'";
$del_user = mysqli_query($connection,$query);
checkQuery($del_user);



?>