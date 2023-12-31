<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./employee-tracking-page-3.css" />
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
    <div class="employee-tracking-page-3">
      <div class="minibackground2">
        <img class="image-1-icon2" alt="" src="./public/image-1@2x.png" />
      </div>
      <div class="navigation-bar-light2">
        <div class="navigation-bar2"></div>
        <div class="frame-div">
          <div class="rectangle-parent3">
            <div class="group-child2"></div>
            <b class="login2">Login</b>
          </div>
        </div>
        <div class="cougarcourier1-4-container" id="frameContainer1">
          <img
            class="cougarcourier1-4-icon2"
            alt=""
            src="./public/cougarcourier1-4@2x.png"
          />

          <b class="cougar-courier2">Cougar Courier</b>
        </div>
      </div>
      <div class="portal-centering-frame1">
        <div class="employee-portal-outline1">
          <div class="frame-container">
            <div class="rectangle-parent4">
              <div class="frame-item"></div>
              <div class="welcome-to-your-portal-page-container">
                <b class="welcome-to-your1">Welcome to your portal page!</b>
              </div>
            </div>
            <div class="frame-parent1">
              <div class="frame-wrapper1">
                <div class="button2-group">
                  <div class="button22" id="button2Container">
                    <div class="button2-inner"></div>
                    <b class="button-22">Shipping</b>
                  </div>
                  <div class="button23" id="button2Container1">
                    <div class="button2-inner"></div>
                    <b class="button-22">Tracking</b>
                  </div>
                  <div class="button31" id="button3Container">
                    <div class="button3-item"></div>
                    <b class="button-22">Check Out</b>
                  </div>
                  <div class="button42" id="button4Container">
                    <div class="button2-inner"></div>
                    <b class="button-22">Delivery</b>
                  </div>
                  <div class="button43" id="button4Container1">
                    <div class="button2-inner"></div>
                    <b class="button-22">Dependent</b>
                  </div>
                  <div class="button71" id="button7Container">
                    <div class="button2-inner"></div>
                    <b class="button-22">Account</b>
                  </div>
                </div>
              </div>
              <div class="portal-page1"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="tracking2">
        <div class="tracking-item"></div>
      </div>
      <div class="tracking3">Tracking #:</div>
      <div class="status1">Status:</div>
      <div class="rectangle-parent5">
        <div class="group-child3"></div>
        <div class="at-post-office1">At Post Office</div>
      </div>
      <div class="rectangle-parent6">
        <div class="group-child4"></div>
        <div class="at-post-office1">En Route</div>
      </div>
      <div class="rectangle-parent7">
        <div class="group-child3"></div>
        <div class="at-post-office1">Delivered</div>
      </div>
      <div class="frame1" id="frameContainer8">
        <img
          class="portal-home-button1"
          alt=""
          src="./public/portal-home-button.svg"
        />
      </div>
    </div>

    <script>


//test
    document.addEventListener('DOMContentLoaded', function() {
        const params = new URLSearchParams(window.location.search);
        const trackingNumber = params.get('tracking_number');
        if (trackingNumber) {
            document.querySelector('.tracking3').textContent += ' ' + trackingNumber;
        }
    });




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

      var frameContainer8 = document.getElementById("frameContainer8");
      if (frameContainer8) {
        frameContainer8.addEventListener("click", function (e) {
          window.location.href = "./employee-portal-notifications-page.php";
        });
      }
      </script>
  </body>
</html>
