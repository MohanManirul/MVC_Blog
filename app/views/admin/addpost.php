

<h2>Add New Article</h2>
<?php
	if (isset($postErrors)) {
		echo '<div style = "color:red;border:1px solid red;padding:5px 10px;margin : 5px;">';

		foreach ($postErrors as $key => $value) {
			switch ($key) {
				case 'title':
					foreach ($value as $val ) {
						echo "Title : ".$val."<br/>";
					}
					break;

					case 'content':
						foreach ($value as $val ) {
							echo "Content : ".$val."<br/>";
						}
					break;

					case 'cat':
						foreach ($value as $val ) {
								echo "Category : ".$val."<br/>";
							}
					break;
				
				default:
					
					break;
			}
		}
		echo '</div>';



	}
?>
<form action="<?php echo BASE_URL;?>/Admin/addNewPost" method="POST">
		<table class="">
			<tr>
				<td>Title</td>
				<td><input type="text" name="title" /></td>
			</tr>

			<tr>
				<td>Content</td>
				<td><textarea class="tinymce" name="content" ></textarea></td>
			</tr> 
			<tr>
				<td>Category</td>
				<td>
					<select name="cat" class="cat">
						<option>Select One</option>
						<?php
							foreach ($catlist as $key => $cate) {
							
						?>
						<option value="<?php echo $cate['id'];?>"><?php echo $cate['name'];?></option>
					<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Create Article" /></td>
		</tr>
		</table>
		
	</form>

	<style type="text/css">
		input[type="text"]{border:1px solid #ddd;margin-bottom:5px;padding:5px;width:350px;font-size:16px}
		.cat {border:1px solid #ddd;margin-bottom:5px;padding:5px;width:300px;font-size:16px;cursor: pointer;}
	</style>
