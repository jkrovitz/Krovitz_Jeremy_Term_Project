<?php
session_start();
//Checks if the user is logged in. If the user is not logged in, the user is taken to login.php
if (!isset($_SESSION["username"])) {
	header("Location: ./login.php");
}
?>

<!DOCTYPE html>
<html>

<head>
	<title>Reviews of the Twin Cities</title>
	<meta charset="utf-8">
	<?php include 'favicons.php'; ?>
	<meta charset="UTF-8" />
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<link href="style/screen.css" rel="preload" as="style" />
	<link href="style/screen.css" rel="stylesheet" type="text/css" />
	<link href="style/header.css" rel="preload" as="style" />
	<link href="style/header.css" rel="stylesheet" type="text/css" />
	<link href="style/review.css" rel="preload" as="style" />
	<link href="style/review.css" rel="stylesheet" type="text/css" />
	<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14" defer></script>
	<script defer src="js/header.js"></script>
	<script defer src="js/review.js"></script>
</head>

<body>
	<div id="header-container">
		<headercomponent></headercomponent>
	</div>
	<div class="logout-btn-div">
		<a class="logout-btn" href="logout.php">Logout</a>
	</div>
	<h2 id="welcome-id-review" class="welcome-class">Welcome <?php echo $_SESSION["username"] ?>!</h2>
	<p id="review-page-description">Click <span id="review-page-description-span">Write a review</span> or select an
		existing review to read.</p>
	<div class="center-btn">
		<a class="create-post-btn" href="write_review.php">Write a review</a>
	</div>
	<?php
	include './config.php';

	$query = mysqli_query($conn, "SELECT post_id, post_title, poster, post_desc FROM posting;");

	?>

	<table class="review-table">
		<?php
		$postdata = [];
		while ($data = mysqli_fetch_assoc($query)) {
			$url = "show_content.php?id=" . $data["post_id"];

			$postdata[] = array(
				"post_id" => $data["post_id"],
				"post_title" => $data["post_title"],
				"poster" => $data["poster"],
				"post_desc" => $data["post_desc"],
				"url" => $url
			);
		}

		$file = "data.json";

		if (file_put_contents($file, json_encode($postdata))) echo "";
		else echo ("failed");
		?>

	</table>

	<div id="footer-container">
		<footercomponent></footercomponent>
	</div>

</body>

</html>