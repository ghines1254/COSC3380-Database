<?php
require_once 'init.php';
?>

<?php

require_once('connection.php');

// handling post request for login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userID = $_POST['userid'];
    $password = $_POST['password'];

    // login check
    $query = "SELECT * FROM WEBUSERS AS W WHERE W.UserID = ? AND W.Password = ?";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ss", $userID, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // check if credentials are valid
    if ($result->num_rows > 0) {
        // valid, do something 
        header("Location: ./tracking-page.php");
        exit();
    } else {
        // invalid
        echo "Invalid username or password";
    }

    $stmt->close();
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Cougar Courier Login</title>
		<link rel="icon" type="image/x-icon" href="/images/coogpawfavicon.png" />
		<meta charset="utf-8" />
		<meta name="viewport" content="initial-scale=1, width=device-width" />

		<link rel="stylesheet" href="./global.css" />
		<link rel="stylesheet" href="./login-page.css" />
		<link
			rel="stylesheet"
			href="https://fonts.googleapis.com/css2?family=Lexend Deca:wght@400;500;600;700;800;900&display=swap" />
		<link
			rel="stylesheet"
			href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600&display=swap" />
	</head>
	<body>
		<div class="customer-login-page">
			<div class="customer-login-page-child"></div>
			<div class="login-page2">
				<div class="minibackground">
					<img class="image-1-icon270" alt="" src="./public/background.png" />
				</div>
				<div class="login-light2">
					<div class="main-shape2"></div>
					<div class="forgot-user-id-or-password-container">
						<div class="forgot-user-id2">FORGOT USER ID OR PASSWORD?</div>
						<div class="frame-child72"></div>
					</div>
					<div class="sign-up-frame" id="frameContainer1">
						<div class="sign-up2">Sign Up</div>
					</div>

<!-- test -->
					
<form action="login-page-script.php" method="post" >
    <div  ><button type="submit" class = "login-frame">Login</button></div>

    <div class="usernamepasswordgroup2">
        <input class="usernamebar2" placeholder="USER ID" type="text" name="email" />

        <input class="usernamebar2" placeholder="PASSWORD" type="password" name="password"/>
    </div>

<!--     <button type="submit" class="frameContainer2">Login</button> -->
</form>




					
<!-- 					<div class="login-frame" id="frameContainer2">
						<div class="sign-up2">Login</div>
					</div>
					<div class="usernamepasswordgroup2">
						<input class="usernamebar2" placeholder="USER ID" type="text" name="userid"/>

						<input class="usernamebar2" placeholder="PASSWORD" type="text" name="password"/>
					</div> -->
					<div class="frame-parent9">
						<div class="customer-frame">
							<b class="customer2">Customer Login</b>
						</div>
						<div class="employee-frame" id="frameContainer4">
							<b class="customer2">Employee</b>
						</div>
						<div class="employee-frame" id="frameContainer5">
							<b class="customer2">Admin</b>
						</div>
					</div>
				</div>
				<div class="navigation-bar-light">
					<div class="navigation-bar"></div>
					<div class="vector-parent">
					</div>
					<button class="cougarcourier1-4-parent3" id="frameButton">
						<img
							class="cougarcourier1-4-icon6"
							alt=""
							src="./public/cougarcourier.png" />

						<b class="cougar-courier6">Cougar Courier</b>
					</button>
				</div>
			</div>
		</div>

		<script>
			var frameContainer1 = document.getElementById("frameContainer1");
			if (frameContainer1) {
				frameContainer1.addEventListener("click", function (e) {
					window.location.href = "./sign-up-page.php";
				});
			}

			var frameContainer2 = document.getElementById("frameContainer2");
			if (frameContainer2) {
				frameContainer2.addEventListener("click", function (e) {
					window.location.href = "./customer-portal-nofications-page.html";
				});
			}

			var frameContainer4 = document.getElementById("frameContainer4");
			if (frameContainer4) {
				frameContainer4.addEventListener("click", function (e) {
					window.location.href = "./employee-login-page.html";
				});
			}

			var frameContainer5 = document.getElementById("frameContainer5");
			if (frameContainer5) {
				frameContainer5.addEventListener("click", function (e) {
					window.location.href = "./admin-login-page.html";
				});
			}

			var frameButton = document.getElementById("frameButton");
			if (frameButton) {
				frameButton.addEventListener("click", function (e) {
					window.location.href = "./index.html";
				});
			}
		</script>
	</body>
</html>
