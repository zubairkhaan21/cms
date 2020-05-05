
    <?php include 'includes/admin_header.php'?>

    <div id="wrapper">

        <!-- Navigation -->
    <?php include 'includes/admin_navigation.php'?>


        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome To Admin.
                            <small>Author</small>
                        </h1>
                        <div class="col-xs-6">

                            <?php  
                                if (isset($_POST['submit'])) {
                                    $cat_title = $_POST['cat_title'];

                                    if ($cat_title == "" || empty($cat_title)) {
                                        echo "Category Field must not be empty";
                                        
                                    }else {
                                        $categoryInsertQuery = "INSERT INTO `categories` (`cat_title`) VALUES ('$cat_title')";

                                        $result = mysqli_query($connection,$categoryInsertQuery);

                                        if (!$result) {
                                            die("Querry Failed".mysql_error($connection));
                                            # code...
                                        }
                                    }
                                    
                                }


                            ?>




                            <form action="" method="post" >
                                <div class="form-group">
                                    <label for="cat_title">Add Category</label>
                                    <input class="form-control" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                                
                            </form>


                            <form action="" method="post" >
                                <div class="form-group">

                                    <?php

                                        if (isset($_GET['edit'])) {

                                            $editCatId = $_GET['edit'];

                                            $query = "SELECT * FROM categories where id = $editCatId";
                                            $editAllCategoriesQuery = mysqli_query($connection,$query);  
                                            while ($row = mysqli_fetch_assoc($editAllCategoriesQuery)) {
                                            $cat_id = $row['id'];
                                            $cat_title = $row['cat_title'];

                                            ?>
                                              
                                            <input type="text" value="<?php if(isset($cat_title)){echo $cat_title;} ?>" class="form-group" name="cat_title" > 
                                            <?php 
                                        }}
                                    ?>

                                    <?php
                                    if (isset($POST['update_category'])) {
                                        $updateCatId = $_POST['cat_title'];

                                        $updateQuery = "UPDATE `categories` SET `cat_title` = '$updateCatId' WHERE `categories`.`id` = $cat_id";

                                        $updateResult = mysqli_query($connection,$updateQuery);
                                        header("Location: categories.php");

                                        if (!$updateResult) {
                                            die("Query Failed");
                                            # code...
                                        }
                                      }  
                                ?>

                                    <label for="cat_title">Update Category</label>
                                    <input class="form-control" type="text" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="update_category" value="Update">
                                </div>
                                
                            </form>
                        </div>

                        <div class="col-xs-6">


                            <?php  
                                if (isset($_POST['delete'])) {
                                        $deleteCatId = $_GET['delete'];

                                        $deleteQuery = "DELETE FROM categories WHERE id = {$deleteCatId}";

                                        $deleteResult = mysqli_query($connection,$deleteQuery);
                                        header("Location: categories.php");
                                      }
                            ?>

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>



                                    <?php
                                        $query = "SELECT * FROM categories";
                                        $selectAllCategoriesQuerySideBar = mysqli_query($connection,$query);  
                                        while ($row = mysqli_fetch_assoc($selectAllCategoriesQuerySideBar)) {
                                        $cat_id = $row['id'];
                                        $cat_title = $row['cat_title'];
                                        
                                        echo "<tr>";
                                        echo "<td>{$cat_id}</td>";
                                        echo "<td>{$cat_title}</td>";
                                        echo "<td><a href ='categories.php?delete={$cat_id}'>Delete</a></td>";
                                        echo "<td><a href ='categories.php?edit={$cat_id}'>Edit</a></td>";


                                        echo "</tr>"; 
                            
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include 'includes/admin_footer.php'?>

