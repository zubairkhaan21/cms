    <?php include 'includes/admin_header.php'?>

<?php  
	if (isset($_POST['create_post'])) {

        
        $post_title = $_POST['title'];
        $post_author = $_POST['post_author'];
        $post_date = date('d-m-y');
		$post_content = $_POST['post_content'];
		$post_category_id =$_POST['post_category'];

		//$post_image = $_FILES['image']['name'];
		//$post_image_temp = $_FILES['image']['tmp_name'];



        $post_tags = $_POST['post_tags'];
		$post_status = $_POST['post_status'];
		$post_comment_count = 4;

		//move_uploaded_file($post_image_temp, "../images/$post_image");


		$query = "INSERT INTO `posts` (`post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`)


		 VALUES ('$post_category_id', '$post_title', '&post_author', '$post_date', 'now()', '$post_content', '$post_tags', 'default', '$post_status','0')";

		 $result = mysqli_query($connection,$query);

		 confirm($result);
		
	}


?>

<form action="" method="post" enctype="multipart/form/data">
	
	<div class="form-group">
		<label for="title" >Post Title </label>
		<input type="text" name="title" class="form-control">
		
	</div>

	<div class="form-group">
		<select name="post_category" id="">
			<?php

			$query = "SELECT * from categories";
			$result = mysqli_query($connection,$query);

			while ($row = mysqli_fetch_assoc($result)){
				$cat_id = $row['cat_id'];
				$cat_title = $row['cat_title'];

				echo "<option value = '$cat_id'>{$cat_title}</option> ";
			} 


			?>
		</select>

	</div>

	<div class="form-group">
		<label for="post_author" >Post Author </label>
		<input type="text" name="post_author" class="form-control">
		
	</div>

	<div class="form-group">
		<label for="post_status" >Post Status </label>
		<input type="text" name="post_status" class="form-control">
		
	</div>

	<div class="form-group">
		<label for="post_image" >Post Image </label>
		<input type="file" name="image">
		
	</div>

	<div class="form-group">
		<label for="post_tags" >Post Tags </label>
		<input type="text" name="post_tags" class="form-control">
		
	</div>

	<div class="form-group">
		<label for="post_content" >Post Content </label>
		<textarea type="text" name="post_content" class="form-control" id="body" rows="10" cols="30"> </textarea>
		
	</div>

	<div class="form-group">
		<label for="post_content" >Post Content </label>
		<input type="submit" name="create_post" class="btn btn-primary" value="Publish Post"> 
		
	</div>	





</form>