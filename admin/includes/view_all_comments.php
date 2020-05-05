                <table class="table table-bordered table-hover">
                	<thead> 
                		<tr>
                			<th>Id</th>
                			<th>Author</th>
                			<th>Comment</th>
                			<th>Email</th>
                			<th>Status</th>
                			<th>In Response to</th>
                            <th>Date</th>
                			<th>Approve</th>
                			<th>Un Approve</th>
                			<th>Delete</th>
                		</tr>
                	</thead>
                	<tbody>

                		<?php 

                			$query = "SELECT * FROM comments";
                            $selectAllComments = mysqli_query($connection,$query); 

                            while ($row = mysqli_fetch_assoc($selectAllComments)) {

                                    $comment_id = $row['comment_id'];
                                    $comment_post_id = $row['comment_post_id'];
                                    $comment_author = $row['comment_author'];
                                    $comment_content = $row['comment_content'];
                                    $comment_email = $row['comment_email'];
                                    $comment_status = $row['comment_status'];
                                    $comment_date = $row['comment_date'];
                                    

                                    echo "<tr>";
                                        echo "<td>{$comment_id}</td>";
                                        echo "<td>{$comment_author}</td>";
                                        echo "<td>{$comment_content}</td>";
                                        /*
                                        $selectQueryFromCategory = "SELECT * FROM categories where id = {$post_category_id}";

                                        $selectQueryFromCategoryResult = mysqli_query($connection,$selectQueryFromCategory);

                                        while ($row = mysqli_fetch_assoc($selectQueryFromCategoryResult)) {

                                            $cat_id = $row['id'];
                                            $cat_title = $row['cat_title'];

                                            
                                            echo "<td>{$cat_title}</td>";
                                            # code...
                                        } */
                                        echo "<td>{$comment_email}</td>";
                                        echo "<td>{$comment_status}</td>";
                                        /*
                                    $commentTitleQuery = "SELECT * from posts where posts_id = $comment_post_id";
                                        $selectPostIDQuery = mysqli_query($connection,$commentTitleQuery);

                                        while ($row = mysqli_fetch_assoc($selectPostIDQuery)) {
                                            $postId = row['posts_id'];
                                            $postTitle = row['post_title'];
                                            
                                            # code...
                                        }

                                        */


                                        echo "<td>Some Text</td>";





                                        echo "<td>{$comment_date}</td>";
                                        echo "<td> <a href = 'comments.php?approve=$comment_id'>Approve.</a></td>";
                                        echo "<td> <a href = 'comments.php?unapprove=$comment_id'>UnApprove.</a></td>";
                                        echo "<td> <a href = 'comments.php?delete=$comment_id'>Delete</a></td>";

                                        
                                        

                                    echo "</tr>";
                                } 
                		?>
                	
                </tbody>
                </table>


                <?php 

                    if (isset($_GET['approve'])) {
                                        $approveId = $_GET['approve'];

                                        $approveQuery = "UPDATE comments set  comment_status = 'approve' where comment_id = $approveId ";

                                        $approveResult = mysqli_query($connection,$approveQuery);
                                        header("Location: comments.php");
                                      }


                    if (isset($_GET['unapprove'])) {
                                        $unapproveId = $_GET['unapprove'];

                                        $unapproveQuery = "UPDATE comments set  comment_status = 'unapprove' where comment_id = $unapproveId ";

                                        $unapproveResult = mysqli_query($connection,$unapproveQuery);
                                        header("Location: comments.php");
                                      }




                    if (isset($_GET['delete'])) {
                                        $deleteCatId = $_GET['delete'];

                                        $deleteQuery = "DELETE FROM comments WHERE comment_id = {$deleteCatId}";

                                        $deleteResult = mysqli_query($connection,$deleteQuery);
                                        header("Location: comments.php");
                                      }

                ?>