<div class='container'><!--container-->

<div class="feedback_role"></div>


<h3 class="h3 mb-0 text-gray-800">
User account
</h3>
<br>

<div class="table-responsive view_table"><!--table-responsive-->
<div class="loader"></div>

</div><!--table-responsive-->

</div><!--container-->

<script>
function displayUsers(){
    $.ajax({
        url: "../php/display_users.php",
        type: "POST",
        success: function(show_usr){
            if(!show_usr.error){
                $('.view_table').html(show_usr);

            }

        }
    })
}
setTimeout(function(){
    displayUsers();

        },2000);

</script>