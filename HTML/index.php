<?php
require_once 'init.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Cougar Courier</title>
		<link rel="icon" type="image/x-icon" href="/images/coogpawfavicon.png" />
		<link rel="icon" type="image/x-icon" href="/images/coogpawfavicon.png" />
		<meta charset="utf-8" />
		<meta name="viewport" content="initial-scale=1, width=device-width" />

		<link rel="stylesheet" href="global.css" />
		<link rel="stylesheet" href="index.css" />
		<link
			rel="stylesheet"
			href="https://fonts.googleapis.com/css2?family=Lexend Deca:wght@400;500;600;700;800;900&display=swap" />
		<link
			rel="stylesheet"
			href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600&display=swap" />
	</head>
	<body>
		<div class="home-page">
			<div class="home-page-child"></div>
			<div class="minibackground-parent">
				<div class="minibackground">
					<img class="image-1-icon" alt="" src="./public/background.png" />
				</div>
				<div class="homepage-scroll">
					<div class="welcome-to-cougar-container">
						<p class="blank-line">&nbsp;</p>
						<p class="blank-line">&nbsp;</p>
						<p class="welcome-to-cougar">Welcome to Cougar Courier!</p>
						<p class="blank-line">&nbsp;</p>
						<p class="mission-statement">Mission Statement:</p>
						<p class="blank-line">&nbsp;</p>
						<p class="blank-line">
							At Cougar Courier, we believe in the power of community. As your University
							of Houston Post Office, we are committed to weaving the fabric of our neighborhood
							tighter, one letter, one parcel, one smile at a time. Guided by the
							spirit of our Cougar mascot, we pledge to provide prompt,
							reliable, and personal postal services, ensuring that every piece of mail
							bridges hearts and nurtures connections.
						</p>
						<p class="blank-line">&nbsp;</p>
						<p class="mission-statement">Please Log In to Continue</p>
						<div class="rectangle-parent" id="groupContainer">
							<div class="group-child"></div>
							<b class="login">Login</b>
						</div>
						<p class="blank-line">&nbsp;</p>
						<p class="blank-line">
							
						</p>
						<p class="blank-line">&nbsp;</p>
						<p class="blank-line">
							
						</p>
					</div>
				</div>
				<div class="navigation-bar-light">
					<div class="navigation-bar"></div>
					<div class="vector-parent">
					</div>
					<div class="cougarcourier1-4-parent">
						<img
							class="cougarcourier1-4-icon"
							alt=""
							src="./public/cougarcourier.png" />

						<b class="cougar-courier">Cougar Courier</b>
					</div>
				</div>
			</div>
		</div>

		<script>
			var groupContainer = document.getElementById("groupContainer");
			if (groupContainer) {
				groupContainer.addEventListener("click", function (e) {
					window.location.href = "./login-page.php";
				});
			}
		</script>
	</body>
</html>
