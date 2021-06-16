<?php 
	session_start();
	//Checks if the user is logged in. If the user is not logged in, the user is taken to login.php
	if(is_null($_SESSION["username"])) {
		header("Location: login.php");
	}

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		include '../../connection.php';
	}

	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$errors = "";
		$poster = $_SESSION["username"];
		$post_title = htmlspecialchars($_POST["title"]);
		$post_desc = htmlspecialchars($_POST["desc"]);

		if (empty($post_title) or empty($post_desc)) {
			$errors = "Invalid inputs";
		} else {
			//make sure post titles are not the same.
			$query = mysqli_query($conn, "SELECT post_title FROM posting WHERE post_title='$post_title';");
			$data = mysqli_fetch_assoc($query);
			if(!is_null($data["post_title"])) {
				$errors = "Post name already exists!";
			} else {
				$query = mysqli_query($conn, "INSERT INTO posting(poster, post_title, post_desc) values ('$poster', '$post_title', '$post_desc');");

				if ($query) {
					header("Location: forum.php");
				} else {
					echo "It did not work";
				}
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
		<a href="forum.php">Go back to the forum</a>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
			<p><?php echo $errors; ?></p>
			<input type="text" name="title" placeholder="Title">
			<textarea rows="25" cols="50" name="desc" placeholder="Post description"></textarea>
			<input type="submit" value="Submit" />
		</form>
	</body>

</html>