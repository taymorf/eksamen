
<?php

session_start();
if (!$_SESSION['isLoggedIn'] === true) {
  header('Location: include/login.php');
  die();
}

?>
<div class="vertical-menu">
  <h1>Adminstration</h1>
<a class="active" href="#home">Home</a>
<a href="#news">News</a>
<a href="#contact">Contact</a>
<a href="#about">About</a>
</div>
