<?php
if (!$_SESSION['isLoggedIn'] === true) {
  header('Location: login.php');
  die();
}
?>
