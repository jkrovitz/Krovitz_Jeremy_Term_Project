<?php 
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$conn = mysqli_connect("107.180.91.81", "jeremykr_twin_cities_forum", "woow3ce!CEAT!nus", "jeremykr_twin_cities_forum");

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
					header("Location: forum.php");
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
	</head>

	<body>
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
			<p><?php echo $errors; ?></p>
			<h1>Login</h1>
			<input type="text" name="username" placeholder="username" />
			<input type="password" name="password" placeholder="password">
			<input type="submit" value="Submit">
		</form>

		<p>Need to create an account? <a href="register.php">Register</a></p>
	</body>

</html>