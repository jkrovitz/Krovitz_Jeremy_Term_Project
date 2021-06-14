<?php 
	session_start();
	//Checks if the user is logged in. If the user is not logged in, the user is taken to login.php
	if(is_null($_SESSION["username"])) {
		header("Location: login.php");
	}
?>

<!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8">
		<title>My Forum</title>
	</head>

	<body>
		<p>Welcome <?php echo $_SESSION["username"] ?>!</p>
		<a href="create_post.php">Create a new post.</a>
	</body>

</html>