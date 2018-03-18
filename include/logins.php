<?php
session_start();
if(isset($_SESSION['isLoggedIn'])){
  include_once "loggedin.php";
}
else{
  include_once "loggedout.php";
}
?>
