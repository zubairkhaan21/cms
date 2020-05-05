    <!-- Header  -->
    <?php include 'includes/header.php'?>
    <?php include 'includes/db.php'?>

    <!-- Navigation -->
    <?php include 'includes/navigation.php'?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">



                <?php

                    if (isset($_GET['p_id'])) {

                        $the_post_id = $_GET['p_id'];
                        # code...
                    }

                        $query = "SELECT * FROM posts where posts_id = $the_post_id";
                        $selectAllPostsQuery = mysqli_query($connection,$query);

                        while ($row = mysqli_fetch_assoc($selectAllPostsQuery)) {

                            $post_title = $row['post_title'];
                            $post_author = $row['post_author'];
                            $post_date = $row['post_date'];
                            $post_image = $row['post_image'];
                            $post_content = $row['post_content'];

                            ?>
                            <h1 class="page-header">
                                Page Heading
                                <small>Secondary Text</small>
                            </h1>

                <!-- First Blog Post -->
                            <h2>
                                <a href="#"><?php echo "$post_title"; ?></a>
                            </h2>
                            <p class="lead">
                                by <a href="index.php"><?php echo "$post_author"; ?></a>
                            </p>
                            <p><span class="glyphicon glyphicon-time"></span><?php echo "$post_date"; ?></p>
                            <hr>
                                <img class="img-responsive" src="images/<?php echo "$post_image"; ?>" alt="">
                            <hr>
                            <p><?php echo "$post_content"; ?></p>
                            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                            <hr>

                            <?php  


                        }?>

                        <!-- Blog Comments -->

                        
                        <?php  

                            if (isset($_POST['create_comment'])) {


                                $the_post_id = $_GET['p_id'];
                                $comment_author = $_POST['comment_author'];
                                $comment_email = $_POST['comment_email'];
                                $comment_content = $_POST['comment_content'];


                                $query = "INSERT INTO `comments` (`comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) 
                                VALUES 
                                ('$the_post_id', '$comment_author', '$comment_email', '$comment_content', 'UnApproved', 'now()')";

                                $result = mysqli_query($connection,$query);

                                if (!$result) {
                                    echo "Query Failed";
                                    # code...
                                }

                                //= $_POST['create_comment'];
                                # code...
                            }

                        ?>







                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="POST" role="form">


                        <div class="form-group">
                            <label for="comment_author">Author</label>
                            <input type="Text" class="form-control" name="comment_author">
                        </div>

                        <div class="form-group">
                            <label for="comment_email">Email</label>
                            <input type="email" class="form-control" name="comment_email">
                        </div>

                        <div class="form-group">
                            <label for="comment_content">Your Comment</label>
                            <textarea name="comment_content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                        <?php 

                            $query = "SELECT * FROM comments where comment_post_id = $the_post_id and comment_status = 'approve' Order by comment_id DESC";

                            $selectAllComments = mysqli_query($connection,$query); 
                            if (!$selectAllComments) {
                                die().mysql_error($connection);
                                # code...
                            }

                            while ($row = mysqli_fetch_assoc($selectAllComments)) {

                                    
                                    
                                    $comment_author = $row['comment_author'];
                                    $comment_content = $row['comment_content'];
                                    $comment_date = $row['comment_date'];
                                    ?>

                                    <div class="media">
                                        <a class="pull-left" href="#">
                                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                                        </a>
                                        <div class="media-body">
                                        <h4 class="media-heading"> <?php echo $comment_author;?>
                                            <small><?php echo $comment_date;?></small>
                                        </h4>
                                        <?php echo $comment_content;?>
                                        </div>
                                    </div>

                                    
                                <?php } ?>

                <!-- Comment -->
   
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include 'includes/sidebar.php'?>


        </div>
        <!-- /.row -->

        <hr>

<?php include 'includes/footer.php'?>
