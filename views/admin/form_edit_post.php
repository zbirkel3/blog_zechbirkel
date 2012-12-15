<?php
// Connect
$conn = new mysqli('localhost',DB_USERNAME,DB_PASSWORD,DB_NAME);

// Construct
$sql = "SELECT * FROM posts WHERE post_id={$_GET['id']} LIMIT 1";

// Execute
$results = $conn->query($sql);

// Get the post
$post = $results->fetch_assoc();	

// Close
$conn->close();
?>
<h2>Edit band</h2>
<form class="form-horizontal" action="actions/edit_post.php" method="post">
	<input type="hidden" name="post_id" value="<?php echo $_GET['id']?>" />
	<div class="control-group">
		<label class="control-label" for="post_title">Post Title</label>
		<div class="controls">
			<input type="text" name="post_title" placeholder="Title" value="<?php echo $post['post_title'] ?>"/>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="post_text">Whats on your mind?</label>
		<div class="controls">
			<textarea name="post_text" placeholder="Type text here"><?php echo $post['post_text'] ?></textarea>
		</div>
	</div>
	<div class="form-actions">
		<button type="submit" class="btn btn-success">Post</button>
		<button type="button" class="btn" onclick="window.history.go(-1)">Cancel</button>
	</div>
</form>