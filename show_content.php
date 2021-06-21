<?php

session_start();
if (is_null($_SESSION["username"]))
{
    header("Location: login.php");
}

?>

<html>

	<head>
		<meta charset="utf-8">
		<title>Show review</title>
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
		<script defer src="js/show-content.js"></script>
	</head>

	<body>
		<div id="page_container">
			<div id="content-wrap">
				<div id="header-container">
					<headercomponent></headercomponent>
				</div>
				<div class="logout-btn-div">
					<a class="logout-btn" href="logout.php">Logout</a>
				</div>
				<a class="create-post-btn" href="review.php">Go back to all reviews</a>
				<?php
include '../../connection.php';
$id = $_GET['id'];
if (is_null($id))
{
    header("Location: review.php");
}
$query = mysqli_query($conn, "SELECT post_title, poster, post_desc FROM posting WHERE  post_id='$id';");
$review_data = mysqli_fetch_assoc($query);
$review_file = "show_content.json";
if (file_put_contents($review_file, json_encode($review_data))) echo "";
else echo ("failed");
?>
				<table id="review-details-table"></table>

				<div id="footer-container">
					<footercomponent></footercomponent>
				</div>
			</div>
	</body>

</html>