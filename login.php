<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tropical Code</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="style_new.css">
</head>
<body>
	 <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="index.html">Tropical Code|Home</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="about.html">About</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="services.html">Services</a></li>
                        <li class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				          Products
				        </a>
				        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				          <a class="dropdown-item" href="shoes.html">Shoes</a>
				          <a class="dropdown-item" href="watches.html">Watches</a>
				          <div class="dropdown-divider"></div>
				          <a class="dropdown-item" href="clothes.html">Clothes</a>
				        </div>
				      	</li>
                        <!-- <li class="nav-item"><a class="nav-link js-scroll-trigger" href="order.html">Order</a></li> -->
                        <li class="nav-item dropdown">
				        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				          Orders
				        </a>
				        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
				          <a class="dropdown-item" href="register.php">Register</a>
				          <a class="dropdown-item" href="login.php">Login</a>
				          <div class="dropdown-divider"></div>
				          <a class="dropdown-item" href="index.php">Buy_Now</a>
				        </div>
				      	</li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="contact.html">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <br>
        <br>
        <br>

	<div class="header">
		<h2>Login</h2>
	</div>
	
	<form method="post" action="login.php">

		<?php include('errors.php'); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>
	<br>




	 <!-- Footer-->
        <footer class="bg-light py-5" style="background: linear-gradient(90deg,#d5dca5, #58a895);">
            <div class="container"><div class="small text-center text-muted" style="font-size: 20px; font-family: emoji;">© Copyright 2020. Tropical Code PLC. All Rights Reserved.</div></div>
        </footer>

	<script src="js/jquery-3.5.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.js"></script>
	<script src="js/script.js"></script>
	<script src="js/main.js"></script>



</body>
</html>