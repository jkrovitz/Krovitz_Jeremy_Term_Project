<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Create connection
	include '../../connection.php';
    
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
		<title>Registration</title>
		<meta charset="UTF-8" />
		<meta content="width=device-width, initial-scale=1.0" name="viewport" />
		<link href="the-twin-cities/register.php" rel="canonical" />
		<meta content="Register" name="title" />
		<meta content="User can create an account, so they can post a review." name="description" />
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
		<script src="js/register.js" defer></script>
	</head>

	<body class="flex-container">
		<div id="page_container">
			<div id="content-wrap">
				<div id="header-container">
					<headercomponent></headercomponent>
				</div>
				<div class="add-margin">
					<form name="registrationForm" class="add-top-margin"
						action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
						<div class="innerFormOutline">
							<h1>Registration Page</h1>
							<!-- <p><?php echo $errors; ?></p> -->
							<input type="text" id="username" name="username" placeholder="username">
							<p id="usernameFeedback" class="hidden">Username must have length between 5 and 20
								characters.
								It can
								may
								only consist of alphanumeric characters, -, or _.</p>
							<input type="text" id="email" name="email" placeholder="E-mail">
							<p id="emailFeedback" class="hidden">Invalid email.</p>
							<input type="password" id="password" name="password" placeholder="Password"
								autocomplete="on">
							<p id="passwordFeedback" class="hidden">Password must contain one lowercase letter, one
								uppercase
								letter, one digit, one special character, and is at least eight characters long.</p>
							<input type="submit" value="Submit" id="submit" class="disabledSubmit">
						</div>
					</form>
				</div>
				<p class="registration-login-message">Already have an account? <a href="login.php">Login</a></p>
			</div>
			<div id="footer-container">
				<footercomponent></footercomponent>
			</div>
		</div>
	</body>

</html>