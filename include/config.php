<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'mysql');
define('DB_NAME', 'kajakklubben');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$name = "";
	$address = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['title'];
		$address = $_POST['text'];

		mysqli_query($db, "INSERT INTO news (`title`, `text`) VALUES ('$name', '$address')");
		$_SESSION['isLoggedIn'] = "Address saved";
		header('location: index.php');
	}
$sql1 = 	mysqli_query($link, "SELECT `id`, `brand`, `product`, `amount`, `price`, `difficulty`, `img` FROM `kajaktype`");
$sql2 = 	mysqli_query($link, "SELECT `id`, `img`, `title`, `date`, `text` FROM `arrangementer`");
?>
