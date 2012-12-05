<?php
// Load DB constants
require('config/db.php');

// Connect to the database
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

//get order from QS
if(isset($_GET['order'])) {
	$order = $_GET['order'];
} else {
	$order = 'post_datepublished';
}

//construct a query
$sql = "SELECT * FROM posts ORDER BY $order";

// Execute the query
$results = $conn->query($sql);
echo '<div id="list">';
while($blog = $results->fetch_assoc()):
		echo '<div id="post">';
		echo "<h2>".$blog['post_title']."</h2>"; 
		echo "<p>".$blog['post_text']."</p>"; 
		?>
		<a class="btn btn-warning btn-mini" title="EDIT" href="actions/edit_post&amp;id=<?php echo $post['post_id']?>"><i class="icon-edit icon-white"></i></a> 
		<a class="btn btn-danger btn-mini" title="DELETE" href="actions/delete_post.php?id=<?php echo $post['post_id']?>"><i class="icon-trash icon-white"></i></a>
<?php 
		echo '</div>';
endwhile;
echo '</div>';
?>
