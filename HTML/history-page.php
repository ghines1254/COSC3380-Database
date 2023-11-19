<?php
  session_start();

  // Check if the user is logged in
  if (!isset($_SESSION['user_info'])) {
      // Redirect to the login page if the user is not logged in
      header('Location: login-page.php');
      exit();
  }
  $user_info = $_SESSION['user_info'];


  // Database connection details
  $host = "34.68.154.206";
  $database = "Post_Office_Schema";
  $user = "root";
  $password = "umapuma";

  // Create connection
  $conn = new mysqli($host, $user, $password, $database);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./history-page.css" />
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
    <div class="history-page">
      <div class="minibackground30">
        <img class="image-1-icon30" alt="" src="./public/image-1@2x.png" />
      </div>
      <div class="navigation-bar-light30">
        <div class="navigation-bar30"></div>
        <div class="navigation-bar-light-inner29">
          <div class="rectangle-parent143">
            <div class="group-child94"></div>
            <b class="login33">Login</b>
          </div>
        </div>
        <div class="cougarcourier1-4-parent27" id="frameContainer1">
          <img
            class="cougarcourier1-4-icon30"
            alt=""
            src="./public/cougarcourier1-4@2x.png"
          />

          <b class="cougar-courier30">Cougar Courier</b>
        </div>
      </div>
      <div class="portal-centering-frame18">
        <div class="customer-portal-outline5">
          <div class="frame-parent58">
            <div class="rectangle-parent144">
              <div class="frame-child66"></div>
              <div class="welcome-to-your-portal-page-wrapper23">
                <b class="welcome-to-your25">Recent Packages</b>
              </div>
            </div>
            <div class="frame-parent59">
              <div class="frame-wrapper26">
                <div class="tracking-parent3">
                  <div class="tracking19" id="trackingContainer">
                    <div class="tracking-child11"></div>
                    <b class="button-242">Tracking</b>
                  </div>
                  <div class="button237" id="button2Container">
                    <div class="tracking-child11"></div>
                    <b class="button-242">Notifications</b>
                  </div>
                  <div class="products5" id="productsContainer">
                    <div class="tracking-child11"></div>
                    <b class="button-242">Products</b>
                  </div>
                  <div class="quote10" id="quoteContainer">
                    <div class="tracking-child11"></div>
                    <b class="button-242">Quote</b>
                  </div>
                  <div class="support5" id="supportContainer">
                    <div class="tracking-child11"></div>
                    <b class="button-242">Support</b>
                  </div>
                  <div class="history5">
                    <div class="tracking-child11"></div>
                    <b class="button-242">History</b>
                  </div>
                  <div class="account6" id="accountContainer">
                    <div class="tracking-child11"></div>
                    <b class="button-242">Account</b>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <img
          class="portal-home-button16"
          alt=""
          src="./public/portal-home-button.svg"
          id="portalHomeButton"
        />
      </div>
      <table class = "history-table">
          <thead>
              <tr>

                  <th>Tracking Number</th>
                  <th>Last Updated</th>
                  <th>Delivery Status</th>
                  <th>Delivered By</th>
                  <th>Estimated Delivery</th>
              </tr>
          </thead>
          <tbody>
            <?php
            $fakeEmail = "fake@gmail.com";
             $stmt=$conn->prepare("SELECT PACKAGE.tracking_number, TRACKING_INFO.last_updated, PACKAGE.status, EMPLOYEE.first_name AS employee_first_name, TRACKING_INFO.eta
                                    FROM CUSTOMER
                                    JOIN Customer_To_Package ON CUSTOMER.customer_id = Customer_To_Package.customer_id
                                    JOIN PACKAGE ON Customer_To_Package.package_id = PACKAGE.tracking_number
                                    JOIN TRACKING_INFO ON PACKAGE.tracking_number = TRACKING_INFO.package_id
                                    LEFT JOIN EMPLOYEE ON TRACKING_INFO.delivered_by = EMPLOYEE.idnum
                                    WHERE CUSTOMER.email = ?
                                    ORDER BY TRACKING_INFO.created_on ASC");
            $stmt->bind_param("s", $user_info['email']);
            if (!$stmt->execute()) {
              echo "Execution failed: " . $stmt->error;
              exit();
            } 
            $stmt->bind_result($trackingNumber, $lastUpdated, $packageStatus, $employee_first_name, $packageETA);
            while($stmt->fetch()):
              echo "<tr>";
              echo "<td>" . $trackingNumber . "</td>";
              echo "<td>" . $lastUpdated . "</td>";
              echo "<td>" . $packageStatus . "</td>";
              echo "<td>" . $employee_first_name . "</td>";
              echo "<td>" . $packageETA . "</td>";
              echo "</tr>";

          endwhile; ?>
          </tbody>
        </table>
    </div>
    <?php /*
        $query = "SELECT tracking_number FROM PACKAGE";
        $result = $conn->query($query);
        // Check for errors
        if (!$result) {
            die("Error retrieving data: " . $conn->error);
        }
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['tracking_number']}</td>";
            echo "<td>{$row['delivery_status']}</td>";
            echo "<td>{$row['date_of_delivery']}</td>";
            echo "</tr>";
        }*/
    ?>

    <script>
      var frameContainer1 = document.getElementById("frameContainer1");
      if (frameContainer1) {
        frameContainer1.addEventListener("click", function (e) {
          window.location.href = "./index.php";
        });
      }

      var trackingContainer = document.getElementById("trackingContainer");
      if (trackingContainer) {
        trackingContainer.addEventListener("click", function (e) {
          window.location.href = "./tracking-page.php";
        });
      }

      var button2Container = document.getElementById("button2Container");
      if (button2Container) {
        button2Container.addEventListener("click", function (e) {
          window.location.href = "./customer-portal-nofications-page.php";
        });
      }

      var productsContainer = document.getElementById("productsContainer");
      if (productsContainer) {
        productsContainer.addEventListener("click", function (e) {
          window.location.href = "./products-page.html";
        });
      }

      var quoteContainer = document.getElementById("quoteContainer");
      if (quoteContainer) {
        quoteContainer.addEventListener("click", function (e) {
          window.location.href = "./quote-page.html";
        });
      }

      var supportContainer = document.getElementById("supportContainer");
      if (supportContainer) {
        supportContainer.addEventListener("click", function (e) {
          window.location.href = "./support-page.html";
        });
      }

      var accountContainer = document.getElementById("accountContainer");
      if (accountContainer) {
        accountContainer.addEventListener("click", function (e) {
          window.location.href = "./account-page.php";
        });
      }

      var portalHomeButton = document.getElementById("portalHomeButton");
      if (portalHomeButton) {
        portalHomeButton.addEventListener("click", function (e) {
          window.location.href = "./customer-portal-nofications-page.php";
        });
      }
    </script>
  </body>
</html>