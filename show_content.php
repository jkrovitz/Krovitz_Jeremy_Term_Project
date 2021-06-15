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
		<title></title>
	</head>

	<body>
		<a href="forum.php">Go back to the forum</a>
		<?php 
			$conn = mysqli_connect("107.180.91.81", "jeremykr_twin_cities_forum", "woow3ce!CEAT!nus", "jeremykr_twin_cities_forum");
			$title = $_GET["title"];

			if(is_null($title)) {
				header("Location: forum.php");
			}
			
			$query = mysqli_query($conn, "SELECT poster, post_title, post_desc FROM posting WHERE  post_title='$title';");
			$data = mysqli_fetch_assoc($query);

			if(is_null($data["post_title"])) {
				header("Location: forum.php");
			}

			echo "<h1>".$data["post_title"]."</h1>";
			echo "<p>".$data["poster"]."</p>";
			echo "<p>".$data["post_desc"]."</pa>";
		?>
	</body>

</html>