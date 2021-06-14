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
		<title>Creating posts</title>
	</head>

	<body>
		<h1>Create a new Post</h1>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
			<input type="text" name="title" placeholder="Title">
			<textarea rows="25" cols="50" placeholder="Post description"></textarea>
			<input type="submit" value="Submit">
		</form>
	</body>

</html>