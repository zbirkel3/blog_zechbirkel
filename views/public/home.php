<?php

// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

//get order from QS
if(isset($_GET['order'])) {
	$order = $_GET['order'];
} else {
	$order = 'post_datepublished';
}

//construct a query
$sql = "SELECT * FROM posts ORDER BY post_datepublished DESC";

// Execute the query
$results = $conn->query($sql);

// Display first post
$post = $results->fetch_assoc();
extract($post);
echo '<div id="post">';
echo "<h2><a href='./?p=public/post&id=$post_id'>$post_title</h2>";
echo "<p>$post_text</p>";
echo "</a>";
echo '</div>';
//display the rest of the titles
echo '<div id="list">';
while($post = $results->fetch_assoc()):
	extract($post);
	echo "<a href='./?p=public/post&id=$post_id'";
	echo '<div class="listed-post">';
	echo "<h2>$post_title</h2>";
	echo "</a>";
	echo '</div>';
endwhile;
echo '</div>';
?>