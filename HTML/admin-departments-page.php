<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./admin-departments-page.css" />
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
    <div class="admin-departments-page">
      <div class="admin-departments-page-child"></div>
      <div class="minibackground1">
        <img class="image-1-icon1" alt="" src="./public/image-12@2x.png" />


<!-- Centered Generate Report Form -->
        <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
            <form method="post" action="admin-departments-page.php" style="text-align: center;">
                <input type="submit" name="generate_report" value="Generate Report">
            </form>
        </div>

        <!-- Placeholder for Employee Data Display -->
        <div class="employee-data-report">
            <!-- Employee data will be displayed here after clicking Generate Report -->
        </div>


        
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
      <div class="admin-portal-outline">
        <div class="frame-parent">
          <div class="rectangle-container">
            <div class="frame-child"></div>
            <div class="welcome-to-your-portal-page-wrapper">
              <b class="welcome-to-your">Departments</b>
            </div>
          </div>
          <div class="frame-group">
            <div class="frame-wrapper">
              <div class="button2-parent">
                <div class="button2" id="button2Container">
                  <div class="button2-child"></div>
                  <b class="departments">PO Locations</b>
                </div>
                <div class="button3" id="button3Container">
                  <div class="button3-child"></div>
                  <b class="departments">Products</b>
                </div>
                <div class="button4">
                  <div class="button2-child"></div>
                  <b class="departments">Departments</b>
                </div>
                <div class="button5" id="button5Container">
                  <div class="button2-child"></div>
                  <b class="departments">Employees</b>
                </div>
                <div class="button7" id="button7Container">
                  <div class="button2-child"></div>
                  <b class="departments">Account</b>
                </div>
              </div>
            </div>
            <div class="portal-page"></div>
          </div>
        </div>
      </div>
      <img class="vector-icon" alt="" src="./public/vector15.svg" id="vector" />
    </div>

    <script>
      var frameContainer1 = document.getElementById("frameContainer1");
      if (frameContainer1) {
        frameContainer1.addEventListener("click", function (e) {
          window.location.href = "./home-page.html";
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
      
      var button5Container = document.getElementById("button5Container");
      if (button5Container) {
        button5Container.addEventListener("click", function (e) {
          window.location.href = "./admin-employees-page.html";
        });
      }
      
      var button7Container = document.getElementById("button7Container");
      if (button7Container) {
        button7Container.addEventListener("click", function (e) {
          window.location.href = "./admin-account-page.html";
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


