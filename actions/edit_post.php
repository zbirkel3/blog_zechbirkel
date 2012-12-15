<?php
// Load DB constants
require('../config/db.php');

//initialize session
session_start();

// Connect DB
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

// Construct 
extract($_POST);
$post_title=addslashes($post_title);
$post_text=addslashes($post_text);
$sql = "UPDATE posts SET post_title='$post_title', post_text='$post_text' WHERE post_id=$post_id";

// Execute 
$conn->query($sql);

// error display
if($conn->error != '') {
	echo '<h2>MySQLError</h2><p>'.$conn->error.'</p>';
	echo "<h3>SQL Executed</h3><p>$sql</p>";
	echo '<pre>$_POST: ';
	print_r($_POST);
	echo '</pre>';
} else {
	// redirect
	header('Location:../?p=public/home');
}

// close
$conn->close();
