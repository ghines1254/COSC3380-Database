<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./employee-shipping-page.css" />
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
    <div class="employee-shipping-page">
      <div class="minibackground11">
        <img class="image-1-icon11" alt="" src="./public/image-1@2x.png" />
      </div>
      <div class="navigation-bar-light11">
        <div class="navigation-bar11"></div>
        <div class="navigation-bar-light-inner9">
          <div class="rectangle-parent65">
            <div class="group-child47"></div>
            <b class="login11">Login</b>
          </div>
        </div>
        <div class="cougarcourier1-4-parent9" id="frameContainer1">
          <img
            class="cougarcourier1-4-icon11"
            alt=""
            src="./public/cougarcourier1-4@2x.png"
          />

          <b class="cougar-courier11">Cougar Courier</b>
        </div>
      </div>
      <div class="portal-centering-frame10">
        <div class="employee-portal-outline10">
          <div class="frame-parent20">
            <div class="rectangle-parent66">
              <div class="frame-child17"></div>
              <div class="welcome-to-your-portal-page-wrapper8">
                <b class="welcome-to-your10">Shipping Center</b>
              </div>
            </div>
            <div class="frame-parent21">
              <div class="frame-wrapper10">
                <div class="button2-parent8">
                  <div class="button220" id="button2Container">
                    <div class="button2-child18"></div>
                    <b class="button-220">Shipping</b>
                  </div>
                  <div class="button221" id="button2Container1">
                    <div class="button2-child18"></div>
                    <b class="button-220">Tracking</b>
                  </div>
                  <div class="button310" id="button3Container">
                    <div class="button3-child8"></div>
                    <b class="button-220">Check Out</b>
                  </div>
                  <div class="button420" id="button4Container">
                    <div class="button2-child18"></div>
                    <b class="button-220">Delivery</b>
                  </div>
                  <div class="button421" id="button4Container1">
<!--                     <div class="button2-child18"></div> -->
                    <b class="button-220">Dependent</b>
                  </div>
                  <div class="button710" id="button7Container">
<!--                     <div class="button2-child18"></div> -->
                    <b class="button-220">Account</b>
                  </div>
                </div>
              </div>
              <div class="portal-page10"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="frame10" id="frameContainer8">
        <img
          class="portal-home-button10"
          alt=""
          src="./public/portal-home-button.svg"
        />
      </div>
      <div class="frame-parent22">
<!-- Sender Information -->
        <form action="employee-shipping-page-script.php" method="POST">
<div class="sender-info-parent">
    <div class="sender-info">Sender Info</div>
    <div class="firstname-container">
        <!-- First Name -->
        <div class="firstname2">
            <div class="firstname-inner"></div>
            <input class="first-name2" placeholder="First Name" type="text" name="first_name" />
        </div>
        <!-- Middle Initial -->
        <div class="middleinitial2">
            <div class="middleinitial-inner"></div>
            <input class="middle-initial2" placeholder="Middle Initial" type="text" name="middle_initial" />
        </div>
        <!-- Last Name -->
        <div class="middleinitial2">
            <img class="lastname-inner" alt="" src="./public/rectangle-26.svg" />
            <input class="last-name2" placeholder="Last Name" type="text" name="last_name" />
        </div>
    </div>
    <div class="firstname-container">
        <!-- Address Line 1 -->
        <div class="addressline11">
            <img class="addressline1-item" alt="" src="./public/rectangle-22.svg" />
            <input class="address-line-11" placeholder="Address Line 1" type="text" name="street_address_1" />
        </div>
        <!-- Address Line 2 -->
        <div class="addressline11">
            <img class="addressline1-item" alt="" src="./public/rectangle-22.svg" />
            <input class="address-line-21" placeholder="Address Line 2" type="text" name="street_address_2" />
        </div>
    </div>
    <div class="firstname-container">
        <!-- City -->
        <div class="city2">
            <div class="city-item"></div>
            <input class="city3" placeholder="City" type="text" name="city" />
        </div>
        <!-- State -->
        <div class="state2">
            <div class="state-item"></div>
            <input class="state3" placeholder="State" type="text" name="state" />
        </div>
        <!-- Zip Code -->
        <div class="zip2">
            <div class="zip-item"></div>
            <input class="zip3" placeholder="Zip Code" type="text" name="zip" />
        </div>
    </div>
    <div class="firstname-container">
        <!-- Email -->
        <div class="email2">
            <img class="email-item" alt="" src="./public/rectangle-27.svg" />
            <input class="email3" placeholder="Email" type="email" name="email" />
        </div>
        <!-- Phone Number -->
        <div class="email2">
            <img class="email-item" alt="" src="./public/rectangle-27.svg" />
            <input class="phone3" placeholder="Phone #" type="tel" name="customer_phone" />
        </div>
    </div>
