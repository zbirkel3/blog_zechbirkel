<?php
// Load DB constants
require('../config/db.php');

// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

//get the post title
$sql = "SELECT post_title FROM posts WHERE post_id={$_GET['id']}";

//execute select query
$result = $conn->query($sql);
$post = $result->fetch_assoc();
extract($post);

// Construct query
$sql = 'DELETE FROM posts WHERE post_id='.$_GET['id'];

//Execute query
$conn->query($sql);

// Echo error
if($conn->error != '') {
	echo '<h2>MySQLError</h2><p>'.$conn->error.'</p>';
	echo "<h3>SQL Executed</h3><p>$sql</p>";
	echo '<pre>$_POST: ';
	print_r($_POST);
	echo '</pre>';
} else {
	// Redirect
	header('Location:../?p=list_posts');
}
	
// Close DB connection
$conn->close();