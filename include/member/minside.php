<?php
if (!$_SESSION['member'] === true) {
  header('Location: mlogin.php');
  die();
}
?>
