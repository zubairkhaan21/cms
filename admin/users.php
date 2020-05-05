<?php include 'includes/admin_header.php'?>


<?php include 'includes/admin_navigation.php'?>

<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
                    Welcome To Admin.
                    <small>Author</small>
                </h1>
                <?php
                	if (isset($_GET['source'])) {
                		$source = $_GET['source'];
                	}else {
                		$source = '';
                	}


                	switch ($source) {
                			case 'ad_user':
								include "includes/ad_user.php"; 

                				# code...
                				break;

                			case 'edit_user':
								include "includes/edit_user.php"; 

                				# code...
                				break;	
                			
                			default:
                				include "includes/view_all_users.php"; 
                				# code...
                				break;
                		}
                	  	# code...
                	    
                ?>
                
			</div>
		
		</div>
	</div>
</div>

<?php include 'includes/admin_footer.php'?>
