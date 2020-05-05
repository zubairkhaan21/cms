<?php
    if (isset($_POST['checkBoxesArray'])) {
        foreach ($_POST['checkBoxesArray'] as $checkBoxValue) {
            $bulk_options = $_POST['bulk_options'];

            switch ($bulk_options) {
                case 'Published':
                    $query = "UPDATE posts set post_status = $bulk_options where post_id = $checkBoxValue";
                    $result = mysqli_query($connection,$query);
                    break;
                case 'delete()':
                    # code...
                break;

                case 'draft':
                    # code...
                    break;
                
                default:
                    # code...
                    break;
            }
        }
          
      }  
?>





<form action="" method="post">

                <table class="table table-bordered table-hover">


                    <div id="bulkOptionsContainer" class="col-xs-4">
                        <select class="form-control" name="bulk_options">
                            <option value="">Select Option</option>
                            <option value="published">Publish Post</option>
                            <option value="draft">Draft</option>
                            <option value="delete">Delete</option>
                        </select>
                    </div>
                    <div id="" class="col-xs-4">
                        
                        <input type="submit" name="submit" class="btn btn-success" value="Apply">
                        <a href="ad_post.php" class="btn btn-primary">Add New Post</a>
                    </div>
                	<thead> 
                		<tr>
                            <th><input type="checkbox" name="" class="checkBoxes" id="selectAllBoxes"></th>
                			<th>Id</th>
                			<th>Author</th>
                			<th>Title</th>
                			<th>Category</th>
                			<th>Status</th>
                			<th>Image</th>
                			<th>Tags</th>
                			<th>Comments</th>
                			<th>Date</th>
                		</tr>
                	</thead>
                	<tbody>

                		<?php 

                			$query = "SELECT * FROM posts";
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

                                    echo "<tr>";

                                    ?>
                                    <td><input type='checkbox' name='checkBoxesArray[]' class='checkBoxes' 
                                        value='<?php echo $post_id; ?>'></td>
                                    <?php

                                        
                                        echo "<td>{$post_id}</td>";
                                        echo "<td>{$post_author}</td>";
                                        echo "<td>{$post_title}</td>";


                                        $selectQueryFromCategory = "SELECT * FROM categories where id = {$post_category_id}";

                                        $selectQueryFromCategoryResult = mysqli_query($connection,$selectQueryFromCategory);

                                        while ($row = mysqli_fetch_assoc($selectQueryFromCategoryResult)) {

                                            $cat_id = $row['id'];
                                            $cat_title = $row['cat_title'];

                                            
                                            echo "<td>{$cat_title}</td>";
                                            # code...
                                        }





                                        
                                        echo "<td>{$post_status}</td>";
                                        echo "<td><img width='100' class='img-responsive' src='../images/$post_image'></td>";
                                        echo "<td>{$post_tags}</td>";
                                        echo "<td>{$post_comment_count}</td>";
                                        echo "<td>{$post_date}</td>";
                                        echo "<td> <a href = 'posts.php?source=edit_posts&p_id=$post_id'>Edit</a></td>";
                                        echo "<td> <a href = 'posts.php?delete=$post_id'>Delete</a></td>";

                                        

                                    echo "</tr>";
                                } 
                		?>
                	
                </tbody>
                </table>

                </form>


                <?php  

                    if (isset($_GET['delete'])) {
                                        $deleteCatId = $_GET['delete'];

                                        $deleteQuery = "DELETE FROM posts WHERE posts_id = {$deleteCatId}";

                                        $deleteResult = mysqli_query($connection,$deleteQuery);
                                        header("Location: posts.php");
                                      }

                ?>