<h2>Ret Besked</h2>

<?php
	if(isset($_GET['RetBeskedID']))
	{
		$_SESSION['RetBeskedID'] = $_GET['RetBeskedID'];
	}

	if(isset($_POST['RetBesked']))
	{
		$RettetOverskrift = $_POST['RettetOverskrift'];
		$RettetBesked = $_POST['RettetBesked'];
		$RetBeskedID = $_SESSION['isLoggedIn'];
		$sql = "UPDATE news SET title='$RettetOverskrift', text='$RettetBesked' WHERE id='$RetBeskedID'";
		$conn->query($sql);
		header( 'Location: index.php?side=visprofil.php' );
	}
?>

<form action="" method="post">
	Overskrift:
	<input type="text" name="RettetOverskrift" />
	<br>
	<br>
	Besked:
	<textarea name="RettetBesked"></textarea>
	<br>
	<br>
	<input type="submit" value="Ret Besked" name="RetBesked" />
</form>
<br />
