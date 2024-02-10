<div class="container">
  <div class="logo">
    <a href="index.html"><img src="assets/images/logo.svg" alt="logo" /></a>
  </div>
  <div class="links">
    <a href="pages/subjects.html">Szukaj korepetycji</a>
    <a href="#">Zostan korepetytorem</a>
    <a href="assets/pdf/Regulamin.pdf" target="_blank">Regulamin</a>
  </div>
 <?php
session_start();

if (!isset($_SESSION['loggedin'])) {
?>
  <div class="login">
    <a href="pages/login.html"><img src="assets/icons/Sign_in_squre_fill.png" alt="login"/></a>
  </div>
<?php
} else {
?>
  <div class="login">
    <a href="php/logout.php"><img src="assets/icons/Sign_out_squre_fill.png" alt="logout"/></a>
  </div>
<?php
}
?>
</div>
