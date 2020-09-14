<?php
include 'db/connect.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Online Auction Management System</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="css/slick.css" />
	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/style.css" />
	<link type="text/css" rel="stylesheet" href="css/style1.css" />

</head>

<body>
	<!-- HEADER -->
	<header>
		<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="index.php">
							<img src="./img/bid1.jpg" alt="">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Search -->
					<h2 class="header-search">
						Online Auction Management System
					</h2>
					<!-- /Search -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">

						<div class="form-group">
							<label for="">Search By Category Here</label>

							<select name="Product Category" onchange="location = this.value;">
								<option value="">- Select Category -</option>
								<option value="index.php?category=all">- View All -</option>
								<option value="index.php?category=Bags and Shoes">Bags and Shoes</option>
								<option value="index.php?category=Cars">Cars</option>
								<option value="index.php?category=Electronic Appliances and Gadgets">Electronic Appliances and Gadgets</option>
								<option value="index.php?category=Jewelry and Watches">Jewelry and Watches</option>
							</select>
							
							<br><br>
						</div>

						<!-- Account -->
						<li class="header-account dropdown default-dropdown">
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-user-o"></i>
								</div>
								<?php
								if (isset($_COOKIE["userId"])) {
									echo '<strong class="text-uppercase">Hi ' . $_COOKIE["username"] . '</strong>';
								}
								if (isset($_COOKIE["admin"])) {
									echo '<strong class="text-uppercase">Hi Boss</strong>';
								}
								?>
							</div>
						</li>
						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobile nav toggle -->
					</ul>
				</div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>
	<!-- /HEADER -->

	<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
				<!-- <div class="category-nav">
					<span class="category-header">Get To Bidding <i class="fa fa-list"></i></span>
					<ul class="category-list">
						<li><a>Vehicles</a></li>
						<li><a>Clothes</a></li>
						<li><a>Phones</a></li>
						<li><a>Laptops</a></li>
					</ul>
				</div>  -->
				<!-- /category nav -->

				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li><a href="index.php">Home</a></li>
						<?php
						if (isset($_COOKIE["userId"]) || isset($_COOKIE["admin"])) {
							echo '
							<li><a href="db/logOut.php">Logout</a></li>
							';
						} elseif (!isset($_COOKIE["userId"]) && !isset($_COOKIE["admin"])) {
							echo '
							<li><a href="login.php">Login</a></li>
							<li><a href="signup.php">Create Account</a></li>
							';
						}
						if (isset($_COOKIE["admin"])) {
							echo '
							<li><a href="upload.php">Upload</a></li>
							';
						}
						?>
						<!-- <li class="dropdown default-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Pages <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="index.html">Home</a></li>
								<li><a href="products.html">Products</a></li>
								<li><a href="product-page.html">Product Details</a></li>
								<li><a href="checkout.html">Checkout</a></li>
							</ul>
						</li> -->
					</ul>
				</div>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->


	<?php
	if (isset($_GET["msg"])) {

		if ($_GET["type"] == 'true') {
			echo '
			<div class="alert alert-success alert-dismissible in">
				' . $_GET["msg"] . '
			</div>
			';
		} elseif ($_GET["type"] == 'false') {
			echo '
			<div class="alert alert-danger alert-dismissible in">
				' . $_GET["msg"] . '
			</div>
			';
		}
	}
	?>