<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./admin-income-page.css" />
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
    <div class="admin-products-page">
      <div class="admin-products-page-child"></div>
      <div class="minibackground21">
        <img class="image-1-icon21" alt="" src="./public/image-12@2x.png" />
      </div>
      <div class="navigation-bar-light21">
        <div class="navigation-bar21"></div>
        <div class="navigation-bar-light-inner20">
          <div class="rectangle-parent106">
            <div class="group-child64"></div>
            <b class="login22">Login</b>
          </div>
        </div>
        <div class="cougarcourier1-4-parent18" id="frameContainer1">
          <img
            class="cougarcourier1-4-icon21"
            alt=""
            src="./public/cougarcourier1-4@2x.png"
          />

          <b class="cougar-courier21">Cougar Courier</b>
        </div>
      </div>
      <div class="admin-portal-outline6">
        <div class="frame-parent40">
          <div class="rectangle-parent107">
            <div class="frame-child57"></div>
            <div class="welcome-to-your-portal-page-wrapper16">
              <b class="welcome-to-your18">Total Income Report</b>
            </div>
          </div>
          <div class="frame-parent41">
            <div class="frame-wrapper19">
              <div class="button2-parent16">
                <div class="button230" id="button2Container">
                  <div class="button2-child28"></div>
                  <b class="button-230">PO Locations</b>
                </div>
                <div class="button318">
                  <div class="button3-child16"></div>
                  <b class="button-230">Income</b>
                </div>
                <div class="button431" id="button4Container">
                  <div class="button2-child28"></div>
                  <b class="button-230">Departments</b>
                </div>
                <div class="button56" id="button5Container">
                  <div class="button2-child28"></div>
                  <b class="button-230">Employees</b>
                </div>
                <div class="button718" id="button7Container">
                  <div class="button2-child28"></div>
                  <b class="button-230">Account</b>
                </div>
              </div>
            </div>
            <div class="portal-page18">
              <div class="generate-report-form" style="text-align: center; margin-top: -100px; margin-bottom: 20px; margin-left: 720px;">
    <form method="post" action="">
        <!-- Button styling added here -->
      <input type="submit" name="generate_report" value="Generate Report"
             style="position: absolute;
                    top: 640px;
                    right: 375.5px;
                    background-color: var(--lightaccent);
                    round-color: #4CAF50;
                    color: white;
                    padding: 10px 20px;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                    box-shadow: 2px 2px 5px grey;">
    </form>
</div>

    <!-- Employee Data Display outside of admin-portal-outline -->
    <div class="employee-data-report">
      <?php
      include 'admin-income-page-script.php';
      if (isset($_POST['generate_report'])) {
        $employeeData = fetchEmployeeReport();
        if (!empty($employeeData)): ?>
          <div class="table-container">
            <table class="report-table">
              <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Sex</th>
                <th>Birthdate</th>
                <th>City</th>
                <th>State</th>
                <th>Zipcode</th>
                <th>Department</th>
                <th>Created On</th>
                <th>Packages Delivered</th>
              </tr>
              <?php foreach ($employeeData as $data): ?>
              <tr>
                <td><?= htmlspecialchars($data['idnum']) ?></td>
                <td><?= htmlspecialchars($data['first_name']) ?></td>
                <td><?= htmlspecialchars($data['last_name']) ?></td>
                <td><?= htmlspecialchars($data['sex']) ?></td>
                <td><?= htmlspecialchars($data['birthdate']) ?></td>
                <td><?= htmlspecialchars($data['city']) ?></td>
                <td><?= htmlspecialchars($data['state']) ?></td>
                <td><?= htmlspecialchars($data['zipcode']) ?></td>
                <td><?= htmlspecialchars($data['dept']) ?></td>
                <td><?= htmlspecialchars($data['created_on']) ?></td>
                <td><?= htmlspecialchars($data['packages_delivered']) ?></td>
              </tr>
              <?php endforeach; ?>
            </table>
          </div>
        <?php else: ?>
          <p>No employee data found.</p>
        <?php endif;
      }
      ?>
    </div>
    </div>

            </div>
          </div>
        </div>
      </div>
      <img
        class="vector-icon52"
        alt=""
        src="./public/portal-home-button.svg"
        id="vector6"
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

      var button4Container = document.getElementById("button4Container");
      if (button4Container) {
        button4Container.addEventListener("click", function (e) {
          window.location.href = "./admin-departments-page.php";
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

      var vector6 = document.getElementById("vector6");
      if (vector6) {
        vector6.addEventListener("click", function (e) {
          window.location.href = "./admin-portal-nofications-page.html";
        });
      }
      </script>
  </body>
</html>
