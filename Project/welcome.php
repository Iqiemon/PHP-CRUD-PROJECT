<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

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
      <svg xmlns="http://www.w3.org/2000/svg" href="welcome.php" width="24" height="24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24" focusable="false"><title>Product</title><circle cx="12" cy="12" r="10"/><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"/></svg>
    </a>
    <a class="py-2 d-none d-md-inline-block" href="product.php">Product</a>
    <a class="py-2 d-none d-md-inline-block" href="cart.php">Checkout</a>
    <a class="py-2 d-none d-md-inline-block" href="logout.php">Log Out</a>
  </div>
</nav>

<div class="jumbotron">
    <div class="container">
      <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to <b>KEDAI KASUT KITA.</b></h1>
	  <h3>Finding your perfect shoes</h3>
      
    </div>
  </div>

    <div class="container">
  <p><img src="images/2 (2).jpg" width="1100px" height="350px"></p>
  <h1 align="center">Introduction</h1>
  <p align="center">At Kedai Kasut Kita, we sell a bundle of shoes that can satisfy your taste. Since 2015, our shop established, 
  Kedai Kasut Kita is a small shop that sell bundle shoes. At 2018,  our marketing raised up and hit our sale. Thus, here we are,
   being one of the famous bundle shoes shop.</p>
  </div>
 
	<br><br><br><br><br>
	
	<div class="container">
	<h2><b>Trending</b><a href="product.php">
	<button type="button" class="btn btn-dark">Shop</button></a>
	</h2>
	</div>
  <div class="container">
    <!-- Example row of columns -->
    <div class="row">
      <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
    <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
        <div class="my-3 py-3">
            <h2 class="display-5">PUMA Comet 2 FS</h2>
            <img src="images/black.jpg" alt="Nature" style="width:280px;height:280px">
        </div>
    </div>

    <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
        <div class="my-3 p-3">
            <h2 class="display-5">PUMA Flyer Runner</h2>
            <img src="images/kanmei.jpg" alt="Nature" style="width:280px;height:280px"><hr>
        </div>
    </div>

    <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
        <div class="my-3 p-3">
            <h2 class="display-5">PUMA Flyer Runner</h2>
            <img src="images/runner.jpg" alt="PUMA FLYER" style="width:280px;height:280px"><hr>
        </div>
    </div>
</div>
    </div>

    <hr>

  </div>
  
  <div class="container">
	<h2 align ="center">Features</h2><br>
	<div class="gif">
		<p align="center"><img src="images/shoes.gif"></p>
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
</html>
