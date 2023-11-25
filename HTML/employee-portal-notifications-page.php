<?php
require_once "connection.php";

  session_start();

  // Check if the user is logged in
  if (!isset($_SESSION['emp_info'])) {
      // Redirect to the login page if the user is not logged in
      header('Location: employee-login-page.php');
      exit();
  }

  $emp_info = $_SESSION['emp_info'];
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./employee-portal-nofications-page.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Lexend Deca:wght@400;500;600;700;800;900&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600;700&display=swap"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap"
    />
  </head>
  <body>
    <div class="employee-portal-nofications">
      <div class="minibackground13">
        <img class="image-1-icon13" alt="" src="./public/image-1@2x.png" />
      </div>
      <div class="navigation-bar-light13">
        <div class="navigation-bar13"></div>
        <div class="navigation-bar-light-inner11">
          <div class="rectangle-parent78">
            <div class="group-child50"></div>
            <b class="login13">Login</b>
          </div>
        </div>
        <div class="cougarcourier1-4-parent11" id="frameContainer1">
          <img
            class="cougarcourier1-4-icon13"
            alt=""
            src="./public/cougarcourier1-4@2x.png"
          />

          <b class="cougar-courier13">Cougar Courier</b>
        </div>
      </div>
      <div class="portal-centering-frame12">
        <div class="employee-portal-outline11">
          <div class="frame-parent25">
            <div class="rectangle-parent79">
              <div class="frame-child35"></div>
              <div class="welcome-to-your-portal-page-wrapper10">
                <b class="welcome-to-your12">Welcome <?php echo $emp_info['first_name'];?>!</b>
              </div>
            </div>
            <div class="frame-parent26">
              <div class="frame-wrapper13">
                <div class="button2-parent10">
                  <div class="button223" id="button2Container">
                    <div class="button2-child21"></div>
                    <b class="button-223">Shipping</b>
                  </div>
                  <div class="button224" id="button2Container1">
                    <div class="button2-child21"></div>
                    <b class="button-223">Tracking</b>
                  </div>
                  <div class="button312" id="button3Container">
                    <div class="button3-child10"></div>
                    <b class="button-223">Check Out</b>
                  </div>
                  <div class="button423" id="button4Container">
                    <div class="button2-child21"></div>
                    <b class="button-223">Delivery</b>
                  </div>
                  <div class="button424" id="button4Container1">
                    <div class="button2-child21"></div>
                    <b class="button-223">Dependent</b>
                  </div>
                  <div class="button712" id="button7Container">
                    <div class="button2-child21"></div>
                    <b class="button-223">Account</b>
                  </div>
                </div>
              </div>
              <div class="portal-page12"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="notification-center-group">
        <b class="notification-center1">Notification Center:</b>
        <div class="notification-component8">
          <div class="rectangle-parent80">
            <div class="frame-child35"></div>
            <img class="vector-icon29" alt="" src="./public/vector13.svg" />

            <b class="notification-summary8">Notification Summary</b>
          </div>
          <div class="parent6">
            <b class="b8">12:00</b>
            <div class="frame-child37"></div>
          </div>
        </div>
        <div class="notification-component8">
          <div class="rectangle-parent80">
            <div class="frame-child35"></div>
            <img class="vector-icon29" alt="" src="./public/vector13.svg" />

            <b class="notification-summary8">Notification Summary</b>
          </div>
          <div class="parent6">
            <b class="b8">12:00</b>
            <div class="frame-child37"></div>
          </div>
        </div>
        <div class="notification-component8">
          <div class="rectangle-parent80">
            <div class="frame-child35"></div>
            <img class="vector-icon29" alt="" src="./public/vector13.svg" />

            <b class="notification-summary8">Notification Summary</b>
          </div>
          <div class="parent6">
            <b class="b8">12:00</b>
            <div class="frame-child37"></div>
          </div>
        </div>
        <div class="notification-component8">
          <div class="rectangle-parent80">
            <div class="frame-child35"></div>
            <img class="vector-icon29" alt="" src="./public/vector13.svg" />

            <b class="notification-summary8">Notification Summary</b>
          </div>
          <div class="parent6">
            <b class="b8">12:00</b>
            <div class="frame-child37"></div>
          </div>
        </div>
        <div class="notification-component8">
          <div class="rectangle-parent80">
            <div class="frame-child35"></div>
            <img class="vector-icon29" alt="" src="./public/vector13.svg" />

            <b class="notification-summary8">Notification Summary</b>
          </div>
          <div class="parent6">
            <b class="b8">12:00</b>
            <div class="frame-child37"></div>
          </div>
        </div>
        <div class="notification-component8">
          <div class="rectangle-parent80">
            <div class="frame-child35"></div>
            <img class="vector-icon29" alt="" src="./public/vector13.svg" />

            <b class="notification-summary8">Notification Summary</b>
          </div>
          <div class="parent6">
            <b class="b8">12:00</b>
            <div class="frame-child37"></div>
          </div>
        </div>
        <div class="notification-component8">
          <div class="rectangle-parent80">
            <div class="frame-child35"></div>
            <img class="vector-icon29" alt="" src="./public/vector13.svg" />

            <b class="notification-summary8">Notification Summary</b>
          </div>
          <div class="parent6">
            <b class="b8">12:00</b>
            <div class="frame-child37"></div>
          </div>
        </div>
        <div class="notification-component8">
          <div class="rectangle-parent80">
            <div class="frame-child35"></div>
            <img class="vector-icon29" alt="" src="./public/vector13.svg" />

            <b class="notification-summary8">Notification Summary</b>
          </div>
          <div class="parent6">
            <b class="b8">12:00</b>
            <div class="frame-child37"></div>
          </div>
        </div>
      </div>
    </div>

    <script>
      var frameContainer1 = document.getElementById("frameContainer1");
      if (frameContainer1) {
        frameContainer1.addEventListener("click", function (e) {
          window.location.href = "./index.php";
        });
      }

      var button2Container = document.getElementById("button2Container");
      if (button2Container) {
        button2Container.addEventListener("click", function (e) {
          window.location.href = "./employee-shipping-page.php";
        });
      }

      var button2Container1 = document.getElementById("button2Container1");
      if (button2Container1) {
        button2Container1.addEventListener("click", function (e) {
          window.location.href = "./employee-tracking-page.php";
        });
      }

      var button3Container = document.getElementById("button3Container");
      if (button3Container) {
        button3Container.addEventListener("click", function (e) {
          window.location.href = "./employee-checkout-page.php";
        });
      }

      var button4Container = document.getElementById("button4Container");
      if (button4Container) {
        button4Container.addEventListener("click", function (e) {
          window.location.href = "./employee-delivery-page.php";
        });
      }

      var button4Container1 = document.getElementById("button4Container1");
      if (button4Container1) {
        button4Container1.addEventListener("click", function (e) {
          window.location.href = "./employee-dependent-page.html";
        });
      }

      var button7Container = document.getElementById("button7Container");
      if (button7Container) {
        button7Container.addEventListener("click", function (e) {
          window.location.href = "./employee-account-page.html";
        });
      }
      </script>
  </body>
</html>
