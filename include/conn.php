<?php
    $servername = "localhost";
    $username   = "root";
    $password   = "mysql";
    $dbname     = "kajakklubben";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = ("SELECT `id`, `title`, `date`, `text` FROM `news` ORDER BY `id` DESC");
    $frontpage = ("SELECT `title`, `texr` FROM `forside` ORDER BY `id` DESC");
    $result = $conn->query($sql);
    $result1 = $conn->query($frontpage);
$admins = ("SELECT id FROM admins WHERE username = ?");

$databaseHost = 'localhost';
$databaseName = 'kajakklubben';
$databaseUsername = 'root';
$databasePassword = 'mysql';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

?>
