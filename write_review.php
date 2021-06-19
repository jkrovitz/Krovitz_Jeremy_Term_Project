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

		$query = mysqli_query($conn, "INSERT INTO posting(poster, post_title, post_desc) values ('$poster', '$post_title', '$post_desc');");

		if ($query) {
			header("Location: review.php");
		} else {
			echo "It did not work";
		}
}

?>

<!DOCTYPE html>

<html>

	<head>
		<title>Write a review</title>
		<meta charset="UTF-8" />
		<meta content="width=device-width, initial-scale=1.0" name="viewport" />
		<link href="the-twin-cities/write_review.php" rel="canonical" />
		<meta content="Write a review." name="title" />
		<meta content="Write a review." name="description" />
		<meta content="Jeremy Krovitz" name="author" />
		<?php include 'favicons.php'; ?>
		<link href="style/header.css" rel="preload" as="style" />
		<link href="style/header.css" rel="stylesheet" type="text/css" />
		<link href="style/all-style.css" rel="preload" as="style" />
		<link href="style/all-style.css" rel="stylesheet" type="text/css" />
		<link href="style/review.css" rel="preload" as="style" />
		<link href="style/review.css" rel="stylesheet" type="text/css" />
		<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14" defer></script>
		<script src="js/header.js" defer></script>
		<script src="js/create_post.js" defer></script>
	</head>

	<body class="flex-container">
		<div id="header-container">
			<headercomponent></headercomponent>
		</div>
		<h2 class="welcome-class">Write a review</h2>
		<div class="center-btn">
			<a class="create-post-btn" href="review.php">Go back to all reviews</a>
		</div>
		<form id="create-post-form" name="createReviewForm"
			action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
			<input type="text" id="review-title" name="title" placeholder="Title">
			<p id="review-title-feedback" class="hidden">Review title must be at least five characters.</p>
			<textarea id="review-description" rows="25" cols="50" name="desc"
				placeholder="Review description"></textarea>
			<p id="review-description-feedback" class="hidden">Review description must be longer than 5 characters.</p>
			<input type="submit" id="submit-btn-id" value="Submit" id="submit" class="disabledSubmit">
		</form>
		<div id="footer-container">
			<footercomponent></footercomponent>
		</div>
	</body>

</html>