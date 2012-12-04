<form class="form-horizontal" action="actions/add_post.php" method="post">

	<div class="control-group">
		<label class="control-label" for="post_title">Post Title</label>
		<div class="controls">
			<input type="text" name="post_title" placeholder="Title"/>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label" for="post_text">Whats on your mind?</label>
		<div class="controls">
			<textarea name="post_text" placeholder="Type text here"></textarea>
		</div>
	</div>
	<div class="form-actions">
		<button type="submit" class="btn btn-success">Post</button>
		<button type="button" class="btn" onclick="window.history.go(-1)">Cancel</button>
	</div>
</form>