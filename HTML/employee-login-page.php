<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./employee-login-page.css" />
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
    <div class="employee-login-page">
      <div class="employee-login-page-child"></div>
      <div class="login-page-wrapper">
        <div class="login-page">
          <div class="minibackground15">
            <img class="image-1-icon15" alt="" src="./public/image-11@2x.png" />
          </div>
          <div class="login-light">
            <div class="main-shape"></div>
            <div class="forgot-user-id-or-password-parent">
              <div class="forgot-user-id">FORGOT USER ID OR PASSWORD?</div>
              <div class="line-div"></div>
            </div>
            <div class="sign-up-wrapper" id="frameContainer1">
              <div class="sign-up2">Sign Up</div>
            </div>
             <form action="employee-login-page-script.php" method="post" >
              <button type="submit" class="login-button">Login</button>
              <div class="usernamepasswordgroup">
                <input class="usernamebar" placeholder="USER ID" type="text" name="email" />
                <input class="usernamebar" placeholder="PASSWORD" type="password" name="password" />
              </div>

              </form>
            <div class="frame-parent29">
              <div class="customer-wrapper" id="frameContainer3">
                <b class="customer">Customer</b>
              </div>
              <div class="employee-wrapper">
                <b class="customer">Employee Login</b>
              </div>
              <div class="customer-wrapper" id="frameContainer5">
                <b class="customer">Admin</b>
              </div>
            </div>
          </div>
          <div class="navigation-bar-light15">
            <div class="navigation-bar15"></div>
            <div class="navigation-bar-light-inner13">
            </div>
            <button class="frame-button" id="frameButton">
              <img
                class="cougarcourier1-4-icon15"
                alt=""
                src="./public/cougarcourier1-4@2x.png"
              />

              <b class="cougar-courier15">Cougar Courier</b>
            </button>
          </div>
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
          window.location.href = "./employee-portal-nofications-page.html";
        });
      }

      var frameContainer3 = document.getElementById("frameContainer3");
      if (frameContainer3) {
        frameContainer3.addEventListener("click", function (e) {
          window.location.href = "./login-page.php";
        });
      }

      var frameContainer5 = document.getElementById("frameContainer5");
      if (frameContainer5) {
        frameContainer5.addEventListener("click", function (e) {
          window.location.href = "./admin-login-page.php";
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
