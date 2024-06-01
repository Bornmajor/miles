<?php 
include('functions.php');


if(isset($_SESSION['ml_usr_id'])){
$usr_id =  $_SESSION['ml_usr_id'];       

if(isset($_POST['county'])){
$county = $_POST['county'];    
$sub_county = $_POST['sub_county'];
$ward = $_POST['ward'];
$street = $_POST['street'];
$home_address = $_POST['home_address'];
$extra_info  = $_POST['extra_info'];



$county = escapeString($county);
$sub_county = escapeString($sub_county);
$ward = escapeString($ward);
$street = escapeString($street);
$home_address = escapeString($home_address);
$extra_info = escapeString($extra_info);





$query = "INSERT INTO locations(usr_id,county,sub_county,ward,street,home_address,extra_info)VALUES('$usr_id','$county','$sub_county','$ward','$street','$home_address','$extra_info')";
$insert_location = mysqli_query($connection,$query);
checkQuery($insert_location);
if($insert_location){
    successMsg("Address created");
}

if(!$insert_location){
 failMsg('Something went wrong!Try again later');  
}
}else{
    failMsg("County and sub-county field are required");
} 
}    





?>