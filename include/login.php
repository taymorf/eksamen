<?php
require_once '../conn.php';

if ($_POST) {
	$stmt = $conn->prepare("SELECT id FROM admins WHERE username = ? AND password = ?");
	$stmt->bind_param('ss', $_POST['username'], $_POST['password']);
	$stmt->execute();
	$stmt->store_result();

	if ($stmt->num_rows == 1) {
		session_start();
		$_SESSION['isLoggedIn'] = true;
		header('Location: ../index.php');
	} else {
		$errorMsg = 'Du har jokket i en l*ort';
	}
}

?>

    <div class="container">
      <form class="form-signin" method="post" action="">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="inputUser" class="sr-only">Brugernavn</label>
        <input type="text" id="inputUser" class="form-control" placeholder="Brugernavn" name="username" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
				<?=@$errorMsg;?>
      </form>
    </div> <!-- /container -->
