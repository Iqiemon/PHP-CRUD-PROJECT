<?php
require_once "config.php";


	


if($_SERVER["REQUEST_METHOD"] == "POST"){
	$id = $_POST["id"];
        $sql = "DELETE FROM users WHERE id = ?"; 
       if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_id);
            $param_id = $id;
			 if(mysqli_stmt_execute($stmt)){
				 echo "Success";
			 }
             else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
	   }
        }
?>

<html lang ="eng">

<head>
<title>Delete Data User</title>

    <style>
		h3 {text-align: center;}
		div{text-align: center;}
    </style>
</head>
<body>
		<h3>Delete User</h3><br>
	
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<input type="text" name="id"  placeholder="ID" required autofocus>

			 <button type="submit">Login</button>


        </form>
 
	
</body>

</html>

