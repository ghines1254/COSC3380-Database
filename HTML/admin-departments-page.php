<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="initial-scale=1, width=device-width" />
  <link rel="stylesheet" href="./global.css" />
  <link rel="stylesheet" href="./admin-departments-page.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@400;500;600;700;800;900&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lexend:wght@400;500;600;700&display=swap" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" />
   <style>

    /* Adding hover effect */
    .generate-report-button:hover {
      background-color: #4CAF50; /* Darker shade for hover */
      color: white;
    }
   
    .report-table {
      width: 100%;
      border-collapse: collapse;
    }
    .report-table th, .report-table td {
      border: 1px solid black;
      padding: 8px;
      text-align: left;
      font-size: 12px; /* Adjust the font size here */
    }
    .table-container {
      max-width: 870px;
      max-height: 570px;
      overflow: auto; /* enables scrolling */
      margin-left: 400px;
      margin-right: auto;
    }
  </style>
</head>
<body>
  <div class="admin-departments-page">
    <div class="minibackground1">
      <img class="image-1-icon1" alt="" src="./public/image-12@2x.png" />
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
        <img class="cougarcourier1-4-icon1" alt="" src="./public/cougarcourier1-4@2x.png" />
        <b class="cougar-courier1">Cougar Courier</b>
      </div>
    </div>

    <div class="admin-portal-outline">
      <div class="frame-parent">
        <div class="rectangle-container">
          <div class="frame-child"></div>
          <div class="welcome-to-your-portal-page-wrapper">
            <b class="welcome-to-your">Employee Report</b>
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
                <b class="departments">Income</b>
              </div>
              <div class="button4">
                <div class="button2-child"></div>
                <b style="font-size: 20px;" class="departments">Employee Report</b>
              </div>
              <div class="button5" id="button5Container">
                <div class="button2-child"></div>
                <b style="font-size: 20px;" class="departments">Add Employee</b>
              </div>
<!--               <div class="button7" id="button7Container">
                <div class="button2-child"></div>
                <b class="departments">Account</b> -->
              </div>
            </div>
          </div>
          <div class="portal-page"></div>
        </div>

        <!-- Centered Generate Report Form -->
      <div class="generate-report-form" style="text-align: center; margin-top: -1000px; margin-bottom: 20px; margin-left: 720px;">
    <form method="post" action="">
        <!-- Button styling added here -->
      <input type="submit" name="generate_report" value="Generate Report" 
             style="background-color: #4CAF50; /* Green background */
                    color: white; /* White text */
                    padding: 10px 20px; /* Top/bottom and left/right padding */
                    border: none; /* No border */
                    border-radius: 5px; /* Rounded corners */
                    cursor: pointer; /* Cursor changes to pointer on hover */
                    box-shadow: 2px 2px 5px grey; /* Optional shadow */">
    </form>
</div>

    </div>

    <!-- Employee Data Display outside of admin-portal-outline -->
    <div class="employee-data-report" style="margin-top: 200px;">
      <?php
      include 'admin-departments-page-script.php';
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

  <img class="vector-icon" alt="" src="./public/portal-home-button.svg" id="vector" />

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
        window.location.href = "./admin-income-page.php";
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
