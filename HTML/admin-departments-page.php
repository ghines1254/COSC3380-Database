<?php
session_start();
include 'admin-departments-page-script.php';

$employeeData = [];
if (isset($_POST['generate_report'])) {
    $employeeData = fetchEmployeeReport();
}
?>


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
       <div class="minibackground20">
         <img class="image-1-icon20" alt="" src="./public/image-12@2x.png" />
     </div>

  <div class="admin-departments-page">
        
 <div class="admin-departments-page">
        <!-- Existing content -->

        <!-- Generate Report Form -->
        <form method="post" action="admin-departments-page-script.php">
            <input type="submit" name="generate_report" value="Generate Report">
        </form>

        <!-- Employee Data Display -->
        <div class="employee-data-report">
            <?php if (!empty($employeeData)): ?>
                <table>
                    <!-- Table Headers -->
                    <!-- Table Rows -->
                    <?php foreach ($employeeData as $data): ?>
                        <!-- Display each row -->
                    <?php endforeach; ?>
                </table>
            <?php else: ?>
                <p>No employee data found.</p>
            <?php endif; ?>
        </div>





      
      <div class="navigation-bar-light20">
        <div class="navigation-bar20"></div>
        <div class="navigation-bar-light-inner19">
          <div class="rectangle-parent104">
            <div class="group-child63"></div>
            <b class="login21">Login</b>
          </div>
        </div>
        <div class="cougarcourier1-4-parent17" id="frameContainer1">
          <img
            class="cougarcourier1-4-icon20"
            alt=""
            src="./public/cougarcourier1-4@2x.png"
          />

          <b class="cougar-courier20">Cougar Courier</b>
        </div>
      </div>
      <div class="admin-portal-outline5">
        <div class="frame-parent38">
          <div class="rectangle-parent105">
            <div class="frame-child56"></div>
            <div class="welcome-to-your-portal-page-wrapper15">
              <b class="welcome-to-your17">Departments</b>
            </div>
          </div>
          <div class="frame-parent39">
            <div class="frame-wrapper18">
              <div class="button2-parent15">
                <div class="button229" id="button2Container">
                  <div class="button2-child27"></div>
                  <b class="button-229">PO Locations</b>
                </div>
                <div class="button317" id="button3Container">
                  <div class="button3-child15"></div>
                  <b class="button-229">Products</b>
                </div>
                <div class="button430">
                  <div class="button2-child27"></div>
                  <b class="button-229">Employee</b>
                </div>
                <div class="button55" id="button5Container">
                  <div class="button2-child27"></div>
                  <b class="button-229">Employees</b>
                </div>
                <div class="button717" id="button7Container">
                  <div class="button2-child27"></div>
                  <b class="button-229">Account</b>
                </div>
              </div>
            </div>
            <div class="portal-page17"></div>
          </div>
        </div>
      </div>
      <div class="frame77">
        <div class="frame78">
          <div class="rectangle64"></div>
          <b class="role">Role</b>
        </div>
        <div class="frame79">
          <div class="rectangle65"></div>
          <b class="manager">Department ID</b>
        </div>
        <div class="frame80">
          <div class="rectangle66"></div>
          <div class="manager">
            <ul class="ul">
              Manager
            </ul>
          </div>
        </div>
        <div class="frame81">
          <div class="rectangle67"></div>
          <div class="manager">
            <ul class="ul">
              001
            </ul>
          </div>
        </div>
        <div class="frame82">
          <div class="rectangle67"></div>
          <div class="manager">
            <ul class="ul">
              In-Store Employee
            </ul>
          </div>
        </div>
        <div class="frame83">
          <div class="rectangle67"></div>
          <div class="manager">
            <ul class="ul">
              002
            </ul>
          </div>
        </div>
        <div class="frame84">
          <div class="rectangle67"></div>
          <div class="manager">
            <ul class="ul">
              Delivery Driver
            </ul>
          </div>
        </div>
        <div class="frame85">
          <div class="rectangle67"></div>
          <div class="manager">
            <ul class="ul">
              003
            </ul>
          </div>
        </div>
      </div>
      <img
        class="vector-icon43"
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

      var button5Container = document.getElementById("button5Container");
      if (button5Container) {
        button5Container.addEventListener("click", function (e) {
          window.location.href = "./admin-employees-page.php";
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
