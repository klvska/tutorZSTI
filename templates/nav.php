<div class="header-main">
  <div class="container">
    <div class="header-main-inner">
        <div class="logo">
          <a href="./index.php">
            <img src="./assets/images/logo.svg" alt="logo"/>
          </a>
        </div>
        <div class="heading-right">
          <nav id="main-menu">
            <ul>
              <li>
                <a href="./subjects.php">Szukaj korepetycji</a>
              </li>
              <li>
                <a href="#">Zostan korepetytorem</a>
              </li>
              <li>
                <a href="../assets/pdf/Regulamin.pdf" target="_blank">Regulamin</a>
              </li>
            </ul>
          </nav>
        </div>
        <?php
        session_start();
        if (isset($_SESSION["loggedin"])) { ?>
        <div class="login">
            <a href="php/logout.php">
              <img src="./assets/icons/Sign_out_squre_fill.png" alt="login"/>
            </a>
        </div>
        <?php } else { ?>
        <div class="login">
            <a href="login.php">
              <img src="./assets/icons/Sign_in_squre_fill.png" alt="login"/>
            </a>
        </div>
         <?php } ?>
    </div>
  </div>