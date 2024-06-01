

<!-- Modal -->
<div class="modal fade" id="profile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Profile</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style='background-color:white;'></button>
      </div>
      <?php
      $ml_usr_id = $_SESSION['ml_usr_id'];
      $query = "SELECT * FROM miles_users WHERE usr_id = '$ml_usr_id'";
      $select_usr = mysqli_query($connection,$query);
      checkQuery($select_usr);
      while($row = mysqli_fetch_assoc($select_usr)){
       $username = $row['username'];
       $official_names = $row['official_names'];
       $usr_loc = $row['usr_loc'];
       $phone_number = $row['phone_number'];
    
      }
      ?>
      <div class="modal-body">

        <form action="" method="post" id='update_usr_profile_form' autocomplete='off'>

           <div class="profile_feedback"></div>

        <div class="form-floating mb-3">
        <input type="text" name='username' class="form-control" id="floatingInput"  value='<?php echo $username ?>' required>
        <label for="floatingInput">Username</label>
        </div>

        <div class="form-floating mb-3">
        <input type="text" name='official_names' class="form-control" id="floatingInput"  value='<?php if(isset($official_names)){ echo $official_names; } ?>'>
        <label for="floatingInput">Official names</label>
        </div>


        <div class="form-floating mb-3">
        <input type="text" name='phone_number' class="form-control" id="floatingInput"  value='<?php if(isset($phone_number)){ echo $phone_number; }  ?>'>
        <label for="floatingInput">Phone number</label>
        </div>

        <!-- <div class="form-floating mb-3">
        <input type="text" name='usr_loc' class="form-control" id="floatingInput"  value='<?php if(isset($usr_loc)){ echo $usr_loc; }  ?>' >
        <label for="floatingInput">User location</label>
        </div> -->
       
        <a href="?page=delivery_location" class="btn btn-primary">Edit  addresss loction</a>
    
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Update profile</button>
      </div>

      </form>

    </div>
  </div>
</div>

<script>
    $('#update_usr_profile_form').submit(function(e){
     e.preventDefault();
     let postData = $(this).serialize();

     $.post('php/update_profile.php',postData,function(data){
      $('.profile_feedback').html(data);
     })

    })

  


   
</script> 

