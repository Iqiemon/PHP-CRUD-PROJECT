
<?php
require_once "config.php";
$id = $_POST["id"];
$name = $_POST["name"];
$code = $_POST["code"];
$price = $_POST["price"];
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $fileName = "images/".pathinfo($_FILES['fileToUpload']['name'], PATHINFO_FILENAME).".".strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
  $sql = "INSERT INTO tblproduct (id, name, code, image, price) VALUES (?, ?, ?, ?, ?)"; 
  if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "dsssd", $param_id , $param_name , $param_code , $param_image , $param_price);
            $param_id = $id;
			$param_name = $name;
			$param_code = $code;
			$param_image = $fileName;
			$param_price = $price;
			 if(mysqli_stmt_execute($stmt)){
				 echo "Success";
			 }
             else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
	   }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>
