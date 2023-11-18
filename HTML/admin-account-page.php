<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./admin-account-page.css" />
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
    <div class="admin-account-page">
      <div class="admin-account-page-child"></div>
      <div class="minibackground18">
        <img class="image-1-icon18" alt="" src="./public/image-12@2x.png" />
      </div>
      <div class="navigation-bar-light18">
        <div class="navigation-bar18"></div>
        <div class="navigation-bar-light-inner17">
          <div class="rectangle-parent99">
            <div class="group-child60"></div>
            <b class="login19">Login</b>
          </div>
        </div>
        <div class="cougarcourier1-4-parent15" id="frameContainer1">
          <img
            class="cougarcourier1-4-icon18"
            alt=""
            src="./public/cougarcourier1-4@2x.png"
          />

          <b class="cougar-courier18">Cougar Courier</b>
        </div>
      </div>
      <div class="admin-portal-outline3">
        <div class="frame-parent33">
          <div class="rectangle-parent100">
            <div class="frame-child54"></div>
            <div class="welcome-to-your-portal-page-wrapper13">
              <b class="welcome-to-your15">Account Information</b>
            </div>
          </div>
          <div class="frame-parent34">
            <div class="frame-wrapper16">
              <div class="button2-parent13">
                <div class="button227" id="button2Container">
                  <div class="button2-child25"></div>
                  <b class="button-227">PO Locations</b>
                </div>
                <div class="button315" id="button3Container">
                  <div class="button3-child13"></div>
                  <b class="button-227">Products</b>
                </div>
                <div class="button427" id="button4Container">
                  <div class="button2-child25"></div>
                  <b class="button-227">Departments</b>
                </div>
                <div class="button53" id="button5Container">
                  <div class="button2-child25"></div>
                  <b class="button-227">Employees</b>
                </div>
                <div class="button715">
                  <div class="button2-child25"></div>
                  <b class="button-227">Account</b>
                </div>
              </div>
            </div>
            <div class="portal-page15"></div>
          </div>
        </div>
      </div>
      <div class="account-outline1">
        <div class="account-outline-inner"></div>
        <div class="frame-parent35">
          <div class="firstname-parent3">
            <div class="firstname5">
              <div class="firstname-child3"></div>
              <input class="first-name5" placeholder="First Name" type="text" />
            </div>
            <div class="middleinitial5">
              <div class="middleinitial-child3"></div>
              <input
                class="middle-initial5"
                placeholder="Middle Initial"
                type="text"
              />
            </div>
            <div class="middleinitial5">
              <img
                class="lastname-child2"
                alt=""
                src="./public/rectangle-26.svg"
              />

              <input class="last-name5" placeholder="Last Name" type="text" />
            </div>
          </div>
          <div class="firstname-parent3">
            <div class="addressline14">
              <img
                class="addressline1-child2"
                alt=""
                src="./public/rectangle-22.svg"
              />

              <input
                class="address-line-14"
                placeholder="Address Line 1"
                type="text"
              />
            </div>
            <div class="addressline14">
              <img
                class="addressline1-child2"
                alt=""
                src="./public/rectangle-22.svg"
              />

              <input
                class="address-line-24"
                placeholder="Address Line 2"
                type="text"
              />
            </div>
          </div>
          <div class="firstname-parent3">
            <div class="city8">
              <div class="city-child2"></div>
              <input class="city9" placeholder="City" type="text" />
            </div>
            <div class="state8">
              <div class="state-child2"></div>
              <input class="state9" placeholder="State" type="text" />
            </div>
            <div class="zip8">
              <div class="zip-child2"></div>
              <input class="zip9" placeholder="Zip Code" type="text" />
            </div>
          </div>
          <div class="firstname-parent3">
            <div class="email8">
              <img
                class="email-child2"
                alt=""
                src="./public/rectangle-271.svg"
              />

              <input class="email9" placeholder="Email" type="email" />
            </div>
            <div class="email8">
              <img
                class="email-child2"
                alt=""
                src="./public/rectangle-271.svg"
              />

              <input class="phone9" placeholder="Phone #" type="tel" />
            </div>
          </div>
        </div>
        <div class="to-update-your1">
          To update your account info, just click 'Save'
        </div>
        <div class="rectangle-parent101">
          <div class="group-child61"></div>
          <div class="save4">
            <p class="save5">Save</p>
          </div>
        </div>
        <b class="customer-id2">Employee ID:</b>
        <div class="account-outline-child1"></div>
      </div>
      <img
        class="vector-icon41"
        alt=""
        src="./public/portal-home-button.svg"
        id="vector"
      />
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
          window.location.href = "./admin-p-o-locations.html";
        });
      }

      var button3Container = document.getElementById("button3Container");
      if (button3Container) {
        button3Container.addEventListener("click", function (e) {
          window.location.href = "./admin-products-page.html";
        });
      }

      var button4Container = document.getElementById("button4Container");
      if (button4Container) {
        button4Container.addEventListener("click", function (e) {
          window.location.href = "./admin-departments-page.html";
        });
      }

      var button5Container = document.getElementById("button5Container");
      if (button5Container) {
        button5Container.addEventListener("click", function (e) {
          window.location.href = "./admin-employees-page.php";
        });
      }

      var vector = document.getElementById("vector");
      if (vector) {
        vector.addEventListener("click", function (e) {
          window.location.href = "./admin-portal-nofications-page.html";
        });
      }
      </script>
  </body>
</html>
