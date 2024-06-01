
<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>

<div class="dash_items_container"><!--dash_items-->


<div class="dash_item"><!--item-->

<div class="dsh_header">Total products</div>

<div class="dsh_icon">
<i class="fas fa-shopping-bag"></i>
</div>

<div class="dsh_sumation">
<?php
getTotalItemsFromQuery('SELECT * FROM products');
?>

</div>

</div><!--item-->


<div class="dash_item"><!--item-->

<div class="dsh_header">Total clients</div>

<div class="dsh_icon">
<i class="fas fa-users"></i>
</div>

<div class="dsh_sumation">
<?php
getTotalItemsFromQuery('SELECT * FROM  miles_users');
?>
<a href="?page=view_users" class='dash_item_link'>view more</a>
</div>

</div><!--item-->

<div class="dash_item"><!--item-->

<div class="dsh_header">Total shoes</div>

<div class="dsh_icon">
<i class="fas fa-shoe-prints"></i>
</div>

<div class="dsh_sumation">
<?php
getTotalItemsFromQuery('SELECT * FROM  products WHERE category = "shoes"');
?>
<a href="?page=view_products&category=shoes" class='dash_item_link'>view more</a>
</div>

</div><!--item-->


<div class="dash_item"><!--item-->

<div class="dsh_header">Total wallets</div>

<div class="dsh_icon">
<i class="fas fa-wallet"></i>
</div>

<div class="dsh_sumation">
<?php
getTotalItemsFromQuery('SELECT * FROM  products WHERE category = "wallets"');
?>
<a href="?page=view_products&category=wallets" class='dash_item_link'>view more</a>

</div>

</div><!--item-->







</div><!--dash_items-->
