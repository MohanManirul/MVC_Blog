

<h2>Update Article</h2>
	<?php 
		foreach ($postbyid as $key => $value) {
	?>
<form action="<?php echo BASE_URL;?>/Admin/updatePost/<?php echo $value['id'];?>" method="POST">
		<table class="">
			<tr>
				<td>Title</td>
				<td><input type="text" name="title" value="<?php echo $value['title'];?>" /></td>
			</tr>

			<tr>
				<td>Content</td>
				<td><textarea class="tinymce" name="content" value = "<?php echo $value['content'];?>"></textarea></td>
			</tr> 
			<tr>
				<td>Category</td>
				<td>
					<select name="cat" class="cat">
						<option>Select One</option>
						<?php
							foreach ($catlist as $key => $cate) {
								
						?>
						<option 
							<?php 
								if ($value['cat'] == $cate['id']) { ?>
									selected = "selected"
								<?php } ?>
							value="<?php echo $cate['id'];?>"><?php echo $cate['name'];?>
							
						</option>
					<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Update Article" /></td>
		</tr>
		</table>
		
	</form>
<?php } ?>

	<style type="text/css">
		input[type="text"]{border:1px solid #ddd;margin-bottom:5px;padding:5px;width:350px;font-size:16px}
		.cat {border:1px solid #ddd;margin-bottom:5px;padding:5px;width:300px;font-size:16px;cursor: pointer;}
	</style>
