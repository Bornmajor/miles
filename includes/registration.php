<?php include('includes/header.php'); ?>
    <title>Miles concepts store | Registration</title>
    <meta name="description" content="Miles concepts - Registration">
</head>
<body>

<?php  
 //navbar
 include('includes/navbar.php');

 ?>

<div class="container_form"><!--container_form-->

<form action="" id='form_add_user' method="post">


<div class="mb-3 center">
    <img src="images/miles_logo_1.png" width='80px' alt="">
</div>



<div class="mb-3">
<div class="title_group">
  <h5>Account registration</h5>  
</div>
</div>

<div id="feedback"></div>


<div class="form-floating mb-3 prod-name">
  <input type="email" class="form-control" id="usr_mail" name='usr_mail' required>
  <label for="floatingInput">Email address</label>
</div>

<div class="mb-3 msg"></div>

<div class="form-floating mb-3 prod-name">
  <input type="password" class="form-control" id="psw" name='pwd' onkeyup='checkPsw()' required>
  <label for="floatingInput">Password</label>
</div>

<input style='width:100%;' class='btn btn-primary' type="submit" id='submit' value="Create account">

<br><br>


<div id="g_id_onload"
     data-client_id="833670213618-bim8sbgcspv5kbropt8j4m0dficf24pk.apps.googleusercontent.com"
     data-context="signup"
     data-ux_mode="popup"
     data-callback=handleCredentialResponse
     data-auto_prompt="false">
</div>

<div class="g_id_signin"
     data-type="standard"
     data-shape="rectangular"
     data-theme="outline"
     data-text="signup_with"
     data-size="large"
     data-logo_alignment="left">
</div>



<script src="https://accounts.google.com/gsi/client" async defer></script>


<!-- 
<div id="g_id_onload"
     data-client_id="833670213618-bim8sbgcspv5kbropt8j4m0dficf24pk.apps.googleusercontent.com"
     data-context="signin"
     data-login_uri="https://milesconcept.000webhostapp.com/?page=login"
     data-itp_support="true">
</div> -->



</form>

</div><!--container_form-->
<script src="https://accounts.google.com/gsi/client" async defer></script>
<script>
  window.onload = function () {
    google.accounts.id.initialize({
      client_id: '833670213618-bim8sbgcspv5kbropt8j4m0dficf24pk.apps.googleusercontent.com',
      callback: handleCredentialResponse
    });
    google.accounts.id.prompt();
  };
   function handleCredentialResponse(response) {
     // decodeJwtResponse() is a custom function defined by you
     // to decode the credential response.
     const responsePayload = parseJwt(response.credential);
     let usr_mail = responsePayload.email;
     
     
    $.post('php/google_signup.php',{usr_mail:usr_mail},function(data){
        $('#feedback').html(data);
        
    });
    //  console.log("ID: " + responsePayload.sub);
    //  console.log('Full Name: ' + responsePayload.name);
    //  console.log('Given Name: ' + responsePayload.given_name);
    //  console.log('Family Name: ' + responsePayload.family_name);
    //  console.log("Image URL: " + responsePayload.picture);
    //  console.log("Email: " + responsePayload.email);
  }
function parseJwt (token) {
    var base64Url = token.split('.')[1];
    var base64 = base64Url.replace(/-/g, '+').replace(/_/g, '/');
    var jsonPayload = decodeURIComponent(window.atob(base64).split('').map(function(c) {
        return '%' + ('00' + c.charCodeAt(0).toString(16)).slice(-2);
    }).join(''));

    return JSON.parse(jsonPayload);
}
</script>

<script>
    // $('.register').css("border-bottom","2px solid white");

    function checkPsw(){

    let psw =  $('#psw').val();
    let letterReg =  /[a-z]/;
    let numberReg = /[0-9]/g; 
    let msg;

    if(psw.match(letterReg) && psw.match(numberReg)){
    //ok 
    msg = "";
    $('.msg').html(msg);
  

    }else{
    msg = "Password should include atleast a letter and number!!";
    $('.msg').html(msg);
    }

    
    }

  


    $('#form_add_user').submit(function(e){
        e.preventDefault();

        let usr_mail = $('#usr_mail').val();
        let postData = $(this).serialize();
        
        $.post("./php/add_user.php",postData,function(data){
            if(!data.error){
                $('#feedback').html(data);
            }

            

        })
 
    })
</script>