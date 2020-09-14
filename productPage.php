<?php include 'head.php';
if (!isset($_COOKIE["userId"]) && !isset($_COOKIE["admin"])) {
	header('Location:login.php');
}
if (!isset($_GET["productId"])) {
	header('Location:index.php');
}
?>

<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">


			<!--  Product Details -->
			<?php include 'db/submitBid.php'; ?>
			<?php

			$productId = $_GET["productId"];
			$data = mysqli_query($conn, "SELECT * FROM product WHERE productId = $productId");
			$result = mysqli_fetch_assoc($data);

			//check if already bid

			$newBidPrice = $username = $userId = '';

			$data1 = mysqli_query($conn, "SELECT * FROM bid WHERE productId = $productId");
			if (mysqli_num_rows($data1) == 1) {
				$result1 = mysqli_fetch_assoc($data1);
				$username = $result1["username"];
				$userId = $result1["userId"];
				$newBidPrice = $result1["pBidCost"];
			} else {
				$username = $_COOKIE["username"] . ' (You)';
				$newBidPrice = $result["pInitialCost"];
			}

			echo '<div class="product product-details clearfix">
					<div class="col-md-6">
						<div id="product-main-view">

							<div class="product-view">
								<img class="prodImage" src="' . $result["pImage"] . '" alt="">
							</div>

						</div>
					</div>'; ?>

			<form method="post" class="col-md-6" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="on">

				<?php
				echo '<div class="product-body">
					<div class="product-thumb">
								Time Left:
								<ul class="product-countdown">
									<li><span><span id="day">00</span> D</span></li>
									<li><span><span id="hour">00</span> H</span></li>
									<li><span><span id="minute">00</span> M</span></li>
									<li><span><span id="second">00</span> S</span></li>
								</ul>
							</div>
							<br>
					<div class="product-label">
						<span class="sale">' . $result["pName"] . '</span>
					</div>
					<br>
					<p>' . $result["pDescription"] . '</p>

					<br>
					<div class="product-btns">
						<h4 class="product-price">CURRENT BID PRICE: <i class="product-label">K ' . $newBidPrice . ' Per Item</i></h4>
						<p><strong>Bidder:</strong> ' . $username . '</p>
						
						<div class="qty-input" id="price">
							<b class="text-uppercase">ENTER COUNTER BID PRICE: </b><br>
								K<input class="input" placeholder="Enter Amount (K)" style="width: 200px;" type="number" name="newBidPrice" required>
								<input type="hidden" value="' . $productId . '" name="productId">
						</div>

						<br>
						<br>';
				echo '<button id="submit" type="submit" class="primary-btn add-to-cart"><i class="fa fa-money"></i> SUBMIT BID</button>';

				if (new DateTime() > new DateTime($result["bCountDown"]) && $userId == $_COOKIE["userId"]) {
					echo '<a href="buy.php?productId=' . $productId . '" class="primary-btn add-to-cart" id="buy"><i class="fa fa-money"></i> BUY</a>';
				}

				echo '<input type="hidden" name="oldBidPrice" value="' . $newBidPrice . '">';

				echo '</div>
						</div>
					</form>

				</div>';
				echo '<input type="hidden" value="' . $result["bCountDown"] . '" id="bCountDown">';
				?>
				<!-- /Product Details -->

		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->

<br>
<br>
<br>
<br>
<br>
<?php include 'footer.php'; ?>

<script>
	var bCountDown = document.getElementById("bCountDown").value;

	// Split timestamp into [ Y, M, D, h, m, s ]
	var t = bCountDown.split(/[- :]/);

	// Apply each element to the Date function
	var countDownDate = new Date(Date.UTC(t[0], t[1] - 1, t[2], t[3], t[4], t[5]));

	// Update the count down every 1 second
	var x = setInterval(function() {

		// Get today's date and time
		var now = new Date().getTime();

		// Find the distance between now and the count down date
		var distance = countDownDate - now;

		// Time calculations for days, hours, minutes and seconds
		var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		var seconds = Math.floor((distance % (1000 * 60)) / 1000);

		if (days >= 0 || hours >= 0 || minutes >= 0 || seconds >= 0) {
			// Output the result in an element with id="demo"
			document.getElementById("day").innerHTML = days;
			document.getElementById("hour").innerHTML = hours;
			document.getElementById("minute").innerHTML = minutes;
			document.getElementById("second").innerHTML = seconds;

			document.getElementById("buy").style.display = "none";
			document.getElementById("submit").style.display = "block";
			document.getElementById("price").style.display = "block";
		} else {
			document.getElementById("day").innerHTML = '00';
			document.getElementById("hour").innerHTML = '00';
			document.getElementById("minute").innerHTML = '00';
			document.getElementById("second").innerHTML = '00';

			document.getElementById("buy").style.display = "inline";
			document.getElementById("submit").style.display = "none";
			document.getElementById("price").style.display = "none";
		}


		// If the count down is over, write some text 
		// <p id="demo"> </p>
		if (distance < 0) {
			clearInterval(x);
			document.getElementById("demo").innerHTML = "Bid time is up.";
		}
	}, 1000);
</script>