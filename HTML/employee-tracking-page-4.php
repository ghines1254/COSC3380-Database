<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./employee-tracking-page-4.css" />
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
    <div class="employee-tracking-page-4">
      <div class="minibackground1">
        <img class="image-1-icon1" alt="" src="./public/image-1@2x.png" />
      </div>
      <div class="navigation-bar-light1">
        <div class="navigation-bar1"></div>
        <div class="navigation-bar-light-child">
          <div class="rectangle-group">
            <div class="group-item"></div>
            <b class="login1">Login</b>
          </div>
        </div>
        <div class="cougarcourier1-4-group" id="frameContainer1">
          <img
            class="cougarcourier1-4-icon1"
            alt=""
            src="./public/cougarcourier1-4@2x.png"
          />

          <b class="cougar-courier1">Cougar Courier</b>
        </div>
      </div>
      <div class="portal-centering-frame">
        <div class="employee-portal-outline">
          <div class="frame-parent">
            <div class="rectangle-container">
              <div class="frame-child"></div>
              <div class="welcome-to-your-portal-page-wrapper">
                <b class="welcome-to-your">Welcome to your portal page!</b>
              </div>
            </div>
            <div class="frame-group">
              <div class="frame-wrapper">
                <div class="button2-parent">
                  <div class="button2" id="button2Container">
                    <div class="button2-child"></div>
                    <b class="delivery">Shipping</b>
                  </div>
                  <div class="button21" id="button2Container1">
                    <div class="button2-child"></div>
                    <b class="delivery">Tracking</b>
                  </div>
                  <div class="button3" id="button3Container">
                    <div class="button3-child"></div>
                    <b class="delivery">Check Out</b>
                  </div>
                  <div class="button4" id="button4Container">
                    <div class="button2-child"></div>
                    <b class="delivery">Delivery</b>
                  </div>
                  <div class="button41" id="button4Container1">
                    <div class="button2-child"></div>
                    <b class="delivery">Dependent</b>
                  </div>
                  <div class="button7" id="button7Container">
                    <div class="button2-child"></div>
                    <b class="delivery">Account</b>
                  </div>
                </div>
              </div>
              <div class="portal-page"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="tracking">
        <div class="tracking-child"></div>
      </div>
      <div class="tracking1">Tracking #:</div>
      <div class="status">Status:</div>
      <div class="group-div">
        <div class="group-inner"></div>
        <div class="at-post-office">At Post Office</div>
      </div>
      <div class="rectangle-parent1">
        <div class="group-inner"></div>
        <div class="at-post-office">En Route</div>
      </div>
      <div class="rectangle-parent2">
        <div class="group-child1"></div>
        <div class="at-post-office">Delivered</div>
      </div>
      <div class="frame" id="frameContainer8">
        <img
          class="portal-home-button"
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
            document.querySelector('.tracking1').textContent += ' ' + trackingNumber;
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
          window.location.href = "./employee-shipping-page.html";
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
          window.location.href = "./employee-portal-nofications-page.html";
        });
      }
      </script>
  </body>
</html>
