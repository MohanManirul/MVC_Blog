<div class="searchoption">
	<div class="menu">
		<a href="<?php echo BASE_URL;?>">Home</a>
	</div>
	<div class="search">
		<form  action="<?php echo BASE_URL;?>/Index/search" method="POST">
			<input type="text" name="keyword" placeholder="Search Here..." />
			<select class="catsearch" name="cat">
				<option>Category One</option>
				<?php 
					foreach ($catlist as $key => $cat) {
					
				?>
				<option value="<?php echo $cat['id'];?>"><?php echo $cat['name'];?></option>
			<?php } ?>
			</select>
			<button type="submit" class="submitbtn" >Search</button>
		</form>
	</div>
</div>