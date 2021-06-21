<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    include '../../connection.php';

    $errors = "";
    $username = htmlspecialchars($_POST["username"]);
    $password = htmlspecialchars($_POST["password"]);

    if (empty($username) or empty($password))
    {
        $errors = "Invalid inputs!";
    }
    else
    {
        $query = mysqli_query($conn, "SELECT username, password FROM register WHERE username='$username';");
        $data = mysqli_fetch_assoc($query);

        if (is_null($data["username"]))
        {
            $errors = "Username doesn't exist!";
        }
        else
        {
            if (password_verify($password, $data["password"]))
            {
                session_start();

                $_SESSION["username"] = $username;
                header("Location: review.php");
            }
            else
            {
                $errors = "Password is not correct!";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>

	<head>
		<title>Login Page</title>
		<meta charset="UTF-8" />
		<meta content="width=device-width, initial-scale=1.0" name="viewport" />
		<?php include 'favicons.php'; ?>
		<meta content="Jeremy Krovitz" name="author" />
		<link href="style/screen.css" rel="preload" as="style" />
		<link href="style/screen.css" rel="stylesheet" type="text/css" />
		<link href="style/header.css" rel="preload" as="style" />
		<link href="style/header.css" rel="stylesheet" type="text/css" />
		<link href="style/review.css" rel="preload" as="style" />
		<link href="style/review.css" rel="stylesheet" type="text/css" />
		<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14" defer></script>
		<script defer src="js/login.js"></script>
		<script defer src="js/account.js"></script>
		<script defer src="js/header.js"></script>
	</head>

	<body>
		<div id="page_container">
			<div id="content-wrap">
				<div id="header-container">
					<headercomponent></headercomponent>
				</div>
				<p class="message-on-login-page">You must be logged in to read and write reviews.</p>
				<p class="need-to-create-an-account">Need to create an account? <a href="register.php">Register</a></p>
				<div class="login">
					<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" name="loginForm"
						class="login-form">
						<h2 class="review-text">Login</h2>
						<input type="text" id="username-login-page" name="username" placeholder="username"
							autocomplete="off" />
						<p id="username-feedback-login-page" class="hidden">Username must have length between 5 and
							20
							characters.
							It can
							may
							only consist of alphanumeric characters, -, or _.</p>
						<input type="password" id="password-login-page" name="password" placeholder="password"
							autocomplete="off">
						<p id="password-feedback-login-page" class="hidden">Password must contain one lowercase letter,
							one
							uppercase
							letter, one digit, one special character, and is at least eight characters long.</p>
						<input id="submit-login-page" class="disabled-submit" type="submit" value="Submit">
					</form>
				</div>
			</div>
			<div id="footer-container">
				<footercomponent></footercomponent>
			</div>
		</div>
	</body>

</html>