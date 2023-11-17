<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./employee-shipping-page-confimration.css" />
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
    <div class="employee-shipping-page-confimr">
      <div class="minibackground6">
        <img class="image-1-icon6" alt="" src="./public/image-1@2x.png" />
      </div>
      <div class="navigation-bar-light6">
        <div class="navigation-bar6"></div>
        <div class="navigation-bar-light-inner4">
          <div class="rectangle-parent18">
            <div class="group-child13"></div>
            <b class="login6">Login</b>
          </div>
        </div>
        <div class="cougarcourier1-4-parent4" id="frameContainer1">
          <img
            class="cougarcourier1-4-icon6"
            alt=""
            src="./public/cougarcourier1-4@2x.png"
          />

          <b class="cougar-courier6">Cougar Courier</b>
        </div>
      </div>
      <div class="portal-centering-frame5">
        <div class="employee-portal-outline5">
          <div class="frame-parent9">
            <div class="rectangle-parent19">
              <div class="frame-child3"></div>
              <div class="welcome-to-your-portal-page-wrapper3">
                <b class="welcome-to-your5">Welcome to your portal page!</b>
              </div>
            </div>
            <div class="frame-parent10">
              <div class="frame-wrapper5">
                <div class="button2-parent3">
                  <div class="button210" id="button2Container">
                    <div class="button2-child8"></div>
                    <b class="button-210">Shipping</b>
                  </div>
                  <div class="button211" id="button2Container1">
                    <div class="button2-child8"></div>
                    <b class="button-210">Tracking</b>
                  </div>
                  <div class="button35" id="button3Container">
                    <div class="button3-child3"></div>
                    <b class="button-210">Check Out</b>
                  </div>
                  <div class="button410" id="button4Container">
                    <div class="button2-child8"></div>
                    <b class="button-210">Delivery</b>
                  </div>
                  <div class="button411" id="button4Container1">
                    <div class="button2-child8"></div>
                    <b class="button-210">Dependent</b>
                  </div>
                  <div class="button75" id="button7Container">
                    <div class="button2-child8"></div>
                    <b class="button-210">Account</b>
                  </div>
                </div>
              </div>
              <div class="portal-page5"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="tracking6">
        <div class="tracking-child1"></div>
      </div>
      <div class="new-tracking">New Tracking #:    4</div>
      <div class="this-is-to-container">
        <p class="this-is-to">
          This is to confirm that the shipment has been created. The associated
          tracking receipt must now be printed and provided to the customer.
          This receipt ensures that customers can monitor their shipment's
          progress and is a testament to our transparent and customer-focused
          service.
        </p>
        <p class="please-ensure-the-tracking-rec">
          <span class="please-ensure-the">Please ensure the </span>
          <b class="tracking-receipt">tracking receipt</b>
          <span class="is-handed-to">
            is handed to the customer promptly, reinforcing our commitment to an
            exceptional shopping experience.</span
          >
        </p>
        <p class="this-is-to">Thank you for your cooperation.</p>
      </div>
      <div class="frame5" id="frameContainer8">
        <img
          class="portal-home-button5"
          alt=""
          src="./public/portal-home-button.svg"
        />
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
          window.location.href = "./employee-checkout-page.html";
        });
      }

      var button4Container = document.getElementById("button4Container");
      if (button4Container) {
        button4Container.addEventListener("click", function (e) {
          window.location.href = "./employee-delivery-page.html";
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
