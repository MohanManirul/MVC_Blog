	
	<h2>Add New User</h2>


	<?php
		if(isset($msg)){
		echo "<span style='color: blue;font-weight: bold;'>".$msg."</span>";

	}
	?>
	<form action="<?php echo BASE_URL;?>/User/addNewUser" method="POST">
		<table class="">
			<tr>
				<td>User Name</td>
				<td><input type="text" name="username" required="1" /></td>
			</tr>

			<tr>
				<td>Password</td>
				<td><input type="password" name="password"  required="1" /></td>
			</tr>
			<tr>
			<td>Select User</td>
			<td>
				<select name="level" class="cat">
					<option>Select User Role</option>
					<option value="2">Author</option>
					<option value="3">Contributor</option>
				</select>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Create User" /></td>
		</tr>
		</table>
		
	</form>

