


<?php  
	CREATE TABLE `cms`.`posts` ( 
		`posts_id` INT NOT NULL AUTO_INCREMENT , 
		`post_category_id` INT NOT NULL , 
		`post_title` VARCHAR(255) NOT NULL , 
		`post_author` VARCHAR(255) NOT NULL , 
		`post_date` DATE NOT NULL , 
		`post_image` TEXT NOT NULL , 
		`post_content` TEXT NOT NULL , 
		`post_tags` VARCHAR(255) NOT NULL , 
		`post_comment_count` VARCHAR(255) NOT NULL , 
		`post_status` VARCHAR(255) NOT NULL DEFAULT 'default' , PRIMARY KEY (
		`posts_id`)) ENGINE = InnoDB;




	INSERT INTO `posts` (
		`posts_id`, `post_category_id`, 
		`post_title`, `post_author`, 
		`post_user`, `post_date`, 
		`post_image`, `post_content`, 
		`post_tags`, `post_comment_count`, 
		`post_status`, `post_views_count`) 
	VALUES (
		NULL, '0', 'This CMS Tutorialas is awsome', 
		'Muhammad Zubair', 'Zubair khan', 
		'2020-04-09', '', 
		'Wowwww i really really like this course this is more than good.', 
		'Muhammad Zubair', 
		'1', 'default', '1');


?>