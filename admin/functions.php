<?php
	
	function confirm($result){

		global $connection;
		if (!$result) {
		 	die("Query Failed".mysql_error($connection));
		  	# code...
		  }
	}
	return $result;

?>