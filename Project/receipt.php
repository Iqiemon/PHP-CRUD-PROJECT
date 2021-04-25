<?php
$total_price = 0;
$subtotal = 0;
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<html>
<head>
<title>Cart</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" >
<link rel="stylesheet" href="style.css" >
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<head>
<body>
<center>
  <nav class="site-header sticky-top py-1 text-white bg-dark">
  <div class="container d-flex flex-column flex-md-row justify-content-between">
    <a class="py-2" href="welcome.php" aria-label="Product">
      <svg xmlns="http://www.w3.org/2000/svg" href="welcome.php" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24" focusable="false"><title>Product</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
    </a>
    <a class="py-2 d-none d-md-inline-block" href="product.php">Product</a>
    <a class="py-2 d-none d-md-inline-block" href="cart.php">Checkout</a>
    <a class="py-2 d-none d-md-inline-block" href="logout.php">Log Out</a>
  </div>
</nav>
<div class="px-4 px-lg-0">
  <!-- For demo purpose -->
  <div class="container py-5 text-center">
    <h1 class="display-4 text-white"><b>Receipt</b></h1>
    </p>
  </div>
  <!-- End -->

  <div class="pb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-5 bg-dark  rounded shadow-sm mb-5">

          <!-- Shopping cart table -->
          <div class="table-responsive">
		  <?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    
?>	
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase">Product</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Price</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Quantity</div>
                  </th>
                </tr>
              </thead>
              <tbody>
			  <?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
                  <th scope="row" class="border-0">
                    <div class="p-2">
                      <img src="<?php echo $item["image"]; ?>" alt="" width="70" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a class="text-white d-inline-block align-middle"><?php echo $item["name"]; ?></a></h5><span class="text-muted font-weight-normal font-italic d-block"></span>
                      </div>
                    </div>
                  </th>
                  <td class="border-0 align-middle text-light"><strong><?php echo "$ ".$item["price"]; ?></strong></td>
                  <td class="border-0 align-middle text-light"><strong><?php echo $item["quantity"]; ?></strong></td>
                </tr>
				
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
				$subtotal = $total_price+10;
		}
		?>
			
                
              </tbody>
            </table>
			
			   <div class="row py-5 p-4  bg-dark rounded shadow-sm">
			   <div class="col-lg-6">
          <div class="p-4">

          </div>
        </div>
        <div class="col-lg-6">
 
          <div class="p-4">

            <ul class="list-unstyled mb-4 text-white">
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class=" ">Order Subtotal </strong><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></li>
              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="">Shipping and handling</strong><strong>$10.00</strong></li>

              <li class="d-flex justify-content-between py-3 border-bottom"><strong class="">Subtotal </strong> <strong> <?php echo "$ ".number_format($subtotal, 2 ); ?></strong></li>
                
              </li>
            </ul>
          </div>
        </div>
      </div>
			 <?php
} else {
?>
<div><p style="color:white">Your Cart is Empty.</p></div>
<?php 
}
?>
          </div>
          <!-- End -->
        </div>
      </div>

	
  </div>
</center>

   

    </div>
  </div>
</div>

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
</html>
