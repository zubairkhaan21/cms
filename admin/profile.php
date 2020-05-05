<?php include 'includes/admin_header.php'?>
<?php

if(isset($_SESSION['user_name']))
{
    $session_username = $_SESSION['user_name'];
    echo $session_username;

    $query = "SELECT * FROM users WHERE user_name = '$session_username'";
    $edit_user_profile = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($edit_user_profile))
    {
        $user_id            = $row['user_id'];
        $username           = $row['username'];
        $password           = $row['password'];
        $user_firstname     = $row['user_firstname'];
        $user_lastname      = $row['user_lastname'];
        $user_email         = $row['user_email'];
        $user_image         = $row['user_image'];
        $user_role          = $row['user_role'];
    }
}

?>

<?php

    if(isset($_POST['update_user']))
    {
       $username        = mysqli_real_escape_string($connection, trim($_POST['username']));
       $password        = mysqli_real_escape_string($connection, trim($_POST['password']));
       $user_firstname  = mysqli_real_escape_string($connection, trim($_POST['user_firstname']));
       $user_lastname   = mysqli_real_escape_string($connection, trim($_POST['user_lastname']));
       $user_email      = mysqli_real_escape_string($connection, trim($_POST['user_email']));
       $user_role       = mysqli_real_escape_string($connection, trim($_POST['user_role']));

    }
    $update_user_profile_query = "UPDATE `users` SET `user_name` = '$username', `user_password` = '$password', `user_firstname` = '$user_firstname', `user_lastname` = '$user_lastname', `user_email` = '$email', `user_image` = 'Nulll', `user_role` = '$user_role', `randSalt` = 'nuull' WHERE `users`.`user_name` = '$session_username'";

    $result = mysqli_query($connection, $update_user_profile_query);


?>

<?php include 'includes/admin_navigation.php'?>

<div id="wrapper">

        <!-- Navigation -->
        

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin
                            
                            <small><?php echo $_SESSION['user_name']; ?></small>
                        </h1>

                        <form action="" method="post" enctype="multipart/form-data">
    
                            <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" value="<?php echo $username; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" value="<?php echo $password; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="user_firstname">Firstname</label>
                                <input type="text" name="user_firstname" value="<?php echo $user_firstname; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="user_lastname">Lastname</label>
                                <input type="text" name="user_lastname" value="<?php echo $user_lastname; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="user_email">Email</label>
                                <input type="email" name="user_email" value="<?php echo $user_email; ?>" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="user_image">Image</label>
                                <img class="img-responsive" width="200" src="../images/<?php echo $user_image; ?>" alt="">
                                <input type="file" name="user_image" class="form-control">
                            </div>


                            <div class="form-group">
                                <select name="user_role" class="form-control">
                                    <option value="Subscriber"><?php echo $user_role?></option>
                                
                                <?php
                                
                                    if($user_role == "Admin")    
                                    {
                                        echo "<option value='Subscriber'>Subscriber</option>";
                                    }
                                    else
                                    {
                                        echo "<option value='Admin'>Admin</option>";
                                    }
                                
                                ?>
                                
                                    
                                </select>

                            </div>

                            <div class="form-group">
                                <input type="submit" value="Update Profile" name="update_user" class="btn btn-primary">
                            </div>

                        </form>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

<?php include 'includes/admin_footer.php'?>
