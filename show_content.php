<?php 

	session_start();
	if(is_null($_SESSION["username"])) {
		header("Location: login.php");
	}

?>

<html>

	<head>
		<meta charset="utf-8">
		<title>Show review</title>
		<link href="style/header.css" rel="preload" as="style" />
		<link href="style/header.css" rel="stylesheet" type="text/css" />
		<link href="style/all-style.css" rel="preload" as="style" />
		<link href="style/all-style.css" rel="stylesheet" type="text/css" />
		<link href="style/review.css" rel="preload" as="style" />
		<link href="style/review.css" rel="stylesheet" type="text/css" />

		<!-- <link href="style/all-style.css" rel="preload" as="style" />
		<link href="style/all-style.css" rel="stylesheet" type="text/css" /> -->
		<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js">
		</script>
		<script defer src="js/header.js"></script>
	</head>

	<body>
		<div id="page_container">
			<div id="content-wrap">
				<div id="header-container">
					<headercomponent></headercomponent>
				</div>
				<a class="create-post-btn" href="review.php">Go back to the forum</a>


				<?php 
			include '../../connection.php';

		$id = $_GET['id'];


			if(is_null($id)) {
				header("Location: review.php");
			}
			
			$query = mysqli_query($conn, "SELECT post_id, poster, post_title, post_desc FROM posting WHERE  post_id='$id';");
			$review_data = mysqli_fetch_assoc($query);

			if(is_null($review_data["post_id"])) {
				header("Location: review.php");
			}

			$review_file = "show_content.json";
			if(file_put_contents($review_file, json_encode($review_data)))
			echo "";
			else echo ("failed");
		?>
				<p id="post-id"></p>
				<h1 id="post-title"></h1>
				<h2 id="poster"></h2>
				<p id="post-desc"></p>

				<script defer src="js/show-content.js"></script>
			</div>
			<div id="footer-container">
				<footercomponent></footercomponent>
			</div>
		</div>

	</body>

</html>