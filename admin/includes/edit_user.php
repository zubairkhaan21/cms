    <?php include 'includes/admin_header.php'?>

<?php

	if (isset($_GET['edit_user'])) {
		echo $the_edit_user_id =$_GET['edit_user'];


		$query = "SELECT * FROM users where user_id = $the_edit_user_id";
                            $selectEditUsers = mysqli_query($connection,$query); 

                            while ($row = mysqli_fetch_assoc($selectEditUsers)) {
                                    $the_user_name = $row['user_name'];
                                    $the_user_firstname = $row['user_firstname'];
                                    $the_user_lastname = $row['user_lastname'];
                                    $the_user_email = $row['user_email'];
                                    $the_user_password = $row['user_password'];
                                    //$user_image = $row['user_image'];
                                    $the_user_role = $row['user_role'];
                                }
	}



	if (isset($_POST['edit_user'])) {

        $user_name = $_POST['user_name'];
        $user_password = $_POST['user_password'];
        $user_firstName = $_POST['user_firstName'];
        $user_lastName = $_POST['user_lastName'];
        $user_email = $_POST['user_email'];
        $user_role = $_POST['user_role']; 
		
		//$post_image = $_FILES['image']['name'];
		//$post_image_temp = $_FILES['image']['tmp_name'];
		//move_uploaded_file($post_image_temp, "../images/$post_image");

		$querySelectRandSalt = "SELECT randSalt from users";
        $queryResultSelectRandSalt = mysqli_query($connection,$querySelectRandSalt);

        if (!$queryResultSelectRandSalt) {
            die("QUERY FAILED");
            # code...
        }
        $randSaltResult = mysqli_fetch_array($queryResultSelectRandSalt);
        $salt = $randSaltResult['randSalt'];
        $cryptedPassword = crypt($user_password,$salt);




		$query = "UPDATE `users` SET `user_name` = '$user_name', `user_password` = '$cryptedPassword', `firstname` = '$user_firstName', `user_lastname` = '$user_lastName', `user_email` = '$user_email', `user_image` = 'NUlll', `user_role` = '$user_role', `randSalt` = 'Defaultt' WHERE `users`.`user_id` = $the_edit_user_id";

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
		<input type="text" value="<?php echo $the_user_firstname;?>" name="user_firstName" class="form-control">
	</div>
	<div class="form-group">
		<label for="user_lastName" >User Last Name</label>
		<input type="text" value="<?php echo $the_user_lastname;?>" name="user_lastName" class="form-control">
	</div>
	<div class="form-group">
		<select name="user_role" id="">

			<option value="subscriber"<?php echo $the_user_role;?> </option>

			<?php
			if ($the_user_role == 'admin') {
				echo "<option value='subscriber'>subscriber</option>";
				# code...
			}else {
				echo "<option value='admin'>admin</option>";
			}


			?>
		</select>
	</div>
	<div class="form-group">
		<label for="user_name" >User Name</label>
		<input type="text" value="<?php echo $the_user_name;?>" name="user_name" class="form-control">
	</div>
	<div class="form-group">
		<label for="user_email" >User Email</label>
		<input type="email" value="<?php echo $the_user_email	;?>" name="user_email" class="form-control">
	</div>	
	<div class="form-group">
		<label for="user_password" >User Password</label>
		<input type="password" name="user_password" class="form-control">
	</div>
	<div class="form-group">
		<input type="submit" name="edit_user" value="Edit User" class="btn btn-primary">
	</div>
</form>