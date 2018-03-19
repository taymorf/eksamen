<?php
// including the database connection file
	require_once("../conn.php");
if(isset($_POST['update']))
{

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);

	$name = mysqli_real_escape_string($mysqli, $_POST['title']);
	$age = mysqli_real_escape_string($mysqli, $_POST['text']);

	// checking empty fields
	if(empty($name) || empty($age)) {

		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}

		if(empty($age)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}


	} else {
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE kajaktype SET title='$name',text='$age' WHERE id=$id");

		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM kajaktype WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['title'];
	$age = $res['text'];
}
?>
<html>
<head>
	<title>Edit Data</title>
</head>

<body>
	<a href="index.php">Home</a>
	<br/><br/>

	<form name="form1" method="post" action="edit.php">
		<table border="0">
			<tr>
				<td>Titel</td>
				<td><input type="text" name="title" value="<?php echo $name;?>"></td>
			</tr>
			<tr>
				<td>Tekst</td>
				<td><input type="text" name="text" value="<?php echo $age;?>"></td>
			</tr>

			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>
