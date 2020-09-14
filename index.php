<?php include 'head.php'; ?>

<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- section-title -->
			<div class="col-md-12">
				<div class="section-title">
					<?php
					if (isset($_GET["category"])) {
						$category = $_GET["category"];
						if ($category == 'all') {
							echo '<h2 class="title">Deals Of The Day</h2>';
						} else {
							echo '<h2 class="title">' . $category . '</h2>';
						}
					} else {
						echo '<h2 class="title">Deals Of The Day</h2>';
					}
					?>

					<div class="pull-right">
						<div class="product-slick-dots-1 custom-dots"></div>
					</div>
				</div>
			</div>
			<!-- banner -->
			<div class="col-md-3 col-sm-6 col-xs-6">
				<div class="banner banner-2">
					<img src="./img/banner15.jpg" alt="">
					<div class="banner-caption">
						<h2 class="white-color">NEW<br>COLLECTION</h2>
					</div>
				</div>
			</div>
			<!-- /banner -->

			<!-- Product Slick -->
			<div class="col-md-9 col-sm-6 col-xs-6">
				<div class="row">
					<div id="product-slick-1" class="product-slick">


						<!-- Product Single -->
						<?php

						$category = '';

						if (isset($_GET["category"])) {
							$category = $_GET["category"];
							if ($category == 'all') {
								$category = 'WHERE 1=1';
							} else {
								$category = 'WHERE Category like \'' . $category . '\'';
							}
						}

						$data = mysqli_query($conn, "SELECT * FROM product $category");

						if (mysqli_num_rows($data) > 0) {
							while ($result = mysqli_fetch_assoc($data)) {

								$productId = $result["productId"];
								$bid = $hide = '';

								$data22 = mysqli_query($conn, "SELECT * FROM payments WHERE productId = $productId");
								if (mysqli_num_rows($data22) > 0) {
									$hide = 'hide';
								}



								$data1 = mysqli_query($conn, "SELECT * FROM bid WHERE productId = $productId");
								if (mysqli_num_rows($data1) == 1) {
									$result1 = mysqli_fetch_assoc($data1);
									$bid = '<span>BIDDING IS ON</span>';
									$cost = $result1["pBidCost"];
								} else {
									$cost = $result["pInitialCost"];
									$bid = '<span>' . $result["pQuantity"] . ' in Stoke</span>';
								}

								echo '<div class="product product-single ' . $hide . '" style="height:500px;">
									<div class="product-thumb">
										<div class="product-label ">
											<span>' . $bid . '</span>
										</div>
										<img src="' . $result["pImage"] . '" alt="">
									</div>
									<div class="product-body">
										<h3 class="product-price">K ' . $cost . '</h3>
										<h2 class="product-name">' . $result["pName"] . '</h2>';

								if (isset($_COOKIE["userId"])) {
									echo '<div class="product-btns text-center">
											<a href="productPage.php?productId=' . $result["productId"] . '" class="primary-btn add-to-cart pl-5 pr-5">BID</a>
										</div>';
								}

								echo '</div>
								</div>';
							}
						}


						?>
						<!-- /Product Single -->

					</div>
				</div>
			</div>
			<!-- /Product Slick -->
		</div>
		<!-- /row -->

	</div>
	<!-- /container -->
</div>
<!-- /section -->

<?php include 'footer.php'; ?>