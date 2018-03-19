<?php
if(count($_POST)>0) {
	require_once("conn.php");

  $title = mysqli_real_escape_string($conn, $_REQUEST['title']);
$text = mysqli_real_escape_string($conn, $_REQUEST['text']);

  $sql = "INSERT INTO `news`(`id`, `title`, `date`, `text`) VALUES ('', '$title', NOW(), '$text' )";
	mysqli_query($conn,$sql);
	$current_id = mysqli_insert_id($conn);
	if(!empty($current_id)) {
		$message = "New User Added Successfully";
	}
}
?>
