<body >
    <div id="center">
        <?php
          if (isset($_GET['page'])) {
              include($_GET['page'] . '.php');
          } else {
              header("Location: index.php?page=include/frontpage");
          }
        ?>
    </div>
</body>
</html>
