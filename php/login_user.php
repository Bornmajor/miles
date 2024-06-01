<?php   
include("functions.php");

$usr_mail = $_POST['usr_mail'];
$pwd = $_POST['pwd'];

$usr_mail = escapeString($usr_mail);
$pwd = escapeString($pwd);


$query = "SELECT * FROM miles_users WHERE usr_mail = '$usr_mail'";
$select_usr = mysqli_query($connection,$query);

checkQuery($select_usr);
while($row = mysqli_fetch_assoc($select_usr)){
    $db_mail = $row['usr_mail'];
    $db_pwd = $row['pwd'];
    $db_usr_id = $row['usr_id'];
}

if(isset($db_mail)){
    if(password_verify($pwd,$db_pwd)){
        getUsrSession($db_usr_id);
        successMsg("Login successfully!!Redirecting");

          //redirecting
    echo "<script type='text/javascript'>
    window.setTimeout(function() {
        window.location = '?page=home';
    }, 2000);
    </script>";

   
    

    }else{
        failMsg('Password incorrect!!');
    }

}else{
    failMsg('Email user does not exist');
}
?>