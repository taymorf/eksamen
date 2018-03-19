<?php
 error_reporting( ~E_NOTICE ); // avoid notice
 require_once '../config.php';

 if(isset($_POST['btnsave']))
 {
  $username = $_POST['brand'];// user name
  $userjob = $_POST['product'];// user email

  $imgFile = $_FILES['user_image']['name'];
  $tmp_dir = $_FILES['user_image']['tmp_name'];
  $imgSize = $_FILES['user_image']['size'];


  if(empty($username)){
   $errMSG = "Please Enter Username.";
  }
  else if(empty($userjob)){
   $errMSG = "Please Enter Your Job Work.";
  }
  else if(empty($imgFile)){
   $errMSG = "Please Select Image File.";
  }
  else
  {
   $upload_dir = '../../img/'; // upload directory

   $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

   // valid image extensions
   $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

   // rename uploading image
   $userpic = rand(1000,1000000).".".$imgExt;

   // allow valid image file formats
   if(in_array($imgExt, $valid_extensions)){
    // Check file size '5MB'
    if($imgSize < 5000000)    {
     move_uploaded_file($tmp_dir,$upload_dir.$userpic);
    }
    else{
     $errMSG = "Sorry, your file is too large.";
    }
   }
   else{
    $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
   }
  }


  // if no error occured, continue ....
  if(!isset($errMSG))
  {
   $stmt = $conn->prepare('INSERT INTO `kajaktype`(`id`, `brand`, `product`, `difficulty`, `amount`, `img`, `price`) VALUES(:uname, :ujob, :upic)');
   $stmt->bindParam(':brand',$username);
   $stmt->bindParam(':product',$userjob);
   $stmt->bindParam(':img',$userpic);

   if($stmt->execute())
   {
    $successMSG = "new record succesfully inserted ...";
    header("refresh:5;index.php"); // redirects image view page after 5 seconds.
   }
   else
   {
    $errMSG = "error while inserting....";
   }
  }
 }
?>
<form method="post" enctype="multipart/form-data" class="form-horizontal">

 <table class="table table-bordered table-responsive">

    <tr>
     <td><label class="control-label">brand</label></td>
        <td><input class="form-control" type="text" name="brand" placeholder="Enter Username" value="<?php echo $username; ?>" /></td>
    </tr>

    <tr>
     <td><label class="control-label">product</label></td>
        <td><input class="form-control" type="text" name="product" placeholder="Your Profession" value="<?php echo $userjob; ?>" /></td>
    </tr>

    <tr>
     <td><label class="control-label">Profile Img.</label></td>
        <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
    </tr>

    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; save
        </button>
        </td>
    </tr>

    </table>

</form>
