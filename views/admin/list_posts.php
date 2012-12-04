<?php
// Load DB constants
require('config/db.php');

// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

//get order from QS
if(isset($_GET['order'])) {
	$order = $_GET['order'];
} else {
	$order = 'post_title';
}

//construct a query
$sql = "SELECT * FROM posts ORDER BY $order";

// Execute the query
$results = $conn->query($sql);

while($blog = $results->fetch_assoc()):
	echo "<h2>".$blog['post_title']."</h2>"; 
	
	echo $blog['post_text']; 
endwhile;
 ?>
