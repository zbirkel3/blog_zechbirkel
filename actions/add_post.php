<?php
//extract post data
extract($_POST);

//db constants (login to data base with db.php in config)
require('../config/db.php');

// connect

// echo $post_title;
// echo '<br/>';
// echo $post_text;
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

//construct query
$sql = "INSERT INTO posts (post_title,post_text) VALUES('$post_title', '$post_text')" ; 

//execute query
$conn->query($sql);

// Echo error
if($conn->error != '') {
	echo '<h2>MySQLError</h2><p>'.$conn->error.'</p>';
	echo "<h3>SQL Executed</h3><p>$sql</p>";
	echo '<pre>$_POST: ';
	print_r($_POST);
	echo '</pre>';
}

//redirect
header('Location:../?p=admin/list_posts');

//close connection
$conn->close();
