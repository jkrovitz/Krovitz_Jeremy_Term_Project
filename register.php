<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create connection
    $conn = mysqli_connect("107.180.91.81", "jeremykr_twin_cities_forum", "woow3ce!CEAT!nus", "jeremykr_twin_cities_forum");
    
    //We use htmlspecialchars to prevent HTML injection
    $errors   = "";
    $username = htmlspecialchars($_POST["username"]);
    $email    = htmlspecialchars($_POST["email"]);
    $password = htmlspecialchars($_POST["password"]);
    
    if (empty($username) or empty($email) or empty($password) or !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors = "Invalid inputs!";
        
    }
    
    else {
        
        $query = mysqli_query($conn, "SELECT username from register WHERE username='$username';");
		$query1 = mysqli_query($conn, "SELECT email from register WHERE email='$email';");
        $data  = mysqli_fetch_assoc($query);
		$data1 = mysqli_fetch_assoc($query1);
        
        if (!is_null($data["username"])) {
            $errors = "Username already exists!";
        } elseif (!is_null($data1["email"])) {
            $errors = "Email already exists!";
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $query = mysqli_query($conn, "INSERT INTO register (username, email, password) VALUES ('$username', '$email', '$password')");
            
            if ($query) {
                echo "USER created!";
            } else {
                echo "It's not working";
            }
            
        }
    }
}
?>


<!DOCTYPE html>

<html>

	<head>
		<meta charset="utf-8">
		<title>Registration</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="preload" as="style" href="style/screen.css" />
		<link rel="stylesheet" type="text/css" href="style/screen.css" />
		<script defer src="js/register.js"></script>

	</head>

	<body>
		<form name="registrationForm" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
			<div class="innerFormOutline">
				<h1>Registration Page</h1>
				<p><?php echo $errors; ?></p>
				<input type="text" id="username" name="username" placeholder="username">
				<p id="usernameFeedback" class="hidden">Username must have length between 5 and 20 characters. It can
					may
					only consist of alphanumeric characters, -, or _.</p>
				<input type="text" id="email" name="email" placeholder="E-mail">
				<p id="emailFeedback" class="hidden">Invalid email.</p>
				<input type="password" id="password" name="password" placeholder="Password" autocomplete="on">
				<p id="passwordFeedback" class="hidden">Password must contain one lowercase letter, one uppercase
					letter, one digit, one special character, and is at least eight characters long.</p>
				<input type="submit" value="Submit" id="submit" class="disabledSubmit">
			</div>
		</form>
		<p>Already have an account? <a href="login.php">Login</a></p>
	</body>

</html>