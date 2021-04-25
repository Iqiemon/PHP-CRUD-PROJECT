<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DbController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;

	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Kedai Kasut Kita</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/product/">

    <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {	
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
		
		
      }
    </style>
    <link href="product.css" rel="stylesheet">
  </head>
  <body>
   <nav class="site-header sticky-top py-1 text-white bg-dark">
  <div class="container d-flex flex-column flex-md-row justify-content-between">
    <a class="py-2" href="welcome.php" aria-label="Product">
      <svg xmlns="http://www.w3.org/2000/svg" href="main.html" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24" focusable="false"><title>Product</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
    </a>
    <a class="py-2 d-none d-md-inline-block" href="product.php">Product</a>
    <a class="py-2 d-none d-md-inline-block" href="cart.php">Checkout</a>
	<a class="py-2 d-none d-md-inline-block" href="logout.php">Log Out</a>
  </div>
</nav>

<div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 bg-dark justify-content-center">
<center>
  <div  class="d-flex flex-row">
	<img src="images/kasutgerak.gif" alt="Fjords" style="width:1770px;height:500px"><hr>
  </div>
  </center>
</div>


<?php
	$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
	
		<div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
		
  <div class="bg-white mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">
  
  
  <form method="post" action="product.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
    <div class="my-3 p-3">
      <h2 class="display-5"><?php echo $product_array[$key]["name"]; ?></h2>
      <p class="lead"><?php echo "$".$product_array[$key]["price"]; ?></p>
	  <img src="<?php echo $product_array[$key]["image"]; ?>" alt="Nature" style="width:280px;height:280px"><hr>
	  <div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
    </div>
	</form>
  </div>

</div>

	<?php
		}
	}
	?>
	
<hr>
<footer class="container py-5">
  <div class="row">
    <div class="col-12 col-md">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mb-2" role="img" viewBox="0 0 24 24" focusable="false"><title>Product</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
      <small class="d-block mb-3 text-muted">&copy; 2015-2020</small>
    </div>
    <div class="col-6 col-md">
      <h5>Contact Us</h5>
      <ul class="list-unstyled text-small">
        <li><a>KKKshop@gmail.com</a></li>
		<li><a>011-8752 6874</a></li>
      </ul>
    </div>
	
	<div class="col-6 col-md">
      <h5>Address</h5>
      <ul class="list-unstyled text-small">
        <li><a>Jalan Penyelenggara U1/73, Hicom-glenmarie Industrial Park, 40150 Shah Alam, Shah Alam, 40150 Shah Alam, Selangor.</a></li>
      </ul>
    </div>
    
	<div class="col-6 col-md">
      <h5>Main Menu</h5>
      <ul class="list-unstyled text-small">
        <li><a class="text-muted" href="welcome.php">Menu</a></li>
      </ul>
    </div>
	
  </div>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</html>
