<?php
include('functions.php');


$role = $_POST['role'];

if($role == 'admin'){

$user_id = $_POST['user_id'];
$user_id = escapeString($user_id);

$query = "UPDATE miles_users SET usr_role = 'admin' WHERE usr_id = '$user_id'";
$update_admin = mysqli_query($connection,$query);
checkQuery($update_admin);


if($update_admin){
 $username = displayUsername($user_id);
 $msg = ''.$username.' is now an admin';
    successMsg($msg);
}

}

if($role == 'subscriber'){

    $user_id = $_POST['user_id'];
    $user_id = escapeString($user_id);
    
    $query = "UPDATE miles_users SET usr_role = 'subscriber' WHERE usr_id = '$user_id'";
    $update_sub = mysqli_query($connection,$query);
    checkQuery($update_sub);
    
    
    if($update_sub){
     $username = displayUsername($user_id);
     $msg = ''.$username.' is now an subscriber';
     successMsg($msg);
    }
    
    }



?>