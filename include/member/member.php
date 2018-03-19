
<?php

session_start();
if (!$_SESSION['member'] === true) {
  header('Location: include/member/mlogin.php');
  die();
}

?>
<body >
    <div id="center">
        <?php
          if (isset($_GET['page'])) {
              include($_GET['page'] . '.php');
          } else {
              header("Location: index.php?page=include/member/minside");
          }
        ?>
    </div>
</body>
</html>
