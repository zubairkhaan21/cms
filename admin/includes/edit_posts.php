<?php 

	if (isset($_GET['p_id'])) {

		$get_post_id = $_GET['p_id']; 
	 	# code...
	 } 

	$query = "SELECT * FROM posts WHERE posts_id = $get_post_id ";
    $selectAllPosts = mysqli_query($connection,$query); 

    while ($row = mysqli_fetch_assoc($selectAllPosts)) {

        $post_id = $row['posts_id'];
        $post_category_id = $row['post_category_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_status = $row['post_status'];	
    }

    if (isset($_POST['create_post'])) {

    	$post_id = $row['posts_id'];
        $post_category_id = $row['post_category_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        //$post_image = $row['post_image'];
        $post_content = $row['post_content'];
        $post_tags = $row['post_tags'];
        $post_comment_count = $row['post_comment_count'];
        $post_status = $row['post_status'];


        $updateQuery = "UPDATE `posts` SET `post_category_id` = $post_category_id, `post_title` = $post_title, `post_author` = $post_author, `post_image` = 'Nulll', `post_content` = $post_content, `post_tags` = $post_tags, `post_comment_count` = '11', `post_status` = 'defaultt', `post_views_count` = '11' WHERE `posts`.`posts_id` = $get_post_id";


        $updateResult = mysqli_query($connection,$updateQuery);
    	
    }

?>





<form action="" method="post" enctype="multipart/form/data">
	
	<div class="form-group">
		<label for="title" >Post Title </label>
		<input value="<?php echo $post_title; ?>" type="text" name="title" class="form-control">
		
	</div>

	<div class="form-group">
		<select name="" id="">
			<?php

			$query = "SELECT * from categories";
			$result = mysqli_query($connection,$query);

			while ($row = mysqli_fetch_assoc($result)){
				$cat_id = $row['cat_id'];
				$cat_title = $row['cat_title'];

				echo "<option value = ''>{$cat_title}</option> ";
			} 


			?>
		</select>

	</div>

	<div class="form-group">
		<label for="post_author" >Post Author </label>
		<input value="<?php echo $post_author; ?>" type="text" name="post_author" class="form-control">
		
	</div>

	<div class="form-group">
		<label for="post_status" >Post Status </label>
		<input value="<?php echo $post_status; ?>" type="text" name="post_status" class="form-control">
		
	</div>

	<div class="form-group">
		<label for="post_image" >Post Image </label>
		<input type="file" name="image">
		
	</div>

	<div class="form-group">
		<label for="post_tags" >Post Tags </label>
		<input value="<?php echo $post_tags; ?>" type="text" name="post_tags" class="form-control">
		
	</div>

	<div class="form-group">
		<label for="post_content" >Post Content </label>
		<textarea type="text" name="post_content" class="form-control" rows="10" cols="30">
			<?php echo $post_content; ?>
		</textarea>
		
	</div>

	<div class="form-group">
		<label for="post_content" >Update Post</label>
		<input type="submit" name="create_post" class="btn btn-primary" value="Update Post"> 
		
	</div>	





</form>