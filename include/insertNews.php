<?php
$link = mysqli_connect("localhost", "root", "mysql", "kajakklubben");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Escape user inputs for security
$title = mysqli_real_escape_string($link, $_REQUEST['title']);
$text = mysqli_real_escape_string($link, $_REQUEST['text']);

// attempt insert query execution
$sql = "INSERT INTO `news`(`id`, `title`, `date`, `text`) VALUES ('', '$title', NOW(), '$text' )";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

// close connection
mysqli_close($link);
?>
