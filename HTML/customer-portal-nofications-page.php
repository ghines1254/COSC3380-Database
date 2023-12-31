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
    <link rel="stylesheet" href="./cutomer-portal-nofications-page.css" />
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
    <div class="cutomer-portal-nofications-p">
      <div class="minibackground124">
        <img class="image-1-icon124" alt="" src="./public/image-1@2x.png" />
      </div>
      <div class="navigation-bar-light36">
        <div class="navigation-bar36"></div>
        <div class="navigation-bar-light-inner35">
          <div class="rectangle-parent172">
            <div class=""></div>
            <b class="login39"></b>
          </div>
        </div>
        <div class="cougarcourier1-4-parent33" id="frameContainer1">
          <img
            class="cougarcourier1-4-icon36"
            alt=""
            src="./public/cougarcourier1-4@2x.png"
          />

          <b class="cougar-courier36">Cougar Courier</b>
        </div>
      </div>
      <div class="portal-centering-frame24">
        <div class="customer-portal-outline11">
          <div class="frame-parent81">
            <div class="rectangle-parent173">
              <div class="frame-child86"></div>
              <div class="welcome-to-your-portal-page-wrapper29">
                <b class="welcome-to-your31">Welcome <?php echo $user_info['first_name'];?></b>
              </div>
            </div>
            <div class="frame-parent82">
              <div class="frame-wrapper32">
                <div class="tracking-parent9">
                  <div class="tracking25" id="trackingContainer">
                    <div class="tracking-child17"></div>
                    <b class="button-254">Tracking</b>
                  </div>
                  <div class="button243" id="button2Container">
                    <div class="tracking-child17"></div>
                    <b class="button-254">Notifications</b>
                  </div>
                  <div class="products11" id="productsContainer">
                    <div class="products-child9"></div>
                    <b class="button-254">Products</b>
                  </div>
                  
                  <div class="support11" id="supportContainer">
                    <div class="tracking-child17"></div>
                    <b class="button-254">Support</b>
                  </div>
                  <div class="history11" id="historyContainer">
                    <div class="tracking-child17"></div>
                    <b class="button-254">History</b>
                  </div>
                  <div class="account13" id="accountContainer">
                    <div class="tracking-child17"></div>
                    <b class="button-254">Account</b>
                  </div>
                </div>
              </div>
              <div class="portal-page31"></div>
            </div>
          </div>
        </div>
        <div class="frame-parent83">
          <div class="group-wrapper">
            <div class="group-parent26">
              <div class="group-parent27">
                <div class="group-parent28">
                  <div class="minibackground-parent79">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent80">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent81">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent82">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="minibackground129">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground91">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="darkminibakground-wrapper">
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon92"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                </div>
                <div class="group-parent29">
                  <div class="minibackground-parent83">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon130"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon93"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent84">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon131"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon93"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent85">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon131"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon93"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent86">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon131"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon93"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent87">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon131"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon93"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent83">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon130"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon93"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                </div>
              </div>
              <div class="group-parent30">
                <div class="group-parent28">
                  <div class="minibackground-parent79">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent80">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent81">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent82">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="minibackground129">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground91">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="darkminibakground-wrapper">
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon92"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                </div>
                <div class="group-parent29">
                  <div class="minibackground-parent83">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon141"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent84">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent85">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent86">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent87">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent83">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon141"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                </div>
              </div>
              <div class="group-parent33">
                <div class="group-parent28">
                  <div class="minibackground-parent79">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent80">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent81">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent82">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="minibackground129">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground91">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="darkminibakground-wrapper">
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon92"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                </div>
                <div class="group-parent29">
                  <div class="minibackground-parent83">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon141"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent84">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent85">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent86">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent87">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent83">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon141"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                </div>
              </div>
              <div class="group-parent36">
                <div class="group-parent28">
                  <div class="minibackground-parent79">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent80">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent81">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent82">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="minibackground129">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground91">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="darkminibakground-wrapper">
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon92"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                </div>
                <div class="group-parent29">
                  <div class="minibackground-parent83">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon141"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent84">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent85">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent86">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent87">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent83">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon141"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="group-wrapper">
            <div class="group-parent26">
              <div class="group-parent27">
                <div class="group-parent28">
                  <div class="minibackground-parent79">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent80">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent81">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent82">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="minibackground129">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground91">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="darkminibakground-wrapper">
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon92"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                </div>
                <div class="group-parent29">
                  <div class="minibackground-parent83">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon130"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon93"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent84">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon131"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon93"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent85">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon131"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon93"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent86">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon131"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon93"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent87">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon131"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon93"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent83">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon130"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon93"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                </div>
              </div>
              <div class="group-parent30">
                <div class="group-parent28">
                  <div class="minibackground-parent79">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent80">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent81">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent82">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="minibackground129">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground91">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="darkminibakground-wrapper">
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon92"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                </div>
                <div class="group-parent29">
                  <div class="minibackground-parent83">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon141"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent84">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent85">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent86">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent87">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent83">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon141"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                </div>
              </div>
              <div class="group-parent33">
                <div class="group-parent28">
                  <div class="minibackground-parent79">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent80">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent81">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent82">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="minibackground129">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground91">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="darkminibakground-wrapper">
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon92"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                </div>
                <div class="group-parent29">
                  <div class="minibackground-parent83">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon141"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent84">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent85">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent86">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent87">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent83">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon141"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                </div>
              </div>
              <div class="group-parent36">
                <div class="group-parent28">
                  <div class="minibackground-parent79">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent80">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent81">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent82">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="minibackground129">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground91">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="darkminibakground-wrapper">
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon92"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                </div>
                <div class="group-parent29">
                  <div class="minibackground-parent83">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon141"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent84">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent85">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent86">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent87">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon125"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                  <div class="minibackground-parent83">
                    <div class="minibackground125">
                      <img
                        class="image-1-icon141"
                        alt=""
                        src="./public/image-13@2x.png"
                      />
                    </div>
                    <div class="darkminibakground88">
                      <img
                        class="image-4-icon88"
                        alt=""
                        src="./public/image-4@2x.png"
                      />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="notification-center-container">
            <b class="notification-center2">Notification Center: </b>
            <?php
            ///////////////////////////////////////////////////////////////////////////////
            //Code to display notifications for users current packaged
            $notificationsLimit = 10;
            $count = 0;
            $stmt=$conn->prepare("SELECT PACKAGE.tracking_number, TRACKING_INFO.last_updated, PACKAGE.message
                                  FROM CUSTOMER
                                  JOIN Customer_To_Package ON CUSTOMER.customer_id = Customer_To_Package.customer_id
                                  JOIN PACKAGE ON Customer_To_Package.package_id = PACKAGE.tracking_number
                                  JOIN TRACKING_INFO ON PACKAGE.tracking_number = TRACKING_INFO.package_id
                                  WHERE CUSTOMER.email = ?
                                  ORDER BY TRACKING_INFO.last_updated DESC");
            $stmt->bind_param("s", $user_info['email']);
            if (!$stmt->execute()) {
              echo "Execution failed: " . $stmt->error;
              exit();
            }
            $stmt->bind_result($trackingNumber, $lastUpdated, $trackingMessage);
            while($stmt->fetch() && $count < 10){
            ?>
              <div class="notification-component16">
              <div class="rectangle-parent174">
                <div class="frame-child86"></div>
                <img class="vector-icon85" alt="" src="./public/vector13.svg" />

                <b class="notification-summary16">Package: <?php echo $trackingNumber . "      " . $trackingMessage;?></b>
              </div>
              <div class="parent14">
                <b class="b23"><?php echo $lastUpdated; ?></b>
                <div class="frame-child88"></div>
              </div>
            </div>
            <?php
            }
            $stmt->close();
            ?>
              </div>
            </div>
          </div>
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
      </script>
  </body>
</html>
