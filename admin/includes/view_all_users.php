                <table class="table table-bordered table-hover">
                	<thead> 
                		<tr>
                			<th>Id</th>
                			<th>Username</th>
                			<th>FirstName</th>
                			<th>LastName</th>
                			<th>Email</th>
                			<th>Role</th>
                            <th>Admin</th>
                            <th>Subscriber</th>
                            <th>Edit</th>
                            <th>Delete</th>
                			
                		</tr>
                	</thead>
                	<tbody>

                		<?php 

                			$query = "SELECT * FROM users";
                            $selectAllUsers = mysqli_query($connection,$query); 

                            while ($row = mysqli_fetch_assoc($selectAllUsers)) {

                                    $user_id = $row['user_id'];
                                    $user_name = $row['user_name'];
                                    $user_firstname = $row['user_firstname'];
                                    $user_lastname = $row['user_lastname'];
                                    $user_email = $row['user_email'];
                                    $user_password = $row['user_password'];
                                    $user_image = $row['user_image'];
                                    $user_role = $row['user_role'];
                                    

                                    echo "<tr>";
                                        echo "<td>{$user_id}</td>";
                                        echo "<td>{$user_name}</td>";
                                        echo "<td>{$user_firstname}</td>";
                                        echo "<td>{$user_lastname}</td>";
                                        echo "<td>{$user_email}</td>";
                                        echo "<td>$user_role</td>";
                                        echo "<td> <a href = 'user.php?change_to_admin=$user_id'>Admin.</a></td>";
                                        echo "<td> <a href = 'user.php?change_to_sub=$user_id'>Subscriber.</a></td>";
                                        echo "<td> <a href = 'users.php?source=edit_user&edit_user=$user_id'>Edit</a></td>";
                                        echo "<td> <a href = 'users.php?delete=$user_id'>Delete</a></td>";

                                    echo "</tr>";

                                        /*
                                        $selectQueryFromCategory = "SELECT * FROM categories where id = {$post_category_id}";

                                        $selectQueryFromCategoryResult = mysqli_query($connection,$selectQueryFromCategory);

                                        while ($row = mysqli_fetch_assoc($selectQueryFromCategoryResult)) {

                                            $cat_id = $row['id'];
                                            $cat_title = $row['cat_title'];

                                            
                                            echo "<td>{$cat_title}</td>";
                                            # code...
                                        } */

                                        /*
                                    $commentTitleQuery = "SELECT * from posts where posts_id = $comment_post_id";
                                        $selectPostIDQuery = mysqli_query($connection,$commentTitleQuery);

                                        while ($row = mysqli_fetch_assoc($selectPostIDQuery)) {
                                            $postId = row['posts_id'];
                                            $postTitle = row['post_title'];
                                            
                                            # code...
                                        }

                                        */
                                    
                                } 
                		?>
                	
                </tbody>
                </table>


                <?php 

                    if (isset($_GET['change_to_admin'])) {
                                        $change_to_admin = $_GET['change_to_admin'];

                                    $adminQuery = "UPDATE users set  user_role = 'Admin' where user_id = $change_to_admin";

                                        $approveResult = mysqli_query($connection,$adminQuery);
                                        header("Location: users.php");
                                      }


                    if (isset($_GET['change_to_sub'])) {
                                        $change_to_sub = $_GET['change_to_sub'];

                                        $approveQuery = "UPDATE users set  user_role = 'subscriber' where user_id = $change_to_sub ";

                                        $unapproveResult = mysqli_query($connection,$approveQuery);
                                        header("Location: users.php");
                                      }




                    if (isset($_GET['delete'])) {
                                        $deleteUserId = $_GET['delete'];

                                        $deleteQuery = "DELETE FROM users WHERE user_id = {$deleteUserId}";

                                        $deleteResult = mysqli_query($connection,$deleteQuery);
                                        header("Location: users.php");
                                      }

                ?>