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
		<title>Reviews of the Twin Cities</title>
		<meta charset="utf-8">
		<link href="style/header.css" rel="preload" as="style" />
		<link href="style/header.css" rel="stylesheet" type="text/css" />
		<link href="style/review.css" rel="preload" as="style" />
		<link href="style/review.css" rel="stylesheet" type="text/css" />
		<link href="style/all-styles.css" rel="preload" as="style" />
		<link href="style/all-styles.css" rel="stylesheet" type="text/css" />
		<link href="style/screen.css" rel="preload" as="style" />
		<link href="style/screen.css" rel="stylesheet" type="text/css" />


		<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js">
		</script>
		<script defer src="js/header.js"></script>
		<script defer src="js/review.js"></script>
	</head>

	<body>
		<div id="header-container">
			<headercomponent></headercomponent>
		</div>
		<h2 class="welcome-class">Welcome <?php echo $_SESSION["username"] ?>!</h2>
		<div class="center-btn">
			<a class="create-post-btn" href="create_post.php">Write a review about the Twin Cities</a>
		</div>
		<?php
			include '../../connection.php';

			$query = mysqli_query($conn, "SELECT post_id, post_title, poster, post_desc FROM posting;");

			?>

		<p id="post-title"></p>

		<table class="review-table">
			<?php
					//This statement turns the sql datatable that is output from the select statement into an associative array. It gives four keys post_id, poster, post_title, post_description. This statement has an associative array for onlyone row in the select table, so we put it inside of a while loop.
					
	
		while($data = mysqli_fetch_assoc($query)) {
		$url = "show_content.php?id=".$data["post_id"];
	
		$postdata[] = array(
			"post_id" =>  $data["post_id"],
			"post_title" => $data["post_title"],
			"poster" => $data["poster"],
			"post_desc" => $data["post_desc"],
			"url" => $url
		);
		}

		$file = "data.json";

		if (file_put_contents($file, json_encode($postdata)))
			echo "";
		else 
		echo ("failed");
		?>

		</table>

		<div id="footer-container">
			<footercomponent></footercomponent>
		</div>

	</body>

</html>