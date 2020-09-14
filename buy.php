<?php include 'head.php';
if (!isset($_COOKIE["userId"]) && !isset($_COOKIE["admin"])) {
	header('Location:login.php');
}
if (!isset($_GET["productId"])) {
	header('Location:index.php');
}

$productId = $_GET["productId"];

//get product data
$data = mysqli_query($conn, "SELECT * FROM product WHERE productId = $productId");
$product = mysqli_fetch_assoc($data);
$product["pImage"];

//get bid data
$data1 = mysqli_query($conn, "SELECT * FROM bid WHERE productId = $productId");
$bid = mysqli_fetch_assoc($data1);
$bid["pBidCost"];


?>

<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="#">Home</a></li>
			<li class="active">Buy</li>
		</ul>
	</div>
</div>
<!-- /BREADCRUMB -->

<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<form method="post" class="clearfix" action="db/submitBuy.php" autocomplete="on">
				<div class="col-md-6">
					<div class="billing-details">
						<div class="section-title">
							<h3 class="title">Billing Details</h3>
						</div>
						<div class="form-group">
							<input class="input" type="text" name="address" placeholder="Address" required>
						</div>
						<div class="form-group">
							<input class="input" type="text" name="city" placeholder="City" required>
						</div>
						<div class="form-group">
							<input class="input" type="text" name="country" placeholder="Country" required>
						</div>
						<div class="form-group">
							<input class="input" type="text" name="zip" placeholder="ZIP Code" required>
						</div>
						<div class="form-group">
							<input class="input" type="tel" name="tel" placeholder="Telephone" required>
						</div>
						<input class="input" type="hidden" name="productId" value="<?php echo $productId; ?>">
						<input class="input" type="hidden" name="userId" value="<?php echo $_COOKIE["userId"]; ?>">
						<input class="input" type="hidden" name="finalCost" value="<?php echo $bid["pBidCost"]; ?>">
					</div>
				</div>

				<div class="col-md-6">

					<div class="payments-methods">
						<div class="section-title">
							<h4 class="title">Payments Methods</h4>
						</div>
						<div class="input-checkbox">
							<input type="radio" name="payments" id="payments-1" checked>
							<label for="payments-1">Direct Bank Transfer</label>
							<div class="caption">
								<p><b> RECOMMENDED: </b> Direct Bank Transfer Allows Real-Time Deductions and Accountability With 100% Efficiency.
									<p>
							</div>
						</div>
						<div class="input-checkbox">
							<input type="radio" name="payments" id="payments-2">
							<label for="payments-2"></label>
							<div class="caption">
								
							</div>
						</div>
						<div class="input-checkbox">
							<input type="radio" name="payments" id="payments-3">
							<label for="payments-3"></label>
							<div class="caption">
								
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-12">
					<div class="order-summary clearfix">
						<div class="section-title">
							<h3 class="title">Order Review</h3>
						</div>
						<table class="shopping-cart-table table">
							<thead>
								<tr>
									<th>Product</th>
									<th></th>
									<th class="text-center">Price</th>
									<th class="text-center">Quantity</th>
									<th class="text-center">Total</th>
									<th class="text-right"></th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td class="thumb"><img src="<?php echo $product["pImage"]; ?>" alt=""></td>
									<td class="details">
										<a href="#"><?php echo $product["pName"]; ?></a>
									</td>
									<td class="price text-center"><strong><?php echo $bid["pBidCost"]; ?></strong></td>
									<td class="qty text-center"><strong>1</strong></td>
									<td class="total text-center"><strong class="primary-color"><?php echo $bid["pBidCost"]; ?></strong></td>
									<td class="text-right"><a href="index.php" class="main-btn icon-btn"><i class="fa fa-close"></i></a></td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<th class="empty" colspan="3"></th>
									<th>SUBTOTAL</th>
									<th colspan="2" class="sub-total"><?php echo $bid["pBidCost"]; ?></th>
								</tr>
								<tr>
									<th class="empty" colspan="3"></th>
									<th>DELIVERY</th>
									<td colspan="2">Free Delivery</td>
								</tr>
								<tr>
									<th class="empty" colspan="3"></th>
									<th>TOTAL</th>
									<th colspan="2" class="total"><?php echo $bid["pBidCost"]; ?></th>
								</tr>
							</tfoot>
						</table>
						<div class="pull-right">
							<button type="submit" class="primary-btn">Make Payment</button>
						</div>
					</div>

				</div>
			</form>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->

<?php include 'footer.php'; ?>