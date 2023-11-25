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
      <img
        class="vector-icon52"
        alt=""
        src="./public/portal-home-button.svg"
        id="vector6"
      />
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
              <div class="generate-report-form">
              <form method="post" action="">
              <div class = "input-filter-class">
                <label for="start_date">Start Date:</label>
                <input type="date" id="start_date" name="start_date" value = "2023-01-01" required>

                <label for="end_date">End Date:</label>
                <input type="date" id="end_date" name="end_date" value = "2023-12-31" required>
                
              </div>
              <input type="submit" name="generate_report" value="Generate Report">
                  <input type="submit" name="generate_report" value="Generate Report" class = "generate_report_button">
    </form>
</div>

    <!-- Employee Data Display outside of admin-portal-outline -->
    <div class="employee-data-report">
      <div class="table-container">
            <table class="report-table">
    <?php
      include 'admin-income-page-script.php';
      if (isset($_POST['generate_report'])) {
        $employeeData = fetchEmployeeReport();
        if (!empty($employeeData)): ?>
              <thead>
                <tr>
                  <th>Product ID</th>
                  <th>Product Name</th>
                  <th>Description</th>
                  <th>Date Sold</th>
                  <th>Price per unit</th>
                </tr>
              </thead>
              <?php foreach ($employeeData as $data): ?>
              <tbody>
                <tr>
                  <td><?= htmlspecialchars($data['product_id']) ?></td>
                  <td><?= htmlspecialchars($data['product_name']) ?></td>
                  <td><?= htmlspecialchars($data['product_description']) ?></td>
                  <td><?= htmlspecialchars($data['date_of_sale']) ?></td>
                  <td><?= htmlspecialchars($data['product_price']) ?></td>
                </tr>
              </tbody>
              <?php endforeach; ?>
            </table>
            <table class = "sum-table">
              <thead>
                <tr>
                  <th>Shipments sold</th>
                  <th>Envelopes sold</th>
                  <th>Small Boxes sold</th>
                  <th>Medium Boxes sold</th>
                  <th>Large Boxes sold</th>
                  <th>Tape sold</th>
                  <th>Stapler sold</th>
                  <th>Pens sold</th>
                  <th>Stamps sold</th>
                </tr>
              </thead>
              <tbody>
                  <td><?= htmlspecialchars($data['p0000sum']) ?></td>
                  <td><?= htmlspecialchars($data['p1000sum']) ?></td>
                  <td><?= htmlspecialchars($data['p1001sum']) ?></td>
                  <td><?= htmlspecialchars($data['p1002sum']) ?></td>
                  <td><?= htmlspecialchars($data['p1003sum']) ?></td>
                  <td><?= htmlspecialchars($data['p1004sum']) ?></td>
                  <td><?= htmlspecialchars($data['p1005sum']) ?></td>
                  <td><?= htmlspecialchars($data['p1006sum']) ?></td>
                  <td><?= htmlspecialchars($data['p1007sum']) ?></td>
              </tbody>
              <thead>
                <tr>
                  <th>Shipments profit</th>
                  <th>Envelopes profit</th>
                  <th>Small Boxes profit</th>
                  <th>Medium Boxes profit</th>
                  <th>Large Boxes profit</th>
                  <th>Tape profit</th>
                  <th>Stapler profit</th>
                  <th>Pens profit</th>
                  <th>Stamps profit</th>
                </tr>
              </thead>
              <tbody>
                  <td class="sum-cell"><?= '$' .htmlspecialchars($data['p0000sum']* 5.99) ?></td>
                  <td class="sum-cell"><?= '$' .htmlspecialchars($data['p1000sum']* 1.99) ?></td>
                  <td class="sum-cell"><?= '$' .htmlspecialchars($data['p1001sum']* 2.99) ?></td>
                  <td class="sum-cell"><?= '$' .htmlspecialchars($data['p1002sum']* 3.99) ?></td>
                  <td class="sum-cell"><?= '$' .htmlspecialchars($data['p1003sum']* 4.99) ?></td>
                  <td class="sum-cell"><?= '$' .htmlspecialchars($data['p1004sum']* 4.99) ?></td>
                  <td class="sum-cell"><?= '$' .htmlspecialchars($data['p1005sum']* 4.99) ?></td>
                  <td class="sum-cell"><?= '$' .htmlspecialchars($data['p1006sum']* 2.99) ?></td>
                  <td class="sum-cell"><?= '$' .htmlspecialchars($data['p1007sum']* 9.99) ?></td>
              </tbody>
              <table class="total-table">
                <thead>
                  <tr>
                    <th>Total:</th>
                    <th id="totalSum"></th>
                  </tr>
                </thead>
              </table>
            </table>
          </div>
        <?php else: ?>
          <p>No products sold.</p>
        <?php endif;
      }
      ?>
    </div>
    </div>

            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      document.addEventListener('DOMContentLoaded', function () {
              // Get all elements with the class "sum-cell"
              var sumCells = document.querySelectorAll('.sum-cell');

              // Initialize sum variable
              var totalSum = 0;

              // Loop through each sum cell and add its value to the total
              sumCells.forEach(function (cell) {
                  // Extract the numeric value from the cell content
                  var value = parseFloat(cell.textContent.replace('$', '').trim());

                  // Add the numeric value to the total sum
                  totalSum += value;
              });

              // Display the total sum in the "totalSum" cell
              document.getElementById('totalSum').textContent = '$' + totalSum.toFixed(2);
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
