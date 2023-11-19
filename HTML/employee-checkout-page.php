<?php
  session_start();

  if (!isset($_SESSION['emp_info'])) {
      // Redirect to login page if user is not logged in
      header('Location: employee-login-page.php');
      exit();
  }

  $emp_info = $_SESSION['emp_info'];
?>


<!DOCTYPE html>
<html>
  <head>
  

    <meta charset="utf-8" />
    <meta name="viewport" content="initial-scale=1, width=device-width" />

    <link rel="stylesheet" href="./global.css" />
    <link rel="stylesheet" href="./employee-checkout-page.css" />
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

    
      <?php
require_once 'init.php';
require_once 'connection.php';
        ?>
   
  </head>

  <body>
    <div class="employee-checkout-page">
      <div class="minibackground9">
        <img class="image-1-icon9" alt="" src="./public/image-1@2x.png" />
      </div>
      <div class="navigation-bar-light9">
        <div class="navigation-bar9"></div>
        <div class="navigation-bar-light-inner7">
          <div class="rectangle-parent60">
            <div class="group-child44"></div>
            <b class="login9">Login</b>
          </div>
        </div>
        <div class="cougarcourier1-4-parent7" id="frameContainer1">
          <img
            class="cougarcourier1-4-icon9"
            alt=""
            src="./public/cougarcourier1-4@2x.png"
          />

          <b class="cougar-courier9">Cougar Courier</b>
        </div>
      </div>
      <div class="portal-centering-frame8">
        <div class="employee-portal-outline8">
          <div class="frame-parent16">
            <div class="rectangle-parent61">
              <div class="frame-child15"></div>
              <div class="welcome-to-your-portal-page-wrapper6">
                <b class="welcome-to-your8">Welcome to your portal page!</b>
              </div>
            </div>
            <div class="frame-parent17">
              <div class="frame-wrapper8">
                <div class="button2-parent6">
                  <div class="button216" id="button2Container">
                    <div class="button2-child14"></div>
                    <b class="button-216">Shipping</b>
                  </div>
                  <div class="button217" id="button2Container1">
                    <div class="button2-child14"></div>
                    <b class="button-216">Tracking</b>
                  </div>
                  <div class="button38" id="button3Container">
                    <div class="button3-child6"></div>
                    <b class="button-216">Check Out</b>
                  </div>
                  <div class="button416" id="button4Container">
                    <div class="button2-child14"></div>
                    <b class="button-216">Delivery</b>
                  </div>
                  <div class="button417" id="button4Container1">
                    <div class="button2-child14"></div>
                    <b class="button-216">Dependent</b>
                  </div>
                  <div class="button78" id="button7Container">
                    <div class="button2-child14"></div>
                    <b class="button-216">Account</b>
                  </div>
                </div>
              </div>
              <div class="portal-page8"></div>
            </div>
          </div>
        </div>
      </div>



         
 <div class="products-outline">
        <div class="check-out-the">Update product stock as needed here.</div>    
 </div>
<table class="products-table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Actions</th>
        </tr>
    </thead>
    
 <tbody>
<?php
$query = "SELECT product_id, product_name, product_price, stock_remaining, product_description FROM IN_STORE_PRODUCTS";

$result = $conn->query($query);

if (!$result) 
{
    die("Error retrieving product information: " . $conn->error);
}

while ($row = $result->fetch_assoc()) 
{
    echo "<div class='product-item'>";
    echo "<span>{$row['product_id']} </span>";
    echo "<span>{$row['product_name']} </span>";
    echo "<span>Description: {$row['product_description']} </span>";
    echo "<span> Price: {$row['product_price']} </span>";
    echo "<span id='stock_{$row['product_id']}'>Stock: {$row['stock_remaining']}</span>";
    echo "<button onclick=\"updateStock('{$row['product_id']}', 'increment')\">+</button>";
    echo "<button onclick=\"updateStock('{$row['product_id']}', 'decrement')\">-</button>";
    echo "</div>";
    
    
}

?> </tbody></table>
 
<script>
function updateStock(productId, action) {
  
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "updateStock.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    
    xhr.onload = function () {
        if (xhr.status == 200) {
            var response = xhr.responseText.trim();
            var updatedStock = parseInt(response);

            if (!isNaN(updatedStock)) {
                // Update the displayed stock
                document.getElementById(`stock_${productId}`).innerText = `Stock: ${updatedStock}`;
                var lowStockThreshold = 10;
                if (updatedStock === 0) {
                  alert("Item is out of stock. Please restock as soon as possible.");
                } else if (updatedStock <= lowStockThreshold) {
                    alert("Stock is running low.");
                }
            } else {
                console.error("Invalid stock value received from the server");
            }
        } else {
            console.error("Request failed with status: " + xhr.status);
        }
    };

    var data = "productId=" + productId + "&action=" + action;
    xhr.send(data);
}
</script>


      
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

      var frameContainer10 = document.getElementById("frameContainer10");
      if (frameContainer10) {
        frameContainer10.addEventListener("click", function (e) {
          window.location.href = "./employee-portal-notifications-page.php";
        });
      }
      </script>
  </body>
</html>
