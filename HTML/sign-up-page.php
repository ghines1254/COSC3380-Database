<?php
require_once 'init.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="global.css" />
    <link rel="stylesheet" href="s-ign-up-page.css" />
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
    <form action="signupGrab.php" method="POST">
      <div class="sign-up-page">
        <div class="sign-up-page-child"></div>
        <div class="minibackground1">
          <img class="image-1-icon1" alt="" src="./public/image-11@2x.png" />
        </div>
        <div class="frame">
          <div class="new-user-signup-info">
            <div class="frame-parent">
              <div class="welcome-lets-get-started-en-parent">
                <b class="welcome-lets-get-container">
                  <span class="welcome-lets-get-container1">
                    <p class="welcome-lets-get">Welcome! Let’s get started.</p>
                    <p class="welcome-lets-get">
                      Enter your details below to create your account. Already
                      have an account?
                    </p>
                  </span>
                </b>
                <a class="log-in" id="logIn">Log in.</a>
              </div>
              <div class="frame-group">
                <div class="firstname-parent">
                  <div class="firstname">
                    <div class="firstname-child"></div>
                    <input
                      class="first-name"
                      id = "firstname"
                      name = "firstname"
                      placeholder="First Name"
                      type="text"
                      required
                    />
                  </div>
                
                  <div class="firstname">
                    <img
                      class="lastname-child"
                      alt=""
                      src="./public/rectangle-261.svg"
                    />

                    <input
                      class="middle-initial"
                      placeholder="Last Name"
                      type="text"
                      id = "lastname"
                      name = "lastname"
                      required
                    />
                  </div>
                </div>
                <div class="firstname-parent">
                  <div class="addressline1">
                    <img
                      class="addressline1-child"
                      alt=""
                      src="./public/rectangle-221.svg"
                    />

                    <input
                      class="address-line-1"
                      placeholder="Address Line 1"
                      type="text"
                      id = "address-line-1"
                      name = "address-line-1"
                      required
                    />
                  </div>
                  <div class="addressline2">
                    <img
                      class="addressline2-child"
                      alt=""
                      src="./public/rectangle-221.svg"
                    />

                    <input
                      class="address-line-2"
                      placeholder="Address Line 2"
                      type="text"
                      id = "address-line-2"
                      name = "address-line-2"
                    />
                  </div>
                </div>
                <div class="firstname-parent">
                  <div class="city">
                    <div class="city-child"></div>
                    <input class="city1" placeholder="City" type="text" id="city1" name="city1"/>
                  </div>
                  <div class="firstname">
                    <div class="state-child"></div>
                    <select class="state1" placeholder="State" type="text" id ="state" name="state" 
                    >
                      <option value="" disabled selected>Select State</option>
                      <option value="AL">AL</option>
                      <option value="AK">AK</option>
                      <option value="AR">AR</option>
                      <option value="AZ">AZ</option>
                      <option value="CA">CA</option>
                      <option value="CO">CO</option>
                      <option value="CT">CT</option>
                      <option value="DC">DC</option>
                      <option value="DE">DE</option>
                      <option value="FL">FL</option>
                      <option value="GA">GA</option>
                      <option value="HI">HI</option>
                      <option value="IA">IA</option>
                      <option value="ID">ID</option>
                      <option value="IL">IL</option>
                      <option value="IN">IN</option>
                      <option value="KS">KS</option>
                      <option value="KY">KY</option>
                      <option value="LA">LA</option>
                      <option value="MA">MA</option>
                      <option value="MD">MD</option>
                      <option value="ME">ME</option>
                      <option value="MI">MI</option>
                      <option value="MN">MN</option>
                      <option value="MO">MO</option>
                      <option value="MS">MS</option>
                      <option value="MT">MT</option>
                      <option value="NC">NC</option>
                      <option value="NE">NE</option>
                      <option value="NH">NH</option>
                      <option value="NJ">NJ</option>
                      <option value="NM">NM</option>
                      <option value="NV">NV</option>
                      <option value="NY">NY</option>
                      <option value="ND">ND</option>
                      <option value="OH">OH</option>
                      <option value="OK">OK</option>
                      <option value="OR">OR</option>
                      <option value="PA">PA</option>
                      <option value="RI">RI</option>
                      <option value="SC">SC</option>
                      <option value="SD">SD</option>
                      <option value="TN">TN</option>
                      <option value="TX">TX</option>
                      <option value="UT">UT</option>
                      <option value="VT">VT</option>
                      <option value="VA">VA</option>
                      <option value="WA">WA</option>
                      <option value="WI">WI</option>
                      <option value="WV">WV</option>
                      <option value="WY">WY</option>
                  </select>
                  </div>
                  <div class="firstname">
                    <div class="firstname-child"></div>
                    <input class="zip1" placeholder="Zip Code" type="text" id = "zip" name = "zip" required/>
                  </div>
                </div>
                <div class="firstname-parent">
                  <div class="email">
                    <img
                      class="email-child"
                      alt=""
                      src="./public/rectangle-27.svg"
                    />

                    <input class="email1" placeholder="Email" type="email" id = "email" name = "email" required/>
                  </div>
                  <div class="email">
                    <img
                      class="email-child"
                      alt=""
                      src="./public/rectangle-27.svg"
                    />

                    <input
                      class="password1"
                      placeholder="Password"
                      type="password"
                      id = "password"
                      name = "password"
                      required
                    />
                  </div>
                  <div class="email">
                    <img
                      class="email-child"
                      alt=""
                      src="./public/rectangle-27.svg"
                    />

                    <input class="password1" placeholder="Phone #" type="tel" name = "phone1" id = "phone1" required />
                  </div>
                </div>
              </div>
            </div>
            <div>
              <button type="submit">Sign Up</button>
            </div>
            
          </div>
          <div class="navigation-bar-light1">
            <div class="navigation-bar1"></div>
            <div class="navigation-bar-light-child">
              <div class="rectangle-container">
                <div class="group-inner"></div>
                <b class="login1">Login</b>
              </div>
            </div>
            <div class="cougarcourier1-4-group" id="frameContainer8">
              <img
                class="cougarcourier1-4-icon1"
                alt=""
                src="./public/cougarcourier1-4@2x.png"
              />

              <b class="cougar-courier1">Cougar Courier</b>
            </div>
          </div>
        </div>
      </div>
    </form>
    <div id="submittedValues"></div>
      <script>
        var logIn = document.getElementById("logIn");
        if (logIn) {
          logIn.addEventListener("click", function (e) {
            window.location.href = "./customer-login-page.html";
          });
        }
        
 
       var groupContainer = document.getElementById("groupContainer");
        if (groupContainer) {
          groupContainer.addEventListener("click", function (e) {
            window.location.href = "./cutomer-portal-nofications-page.html";
          });
        }
        
        var frameContainer8 = document.getElementById("frameContainer8");
        if (frameContainer8) {
          frameContainer8.addEventListener("click", function (e) {
            window.location.href = "./index.html";
          });
        }
        </script>
  </body>
</html>

