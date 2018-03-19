<?php
  include_once 'conn.php';
?>
<!DOCTYPE html>

<html>

    <?php
      // Permanently included files.
      include_once 'include/head.php';

      session_start();
      if(isset($_SESSION['isLoggedIn'])){
        include_once 'include/logins.php';
        include_once "include/admin.php";
      }else{
        include_once 'include/header.php';
        include_once 'include/nav.php';
        include_once 'include/main.php';


      }
