	
	<h2>Add New category</h2>


	<?php
		if(isset($msg)){
		echo "<span style='color: blue;font-weight: bold;'>".$msg."</span>";

	}
	?>
	<form action="<?php echo BASE_URL;?>/Admin/insertCategory" method="POST">
		<table class="">
			<tr>
				<td>Category Name</td>
				<td><input type="text" name="name" required="1" /></td>
			</tr>

			<tr>
				<td>Category Title</td>
				<td><input type="text" name="title"  required="1" /></td>
			</tr>
			<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Save" /></td>
		</tr>
		</table>
		
	</form>

