<?php

// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

//construct a query
$sql = "SELECT * FROM posts WHERE post_id={$_GET['id']}";

// Execute the query
$results = $conn->query($sql);

// Display post
$post = $results->fetch_assoc();
extract($post);
echo '<div id="post-single">';
echo "<h2>$post_title</h2>";
echo "<p>$post_text</p>";
echo '</div>';
?>