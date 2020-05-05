    <?php include 'includes/admin_header.php'?>

<?php  
	if (isset($_POST['create_user'])) {

        $user_name = $_POST['user_name'];
        $user_password = $_POST['user_password'];
        $user_firstName = $_POST['user_firstName'];
        $user_lastName = $_POST['user_lastName'];
        $user_email = $_POST['user_email'];
        $user_role = $_POST['user_role']; 
		
		//$post_image = $_FILES['image']['name'];
		//$post_image_temp = $_FILES['image']['tmp_name'];
		//move_uploaded_file($post_image_temp, "../images/$post_image");


		$query = "INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`) VALUES (NULL, '$user_name', '$user_password', '$user_firstName', '$user_lastName', '$user_email', 'NUll', '$user_role', 'Default');";

		 $result = mysqli_query($connection,$query);
		 if (!$result) {
		 	die("Query Failed");
		 	# code...
		 }
		 //confrim($result);
	}
?>
<form action="" method="post" enctype="multipart/form/data">
	<div class="form-group">
		<label for="user_firstName" >User First Name</label>
		<input type="text" name="user_firstName" class="form-control">
	</div>
	<div class="form-group">
		<label for="user_lastName" >User Last Name</label>
		<input type="text" name="user_lastName" class="form-control">
	</div>
	<div class="form-group">
		<select name="user_role" id="">
			<option value="subscriber">Select Options</option>
			<option value="admin">Admin</option>
			<option value="subscriber">subscriber</option>
		</select>
	</div>
	<div class="form-group">
		<label for="user_name" >User Name</label>
		<input type="text" name="user_name" class="form-control">
	</div>
	<div class="form-group">
		<label for="user_email" >User Email</label>
		<input type="email" name="user_email" class="form-control">
	</div>	
	<div class="form-group">
		<label for="user_password" >User Password</label>
		<input type="password" name="user_password" class="form-control">
	</div>
	<div class="form-group">
		<input type="submit" name="create_user" value="Create User" class="btn btn-primary">
	</div>
</form>