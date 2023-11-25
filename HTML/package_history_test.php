<?php
require_once 'init.php';

$packageId = isset($_GET['tracking_number']) ? $_GET['tracking_number'] : '';
$startDate = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$endDate = isset($_GET['end_date']) ? $_GET['end_date'] : '';
$attribute = isset($_GET['attribute']) ? $_GET['attribute'] : '';

// Define a mapping of database column names to user-friendly display names
$columnDisplayNameMap = [
    'emp_id' => 'Employee ID',
    'location' => 'Location',
    'time_scanned' => 'Time Scanned',
    'vin' => 'Truck No.',
    // Other attributes can be added here
];

// Fetch the static tracking information
$queryTrackingInfo = "SELECT * FROM TRACKING_INFO WHERE package_id = ?";
$stmt = $conn->prepare($queryTrackingInfo);
$stmt->bind_param("s", $packageId);
$stmt->execute();
$trackingInfoResult = $stmt->get_result();
$trackingInfo = $trackingInfoResult->fetch_assoc();

// Fetch package history data
$queryPackageHistory = "SELECT * FROM PACKAGE_HISTORY WHERE package_id = ?";
$parameters = [$packageId];

if (!empty($startDate) && !empty($endDate)) {
    $queryPackageHistory .= " AND time_scanned BETWEEN ? AND ?";
    array_push($parameters, $startDate, $endDate);
}

$stmtHistory = $conn->prepare($queryPackageHistory);
$stmtHistory->bind_param(str_repeat("s", count($parameters)), ...$parameters);
$stmtHistory->execute();
$packageHistoryResult = $stmtHistory->get_result();

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="global.css" />
    <link rel="stylesheet" href="package_history.css" />
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
                <b class="welcome-to-your29">Your Package Tracking</b>
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
                  <div class="quote18" id="quoteContainer">
                    <div class="tracking-child15"></div>
                    <b class="button-250">Quote</b>
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
              <div class="portal-page29">
                  <h3>Tracking Information</h3>
                <table border="1">
                    <!-- Display the tracking information with customized column names and values -->
                    <?php foreach ($trackingInfo as $column => $value): ?>
                        <tr>
                            <th>
                                <?php
                                switch ($column) {
                                    case 'package_id': echo 'Package Number'; break;
                                    case 'on_truck': echo 'Out for Delivery?'; break;
                                    case 'starting_location_id': echo 'Starting Location'; break;
                                    case 'received': echo 'Package Received by Post Office'; break;
                                    case 'delivered_by': echo 'Delivered By Employee ID'; break;
                                    case 'created_on': echo 'Package Created On'; break;
                                    case 'last_updated': echo 'Last Updated'; break;
                                    case 'eta': echo 'Estimated Delivery'; break;
                                    default: echo htmlspecialchars($column);
                                }
                                ?>
                            </th>
                            <td>
                                <?php
                                switch ($column) {
                                    case 'on_truck': echo $value == '1' ? 'Yes' : 'No'; break;
                                    case 'received': echo $value == '1' ? 'Yes' : 'No'; break;
                                    case 'starting_location_id': echo 'Post Office 1'; break; // Assume this is always 'Post Office 1' for this example
                                    default: echo htmlspecialchars($value);
                                }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </table>

                <h3>Package History</h3>
                <!--Filters-->
                <form method="GET">
                    <label for="start_date">Start Date:</label>
                    <input type="date" id="start_date" name="start_date" value="<?php echo htmlspecialchars($startDate); ?>">

                    <label for="end_date">End Date:</label>
                    <input type="date" id="end_date" name="end_date" value="<?php echo htmlspecialchars($endDate); ?>">

                    <select id="attribute" name="attribute">
                        <option value="">Select an attribute</option>
                        <?php foreach ($columnDisplayNameMap as $columnName => $displayName): ?>
                            <option value="<?php echo $columnName; ?>" <?php echo ($attribute == $columnName) ? 'selected' : ''; ?>>
                                <?php echo $displayName; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                    <input type="hidden" name="tracking_number" value="<?php echo htmlspecialchars($packageId); ?>">
                    <input type="submit" value="Filter">
                </form>

                <table border="1">
                <!-- Customized headers for package history -->
                <tr>
                    <!-- Conditional display based on the selected attribute -->
                    <th>Package ID</th>
                    <?php if (empty($attribute) || $attribute == 'emp_id'): ?>
                        <th>Employee ID</th>
                    <?php endif; ?>
                    <?php if (empty($attribute) || $attribute == 'location'): ?>
                        <th>Location</th>
                    <?php endif; ?>
                    <?php if (empty($attribute) || $attribute == 'vin'): ?>
                        <th>Truck No.</th>
                    <?php endif; ?>
                    <th>Time Scanned</th>
                </tr>
                <!-- Display the package history with the customized column names and values -->
                <?php while ($row = $packageHistoryResult->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['package_id']); ?></td>
                        <?php if (empty($attribute) || $attribute == 'emp_id'): ?>
                            <td><?php echo htmlspecialchars($row['emp_id']); ?></td>
                        <?php endif; ?>
                        <?php if (empty($attribute) || $attribute == 'location'): ?>
                            <td>
                                <?php
                                switch ($row['location']) {
                                    case '1': echo 'Post Office 1'; break;
                                    case '2': echo 'Post Office 2'; break;
                                    case '3': echo 'Distribution Center'; break;
                                    case '4': echo 'Transit Facility'; break;
                                    case '5': echo 'Delivered'; break;
                                    default: echo htmlspecialchars($row['location']);
                                }
                                ?>
                            </td>
                        <?php endif; ?>
                        <?php if (empty($attribute) || $attribute == 'vin'): ?>
                            <td><?php echo htmlspecialchars($row['vin']); ?></td>
                        <?php endif; ?>
                        <td><?php echo htmlspecialchars($row['time_scanned']); ?></td>
                    </tr>
                <?php endwhile; ?>
            </table>
                </body>
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
              window.location.href = "./cutomer-portal-nofications-page.php";
            });
          }
              </div>

            </div>
          </div>
        </div>
        <div class="frame-frame">
          <div class="frame91">

        </script>
    </body>
</html>
