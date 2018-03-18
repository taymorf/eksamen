<?php
session_start();
// Unset all of the session variables.
$_SESSION = array(['isLoggedIn']);


// Finally, destroy the session.
session_destroy();
header('Location: ../index.php');
?>
