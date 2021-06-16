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
		<?php
			include '../../connection.php';

			$query = mysqli_query($conn, "SELECT post_id, post_title, poster, post_desc FROM posting;");
			//This statement turns the sql datatable that is output from the select statement into an associative array. It gives four keys post_id, poster, post_title, post_description. This statement has an associative array for only one row in the select table, so we put it inside of a while loop.
			while($data = mysqli_fetch_assoc($query)) {
				echo "<a href='show_content.php?title=".$data["post_title"]."'>".$data["post_title"]."</a> by ".$data["poster"];
			}
		?>
	</body>

</html>