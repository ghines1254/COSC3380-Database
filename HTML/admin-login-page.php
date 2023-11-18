<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./admin-login-page.css" />
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
    <div class="admin-login-page">
      <div class="admin-login-page-child"></div>
      <div class="login-page-container">
        <div class="login-page1">
          <div class="minibackground23">
            <img class="image-1-icon23" alt="" src="./public/image-11@2x.png" />
          </div>
          <div class="login-light1">
            <div class="main-shape1"></div>
            <div class="forgot-user-id-or-password-group">
              <div class="forgot-user-id1">FORGOT USER ID OR PASSWORD?</div>
              <div class="frame-child59"></div>
            </div>
            <div class="sign-up-container" id="frameContainer1">
              <div class="sign-up3">Sign Up</div>
            </div>


            <form action="admin-login-page-script.php" method="post">
              <div class="login-container"><button type="submit" class="login-button">Login</button></div>
              <div class="usernamepasswordgroup1">
                  <input class="usernamebar1" placeholder="USER ID" type="text" name="adminEmail" />
                  <input class="usernamebar1" placeholder="PASSWORD" type="password" name="adminPassword" />
              </div>
            </form>
            <div class="frame-parent44">
              <div class="customer-container" id="frameContainer3">
                <b class="customer1">Customer</b>
              </div>
              <div class="customer-container" id="frameContainer4">
                <b class="customer1">Employee</b>
              </div>
              <div class="admin-container">
                <b class="customer1">Admin Login</b>
              </div>
            </div>
          </div>
          <div class="navigation-bar-light23">
            <div class="navigation-bar23"></div>
            <div class="navigation-bar-light-inner22">
            </div>
            <button class="cougarcourier1-4-parent20" id="frameButton">
              <img
                class="cougarcourier1-4-icon23"
                alt=""
                src="./public/cougarcourier1-4@2x.png"
              />

              <b class="cougar-courier23">Cougar Courier</b>
            </button>
          </div>
        </div>
      </div>
    </div>

    <script>
      var frameContainer1 = document.getElementById("frameContainer1");
      if (frameContainer1) {
        frameContainer1.addEventListener("click", function (e) {
          window.location.href = "./s-ign-up-page.html";
        });
      }

      var frameContainer2 = document.getElementById("frameContainer2");
      if (frameContainer2) {
        frameContainer2.addEventListener("click", function (e) {
          window.location.href = "./admin-portal-nofications-page.html";
        });
      }

      var frameContainer3 = document.getElementById("frameContainer3");
      if (frameContainer3) {
        frameContainer3.addEventListener("click", function (e) {
          window.location.href = "./login-page.php";
        });
      }

      var frameContainer4 = document.getElementById("frameContainer4");
      if (frameContainer4) {
        frameContainer4.addEventListener("click", function (e) {
          window.location.href = "./employee-login-page.php";
        });
      }

      var frameButton = document.getElementById("frameButton");
      if (frameButton) {
        frameButton.addEventListener("click", function (e) {
          window.location.href = "./index.php";
        });
      }
      </script>
  </body>
</html>
