<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./employee-tracking-page-2.css" />
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
    <div class="employee-tracking-page-2">
      <div class="minibackground3">
        <img class="image-1-icon3" alt="" src="./public/image-1@2x.png" />
      </div>
      <div class="navigation-bar-light3">
        <div class="navigation-bar3"></div>
        <div class="navigation-bar-light-inner1">
          <div class="rectangle-parent8">
            <div class="group-child6"></div>
            <b class="login3">Login</b>
          </div>
        </div>
        <div class="cougarcourier1-4-parent1" id="frameContainer1">
          <img
            class="cougarcourier1-4-icon3"
            alt=""
            src="./public/cougarcourier1-4@2x.png"
          />

          <b class="cougar-courier3">Cougar Courier</b>
        </div>
      </div>
      <div class="portal-centering-frame2">
        <div class="employee-portal-outline2">
          <div class="frame-parent2">
            <div class="rectangle-parent9">
              <div class="frame-inner"></div>
              <div class="welcome-to-your-portal-page-frame">
                <b class="welcome-to-your2">Welcome to your portal page!</b>
              </div>
            </div>
            <div class="frame-parent3">
              <div class="frame-wrapper2">
                <div class="button2-container">
                  <div class="button24" id="button2Container">
                    <div class="button7-inner"></div>
                    <b class="button-24">Shipping</b>
                  </div>
                  <div class="button25" id="button2Container1">
                    <div class="button7-inner"></div>
                    <b class="button-24">Tracking</b>
                  </div>
                  <div class="button32" id="button3Container">
                    <div class="button3-inner"></div>
                    <b class="button-24">Check Out</b>
                  </div>
                  <div class="button44" id="button4Container">
                    <div class="button7-inner"></div>
                    <b class="button-24">Delivery</b>
                  </div>
                  <div class="button45" id="button4Container1">
                    <div class="button7-inner"></div>
                    <b class="button-24">Dependent</b>
                  </div>
                  <div class="button72" id="button7Container">
                    <div class="button7-inner"></div>
                    <b class="button-24">Account</b>
                  </div>
                </div>
              </div>
              <div class="portal-page2"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="group-parent">
        <div class="rectangle-parent10">
          <div class="group-child7"></div>
          <div class="delivered2">Delivered</div>
        </div>
        <div class="tracking4">
          <div class="tracking-inner"></div>
        </div>
        <div class="rectangle-parent11">
          <div class="group-child8"></div>
          <div class="delivered2">At Post Office</div>
        </div>
        <div class="rectangle-parent12">
          <div class="group-child7"></div>
          <div class="delivered2">En Route</div>
        </div>
        <div class="status2">Status:</div>
        <div class="tracking5">Tracking #:</div>
      </div>
      <div class="frame2" id="frameContainer8">
        <img
          class="portal-home-button2"
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
            document.querySelector('.tracking5').textContent += ' ' + trackingNumber;
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
