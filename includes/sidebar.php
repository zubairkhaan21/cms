            <?php include "includes/db.php" ?>
            <div class="col-md-4">


                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                        
                    
                        <div class="input-group">
                            <input name="search" type="text" class="form-control">
                            <span class="input-group-btn">
                            <button name="submit" type="submit" class="btn btn-default">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.input-group -->
                </div>



                                <!-- Login -->
                <div class="well">
                    <h4>Login Here:</h4>
                    <form action="includes/login.php" method="post">
                        
                    
                        <div class="form-group">
                            <input name="username" placeholder="Username" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <input name="password" placeholder="Enter Password" type="password" class="form-control">
                            <span class="input-group-btn">
                                <button type="submit" name="login" class="btn btn-primary">Login</button>
                            </span>
                        </div>

                    </form>
                    <!-- /.input-group -->
                </div>









                <!-- Blog Categories Well -->
                <div class="well">

                    <?php  
                        $query = "SELECT * FROM categories";
                        $selectAllCategoriesQuerySideBar = mysqli_query($connection,$query);
                    ?>

                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">

                                <?php  
                                    while ($row = mysqli_fetch_assoc($selectAllCategoriesQuerySideBar)) {

                                        $cat_title = $row['cat_title'];
                                        $cat_id = $row['id'];
                                        echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                            
                                    }

                                ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php include "widget.php" ?>

            </div>