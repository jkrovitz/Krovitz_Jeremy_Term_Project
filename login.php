<?php 
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		include '../../connection.php';

		$errors = "";
		$username = htmlspecialchars($_POST["username"]);
		$password = htmlspecialchars($_POST["password"]);

		if(empty($username) or empty($password)) {
			$errors = "Invalid inputs!";
		} else {
			$query = mysqli_query($conn, "SELECT username, password FROM register WHERE username='$username';");
			$data = mysqli_fetch_assoc($query);

			if(is_null($data["username"])) {
				$errors = "Username doesn't exist!";
			} else {
				if (password_verify($password, $data["password"])) {
					session_start();
					
					$_SESSION["username"] = $username;
					header("Location: review.php");
				} else {
					$errors = "Password is not correct!";
				}
			}
		}
	}
?>

<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<title>Login Page</title>
		<meta content="Jeremy Krovitz" name="author" />
		<link href="style/all-style.css" rel="preload" as="style" />
		<link href="style/all-style.css" rel="stylesheet" type="text/css" />
		<link href="style/header.css" rel="preload" as="style" />
		<link href="style/header.css" rel="stylesheet" type="text/css" />
		<link href="style/account.css" rel="preload" as="style" />
		<link href="style/account.css" rel="stylesheet" type="text/css" />
		<script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
		<script defer src="js/header.js"></script>
	</head>

	<body>
		<div id="header-container">
			<headercomponent></headercomponent>
		</div>
		<div class="login">
			<form class="add-top-margin" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
				<p><?php echo $errors; ?></p>
				<h1>Login</h1>
				<input type="text" name="username" placeholder="username" />
				<input type="password" name="password" placeholder="password">
				<input type="submit" value="Submit">
			</form>
		</div>
		<p class="registration-login-message">Need to create an account? <a href="register.php">Register</a></p>
	</body>

</html>