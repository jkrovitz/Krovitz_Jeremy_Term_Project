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
					header("Location: review.php");
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
		<title>Create a post</title>
		<meta charset="UTF-8" />
		<meta content="width=device-width, initial-scale=1.0" name="viewport" />
		<link href="the-twin-cities/create_post.php" rel="canonical" />
		<meta content="Create post" name="title" />
		<meta content="Create a post." name="description" />
		<meta content="Jeremy Krovitz" name="author" />
		<link href="style/all-style.css" rel="preload" as="style" />
		<link href="style/all-style.css" rel="stylesheet" type="text/css" />
		<link href="style/header.css" rel="preload" as="style" />
		<link href="style/header.css" rel="stylesheet" type="text/css" />
		<link href="style/review.css" rel="preload" as="style" />
		<link href="style/review.css" rel="stylesheet" type="text/css" />
		<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
		<!-- <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14" defer></script> -->
		<script src="js/header.js" defer></script>
		<script src="js/create_post.js" defer></script>
		<script src="js/script.js" defer></script>
	</head>

	<body class="flex-container">
		<div id="header-container">
			<headercomponent></headercomponent>
		</div>
		<h2 class="welcome-class">Create a new Post</h2>
		<div class="center-btn">
			<a class="create-post-btn" href="review.php">Go back to the forum</a>
		</div>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
			<p><?php echo $errors; ?></p>
			<div id="v-model-textinput">
				<input v-model="reviewTitle" type="text" name="title" placeholder="Title">
				<p>{{reviewTitle}}</p>
			</div>
			<div id="v-model-textarea">
				<textarea v-model="reviewDescription" rows="25" cols="50" name="desc"
					placeholder="Post description"></textarea>
				<p>{{ reviewDescription }}</p>
			</div>
			<input type="submit" value="Submit" />
		</form>
		<div id="footer-container">
			<footercomponent></footercomponent>
		</div>
	</body>

</html>