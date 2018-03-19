<?php
// Include config file
require_once '../config.php';

// Define variables and initialize with empty values
$name = $address = "";
$name_err = $address_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["title"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var(trim($_POST["title"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s ]+$/")))){
        $name_err = 'Please enter a valid name.';
    } else{
        $name = $input_name;
    }


    ?>

    <form action="" method="post" enctype="multipart/form-data">
    	<input type="file" name="fil" />
    	<br />
    	<br />
    	<input type="submit" name="submit" value="Upload fil" />
    </form>

    <?php
    	}
    	if( isset($_POST["submit"]))
    	{
    		$filLokation = "upload/";
    		if ( file_exists( $filLokation . $_FILES["fil"]["name"]))
    		{
    			$status = '<p>Filen eksisterer i forvejen</p>';
    			echo $status;
    		}
    		else
    		{
    			if($_FILES["fil"]["error"] == 0)
    			{
    				$fil = $_FILES["fil"]["name"];
    				move_uploaded_file( $_FILES["fil"]["tmp_name"], $filLokation . $fil );
    				$brugerID = $_SESSION['BrugerIDLoggetInd'];
    				$sql2 = "INSERT INTO `arrangementer`(`id`, `img`, `title`, `date`, `text`) VALUES (NULL, '$brugerID', '{$fil}')";
    				$dbforbindelse->query($sql2);
    				echo '<p>Filen er uploadet</p>';
    			}
    		}
    	}




    // Check input errors before inserting in database
    if(empty($name_err) && empty($address_err) && empty($salary_err)){
        // Prepare an insert statement
        $sql2 = "INSERT INTO `arrangementer`(`id`, `img`, `title`, `date`, `text`) VALUES (?, $imagename, ?, NOW(), ?)";

        if($stmt = mysqli_prepare($link, $sql2)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "issss", $param_name, $param_address);

            // Set parameters
            $param_name = $name;
            $param_address = $address;
            $param_salary = $salary;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Opret Arrangementer</h2>
                    </div>
                    <p>Udfyld venligst alle felter</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                      <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                          <label>Billede</label>
                          <input type="file" name="img" class="form-control">
                          <span class="help-block"><?php echo $name_err;?></span>
                      </div>
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Titel</label>
                            <input type="text" name="title" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Tekst</label>
                            <textarea name="text" class="form-control"><?php echo $address; ?></textarea>
                            <span class="help-block"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Titel</label>
                            <input type="text" name="title" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Tekst</label>
                            <textarea name="text" class="form-control"><?php echo $address; ?></textarea>
                            <span class="help-block"><?php echo $address_err;?></span>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Annullere</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
