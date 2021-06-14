<?php 
	session_start();
	//Checks if the user is logged in. If the user is not logged in, the user is taken to login.php
	if(is_null($_SESSION["username"])) {
		header("Location: login.php");
	}

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$conn = mysqli_connect("107.180.91.81", "jeremykr_twin_cities_forum", "woow3ce!CEAT!nus", "jeremykr_twin_cities_forum");
	}

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$errors = "";
		$poster = $_SESSION["username"];
		$post_title = htmlspecialchars($_POST["title"]);
		$post_desc = htmlspecialchars($_POST["desc"]);

		if (empty($post_title) or empty($post_desc)) {
			$errors = "Invalid inputs";
		} else {
			$query = mysqli_query($conn, "INSERT INTO posting(poster, post_title, post_desc) values ('$poster', '$post_title', '$post_desc');");

			if ($query) {
				echo "Post created";
			} else {
				echo "It did not work";
			}
		}
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
			<p><?php echo $errors; ?></p>
			<input type="text" name="title" placeholder="Title">
			<textarea rows="25" cols="50" name="desc" placeholder="Post description"></textarea>
			<input type="submit" value="Submit" />
		</form>
	</body>

</html>