</div>

<!-- Receiver Information -->
<div class="receiver-info-parent">
    <div class="receiver-info">Receiver Info</div>
    <div class="firstname-container">
        <!-- First Name -->
        <div class="firstname2">
            <div class="firstname-inner"></div>
            <input class="first-name3" placeholder="First Name" type="text" name="fname" />
        </div>
        <!-- Middle Initial -->
        <div class="middleinitial2">
            <div class="middleinitial-inner"></div>
            <input class="middle-initial3" placeholder="Middle Initial" type="text" name="receiver_middle_initial" />
        </div>
        <!-- Last Name -->
        <div class="middleinitial2">
            <img class="lastname-inner" alt="" src="./public/rectangle-26.svg" />
            <input class="last-name3" placeholder="Last Name" type="text" name="lname" />
        </div>
    </div>
    <div class="firstname-container">
        <!-- Address Line 1 -->
        <div class="addressline11">
            <img class="addressline1-item" alt="" src="./public/rectangle-22.svg" />
            <input class="address-line-12" placeholder="Address Line 1" type="text" name="address_line_1" />
        </div>
        <!-- Address Line 2 -->
        <div class="addressline11">
            <img class="addressline1-item" alt="" src="./public/rectangle-22.svg" />
            <input class="address-line-22" placeholder="Address Line 2" type="text" name="address_line_2" />
        </div>
    </div>
    <div class="firstname-container">
        <!-- City -->
        <div class="city2">
            <div class="city-item"></div>
            <input class="city5" placeholder="City" type="text" name="receiver_city" />
        </div>
        <!-- State -->
        <div class="state2">
            <div class="state-item"></div>
            <input class="state5" placeholder="State" type="text" name="receiver_state" />
        </div>
        <!-- Zip Code -->
        <div class="city2">
            <div class="city-item"></div>
            <input class="zip5" placeholder="Zip Code" type="text" name="zip_code" />
        </div>
    </div>
    <div class="firstname-container">
        <!-- Email -->
        <div class="email2">
            <img class="email-item" alt="" src="./public/rectangle-27.svg" />
            <input class="email5" placeholder="Email" type="email" name="receiver_email" />
        </div>
        <!-- Phone Number -->
        <div class="email2">
            <img class="email-item" alt="" src="./public/rectangle-27.svg" />
            <input class="phone5" placeholder="Phone #" type="tel" name="receiver_phone" />
        </div>
    </div>
</div>
          <div class="submit-container">
    <button type="submit" class="submit-button" style="position: absolute; bottom: 10%; left: 40%; transform: translate(-50%, -50%);">Submit</button>
</div>
          </form>

<!--         <div class="vector-container">
          <img class="vector-icon17" alt="" src="./public/vector9.svg" />

          <button class="large-box1">Large Box</button>
          <img class="vector-icon18" alt="" src="./public/vector10.svg" />

          <img class="vector-icon19" alt="" src="./public/vector11.svg" />

          <button class="small-box1">Small Box</button>
          <button class="medium-box1">Medium Box</button>
          <button class="envelope1">Envelope</button>
          <img class="vector-icon20" alt="" src="./public/vector12.svg" /> -->
        </div>
        <div class="select-one">
<!--           <p class="select-one1">Select one</p> -->
        </div>
<!--         <div class="rectangle-parent67" id="groupContainer1">
          <div class="group-child48"></div>
          <div class="submit">
            <p class="select-one1">Submit</p> -->
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

      var frameContainer8 = document.getElementById("frameContainer8");
      if (frameContainer8) {
        frameContainer8.addEventListener("click", function (e) {
          window.location.href = "./employee-portal-notifications-page.php";
        });
      }

      // var groupContainer1 = document.getElementById("groupContainer1");
      // if (groupContainer1) {
      //   groupContainer1.addEventListener("click", function (e) {
      //     window.location.href = "./employee-shipping-page-confirmation.php";
      //   });
      // }
      </script>
  </body>
</html>
