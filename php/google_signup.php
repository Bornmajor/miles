<?php
include('functions.php');

$usr_mail = $_POST['usr_mail'];
$usr_mail = escapeString($usr_mail);

$query = "SELECT * FROM miles_users WHERE usr_mail = '$usr_mail'";
$select_user = mysqli_query($connection,$query);
checkQuery($select_user);

while($row = mysqli_fetch_assoc($select_user)){
    $db_usr_mail =  $row['usr_mail'];
    $db_usr_id = $row['usr_id'];
 }

 if(isset($db_usr_mail)){
//account already exist
failMsg("Account already exist!!");
failMsg("Redirecting to login!!");

//redirecting
echo "<script type='text/javascript'>
window.setTimeout(function() {
    window.location = '?page=login';
}, 1500);
</script>";

 }else{
//no pwd

//usr_id
$usr_id = get_usr_id(8);     
//get username
$username = getNewUsername($usr_mail);


$query = "INSERT INTO miles_users(usr_id,usr_mail,username,usr_role)VALUES('$usr_id','$usr_mail','$username','subscriber')";
$add_user = mysqli_query($connection,$query);
if($add_user){
//msg success account creation
successMsg("Google signup");
successMsg("Account created!!Redirecting");
//session with browser
getUsrSession($usr_id);
    //redirecting
    echo "<script type='text/javascript'>
    window.setTimeout(function() {
        window.location = '?page=home';
    }, 2000);
    </script>";

}

 }

?>