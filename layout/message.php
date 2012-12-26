<?php
if(isset($_SESSION['flash'])){
	//display message
	echo'<p class="alert alert-'.$_SESSION['flash']['type'].'">';
	echo $_SESSION['flash']['message'];
	echo'</p>';
	//remove message from session data
	unset($_SESSION['flash']);
	
}
