<?php
include("functions.php");


?>


<table class="table table-striped">
<tr>
     <th>#</th>
    <th>Username</th>
    <th>Email</th>
    <th>Role</th>
    <th>Set admin</th>
    <th>Delete</th>
</tr>

<?php

$query = "SELECT * FROM miles_users";
$select_users = mysqli_query($connection,$query);
checkQuery($select_users);
while($row= mysqli_fetch_assoc($select_users)){

$usr_id =  $row['usr_id'];
$username = $row['username'];
$usr_mail = $row['usr_mail'];
$usr_role = $row['usr_role'];

?>
<tr>
    <td><?php echo $usr_id ?></td>
    <td><?php echo $username ?></td>
    <td><?php echo $usr_mail ?></td>
    <td><?php echo $usr_role ?></td>
    <td>
        <?php
        if($usr_role == 'subscriber'){
        ?>
        <div class="form-check form-switch">
        <input class="form-check-input subscriber" type="checkbox" role="switch"  user-id='<?php echo $usr_id  ?>'>
        </div>

        <?php
        }else if($usr_role == 'admin'){
        ?>
         <div class="form-check form-switch">
        <input class="form-check-input admin" type="checkbox" role="switch"  user-id='<?php echo $usr_id  ?>' checked>
        </div>
        <?php
        }

        ?>

    
       
    
    </td>
    <!-- <td><a  class='icon_link edit_usr'  href="#" user-id='<?php echo $usr_id  ?>' ><i class="fas fa-pen"></i> </a></td> -->
    <td><a  class='icon_link del_usr' href="#" user-id='<?php echo $usr_id  ?>'><i class="fas fa-trash"></i> </a></td>
</tr>

<?php
}

?>


</table>
<?php
$no_rows = mysqli_num_rows($select_users);
if($no_rows === 0){
    echo "<div class='no_row_data'>Empty table</div>";
}
?>



<script>
    $('.edit_usr').click(function(data){
       let user_id  =  $(this).attr('user-id');
        $.post('../php/edit_form_role.php',{user_id:user_id},function(data){

            displayUsers();
        })
        
    })

    $('.del_usr').click(function(data){
        let user_id  =  $(this).attr('user-id');

        $.post('../php/delete_usr.php',{user_id:user_id},function(data){

        displayUsers();
        })
        
    })

    //set admin
    $('.subscriber').click(function(){

    if($(this).is(':checked')){
        
        let user_id = $(this).attr('user-id');
        let role = 'admin';

        $.post('../php/set_admin.php',{user_id:user_id,role:role},function(data){

         $('.feedback_role').html(data);
            displayUsers();
        })
    
      } 
    })

    //set subscriber
    $('.admin').click(function(){

if(!$(this).is(':checked')){
   
    let user_id = $(this).attr('user-id');
    let role = 'subscriber';

    $.post('../php/set_admin.php',{user_id:user_id,role:role},function(data){
        $('.feedback_role').html(data);
        displayUsers();
    })

  } 
})

</script>