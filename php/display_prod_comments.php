<?php
include('functions.php');

?>
<?php
$prod_id = $_POST['prod_id'];

$prod_id = escapeString($prod_id);

$query = "SELECT * FROM reviews WHERE prod_id = '$prod_id' ORDER BY review_id DESC";
$select_reviews = mysqli_query($connection,$query);

checkQuery($select_reviews);
while($row = mysqli_fetch_assoc($select_reviews)){
$review = $row['review_desc'];
$usr_id = $row['usr_id'];

?>

<div class="item_other_comment"><!--item_other_comment--->

<div class="other_usr_profile"><!--current_usr_profile-->
<span><i class="fas fa-user-circle fa-lg"></i></span>
</div><!--current_usr_profile-->

<div class="oth_comment_item"><!--oth_comment_item-->
<span style='font-size:14px;color:gray;'><?php echo displayUsername($usr_id);  ?></span> 

<div style='margin-top:10px;'><?php echo $review ?></div>

</div><!--oth_comment_item-->

</div><!--item_other_comment--->

<?php
}
echo emptyTableRowMsg($select_reviews,'No reviews');
?>