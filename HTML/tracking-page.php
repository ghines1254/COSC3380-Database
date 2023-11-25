<?php
require_once 'init.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="global.css" />
    <link rel="stylesheet" href="tracking-page.css" />
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
    <div class="tracking-page">
      <div class="tracking-page-child"></div>
      <div class="minibackground122">
        <img class="image-1-icon122" alt="" src="./public/image-12@2x.png" />
      </div>
      <div class="navigation-bar-light34">
        <div class="navigation-bar34"></div>
        <div class="navigation-bar-light-inner33">
          <div class="rectangle-parent166">
            <div class="group-child106"></div>
            <b class="login37">Login</b>
          </div>
        </div>
        <div class="cougarcourier1-4-parent31" id="frameContainer1">
          <img
            class="cougarcourier1-4-icon34"
            alt=""
            src="./public/cougarcourier1-4@2x.png"
          />

          <b class="cougar-courier34">Cougar Courier</b>
        </div>
      </div>
      <div class="portal-centering-frame22">
        <div class="customer-portal-outline9">
          <div class="frame-parent76">
            <div class="rectangle-parent167">
              <div class="frame-child84"></div>
              <div class="welcome-to-your-portal-page-wrapper27">
                <b class="welcome-to-your29">Tracking Packages</b>
              </div>
            </div>
            <div class="frame-parent77">
              <div class="frame-wrapper30">
                <div class="tracking-parent7">
                  <div class="tracking23">
                    <div class="tracking-child15"></div>
                    <b class="button-250">Tracking</b>
                  </div>
                  <div class="button241" id="button2Container">
                    <div class="tracking-child15"></div>
                    <b class="button-250">Notifications</b>
                  </div>
                  <div class="products9" id="productsContainer">
                    <div class="products-child7"></div>
                    <b class="button-329" id="button3Text">Products</b>
                  </div>
                  
                  <div class="support9" id="supportContainer">
                    <div class="tracking-child15"></div>
                    <b class="button-250">Support</b>
                  </div>
                  <div class="history9" id="historyContainer">
                    <div class="tracking-child15"></div>
                    <b class="button-250">History</b>
                  </div>
                  <div class="account10" id="accountContainer">
                    <div class="tracking-child15"></div>
                    <b class="button-250">Account</b>
                  </div>
                </div>
              </div>
              <div class="portal-page29"></div>
            </div>
          </div>
        </div>
        <div class="frame-frame">
          <div class="frame91">
            <div class="tracking-outline1">
              <div class="begin-tracking-here-easily-mon-wrapper">
                <div class="begin-tracking-here-container2">
                  <span class="begin-tracking-here-container3">
                    <p class="begin-tracking-here1">Begin Tracking Here</p>
                    <p class="easily-monitor-all1">
                      Easily monitor all your shipments in one convenient place.
                    </p>
                  </span>
                </div>
              </div>
              <div class="enter-your-cougar1">
                Enter your Cougar tracking #:
              </div>
              <div class="cool-text-field4">
                <input
                   class="text-field2" placeholder="Tracking #" type="text" id="trackingInput" />

              </div>



<div class="rectangle-parent168">
    <button class="track2 group-child107" id="trackButton">
        Track
    </button>
</div>




                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="frame92" id="frameContainer11">
          <img
            class="portal-home-button20"
            alt=""
            src="./public/portal-home-button.svg"
          />
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
          window.location.href = "./customer-portal-nofications-page.php";
        });
      }

      var button3Text = document.getElementById("button3Text");
      if (button3Text) {
        button3Text.addEventListener("click", function (e) {
          window.location.href = "./products-page.html";
        });
      }

      var productsContainer = document.getElementById("productsContainer");
      if (productsContainer) {
        productsContainer.addEventListener("click", function (e) {
          window.location.href = "./products-page.html";
        });
      }

      var supportContainer = document.getElementById("supportContainer");
      if (supportContainer) {
        supportContainer.addEventListener("click", function (e) {
          window.location.href = "./support-page.html";
        });
      }

      var historyContainer = document.getElementById("historyContainer");
      if (historyContainer) {
        historyContainer.addEventListener("click", function (e) {
          window.location.href = "./history-page.php";
        });
      }

      var accountContainer = document.getElementById("accountContainer");
      if (accountContainer) {
        accountContainer.addEventListener("click", function (e) {
          window.location.href = "./account-page.php";
        });
      }

      var frameContainer11 = document.getElementById("frameContainer11");
      if (frameContainer11) {
        frameContainer11.addEventListener("click", function (e) {
          window.location.href = "./customer-portal-nofications-page.php";
        });
      }
// tracking stuff
document.getElementById('trackButton').addEventListener('click', function() {
    var trackingNumber = document.getElementById('trackingInput').value;
    fetch('https://coogmail.com/tracking.php?tracking_number=' + encodeURIComponent(trackingNumber))
    .then(response => response.json())
    .then(data => {
        // If the response contains a valid status, redirect to the history page
        if (data.status) {
            window.location.href = "./package_history.php?tracking_number=" + encodeURIComponent(trackingNumber);
        } else {
            alert('Invalid tracking number');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while tracking the package.');
    });
});



      </script>
  </body>
</html>
