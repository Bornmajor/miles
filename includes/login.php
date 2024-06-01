<?php include('includes/header.php'); ?>
    <title>Miles concepts store | Login</title>
    <meta name="description" content="Miles concepts - Login">
</head>
<body>

<?php  
 //navbar
 include('includes/navbar.php');

 ?>

<?php
if(isset($_GET['request'])){
  $req = $_GET['request'];
  if($req == 'no_wishlist'){
    $msg = 'You are required to login to wishlist your favourite products';
  
  }else if($req == 'no_cart'){
   $msg = 'You are required to login to add a product in your cart ';
  }
  ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <?php echo $msg ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div> 
  <?php
}
?>




<div class="container_form"><!--container_form-->

<form action="" id='form_add_user' method="post">

<div class="mb-3 center">
    <img src="images/miles_logo_1.png" width='80px' alt="">
</div>

<div class="mb-3">
<div class="title_group">
  <h4>Account login</h4>  
</div>
</div>

<div id="feedback"></div>

<div class="form-floating mb-3 prod-name">
  <input type="email" class="form-control" id="floatingInput" name='usr_mail' required>
  <label for="floatingInput">Email address</label>
</div>

<div class="form-floating mb-3 prod-name">
  <input type="password" class="form-control" id="floatingInput" name='pwd' required>
  <label for="floatingInput">Password</label>
</div>

<input style='width:100%;' class='btn btn-primary' type="submit" value="Login account">

<br><br>

<div id="g_id_onload"
     data-client_id="833670213618-bim8sbgcspv5kbropt8j4m0dficf24pk.apps.googleusercontent.com"
     data-context="signin"
     data-ux_mode="popup"
    data-callback=handleCredentialResponse
     data-auto_prompt="false">
</div>

<div class="g_id_signin"
     data-type="standard"
     data-shape="rectangular"
     data-theme="filled_blue"
     data-text="signin_with"
     data-size="large"
     data-logo_alignment="left">
</div>

<script src="https://accounts.google.com/gsi/client" async defer></script>



<div id="g_id_onload"
     data-client_id="833670213618-bim8sbgcspv5kbropt8j4m0dficf24pk.apps.googleusercontent.com"
     data-context="signin"
     data-login_uri="https://milesconcept.000webhostapp.com/?page=login"
     data-itp_support="true">
</div>

</form>


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
     
    $.post('php/google_login.php',{usr_mail:usr_mail},function(data){
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



</div><!--container_form-->
<script>

//   window.onload = function () {
//     google.accounts.id.initialize({
//       client_id: '833670213618-bim8sbgcspv5kbropt8j4m0dficf24pk.apps.googleusercontent.com',
//       callback: handleResponse
//     });
//     google.accounts.id.prompt();
//   };

</script>

<script>


    // $('.login').css("border-bottom","2px solid white");

    $('#form_add_user').submit(function(e){
        e.preventDefault();
        let postData = $(this).serialize();

        $.post('./php/login_user.php',postData,function(data){
            if(!data.error){
                $('#feedback').html(data);
            }

        })

        

    })

</script>
