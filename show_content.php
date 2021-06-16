<?php 

	session_start();
	if(is_null($_SESSION["username"])) {
		header("Location: login.php");
	}

?>

<html>

	<head>
		<meta charset="utf-8">
		<title></title>
	</head>

	<body>
		<a href="forum.php">Go back to the forum</a>
		<h1 id="post-title"></h1>
		<h2 id="poster"></h2>
		<p id="post-desc"></p>
		<script type="text/javascript">
		<?php 
			include '../../connection.php';
			$title = $_GET["title"];

			if(is_null($title)) {
				header("Location: forum.php");
			}
			
			$query = mysqli_query($conn, "SELECT post_id, poster, post_title, post_desc FROM posting WHERE  post_title='$title';");
			$data = mysqli_fetch_assoc($query);

			if(is_null($data["post_title"])) {
				header("Location: forum.php");
			}
			
			// $json_data = json_encode($data);



		?>


		// document.write(js_arr[0]);
		let json_data = <?php echo json_encode($data); ?>;
		document.getElementById("post-title").textContent = json_data['post_title'];
		document.getElementById("poster").textContent = json_data["poster"];
		document.getElementById("post-desc").textContent = json_data["post_desc"];
		</script>

	</body>

</html>