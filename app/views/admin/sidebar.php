
<aside class="adminleft">
	<div class="widget">
		<h3>Site Option</h3>
		<ul>
			<li><a href="<?php echo BASE_URL ;?>/Admin">Home</a></li>
			<li><a href="<?php echo BASE_URL ;?>/Login/logout">LogOut</a></li>
		</ul>
	</div>
<?php 
	if (Session::get('level') != 2 && Session::get('level') != 3 ) {?>
	<div class="widget">
		<h3>Manage User</h3>
		<ul>
			<li><a href="<?php echo BASE_URL ;?>/User/makeUser">Creat User</a></li>
			<li><a href="<?php echo BASE_URL ;?>/User/userlist">User List</a></li>
		</ul>
	</div>
<?php } ?>
<?php 
	if (Session::get('level') != 3) {?>
	<div class="widget">
		<h3>Category Option</h3>
		<ul>
			<li><a href="<?php echo BASE_URL ;?>/Admin/addCategory">Add Category</a></li>
			<li><a href="<?php echo BASE_URL ;?>/Admin/categoryList">Category List</a></li>
		</ul>
	</div>
<?php } ?>
	<div class="widget">
		<h3>Post Option</h3>
		<ul>
			<li><a href="<?php echo BASE_URL ;?>/Admin/addArticle">Add Article</a></li>
			<li><a href="<?php echo BASE_URL ;?>/Admin/articleList">Article List</a></li>
		</ul>
	</div>
</aside>
<article class="adminright">