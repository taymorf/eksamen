
<?php

session_start();
if (!$_SESSION['isLoggedIn'] === true) {
  header('Location: include/login.php');
  die();
}

?>
<body >
    <div id="center">
        <?php
          if (isset($_GET['page'])) {
              include($_GET['page'] . '.php');
          } else {
              header("Location: index.php?page=include/adminmain");
          }
        ?>
    </div>
</body>
</html>
