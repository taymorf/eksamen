<html>
<head>
    <title>Add Data</title>
</head>

<body>
    <a href="index.php">Home</a>
    <br/><br/>

    <form action="include/createnews.php" method="post" name="form1">
        <table width="25%" border="0">
            <tr>
                <td>Name</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Age</td>
                <td><input type="text" name="pass"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="Submit" value="Add"></td>
            </tr>
        </table>
    </form>
</body>
</html>