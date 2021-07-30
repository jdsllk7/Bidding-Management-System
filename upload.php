<?php 
include 'db/db_upload.php';
include 'head.php';
if (!isset($_COOKIE["userId"]) && !isset($_COOKIE["admin"])) {
	header('Location:login.php');
}
?>


<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			
			<form class="clearfix" enctype="multipart/form-data" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

				<div class="col-md-6">
					<div class="billing-details">
						<div class="section-title">
							<h3 class="title">UPLOAD PRODUCT</h3>
						</div>
						<div class="form-group">
							<label for="">Product Name</label>
							<input class="input" type="text" name="pName" placeholder="Product Name" required>
						</div>
						<div class="form-group">
							<label for="">Product Description</label>
							<textarea class="form-control" name="pDescription" placeholder="Product Description" rows="3" cols="4" required></textarea>
						</div>

						<div class="form-group">
							<label for="">Select Category</label>
							<select name="ProductCategory" required>
								<option value="">- Select -</option>
								<option value="Bags and Shoes">Bags and Shoes</option>
								<option value="Cars">Cars</option>
								<option value="Electronic Appliances and Gadgets">Electronic Appliances and Gadgets</option>
								<option value="Jewelry and Watches">Jewelry and Watches</option>
							</select>
							<br><br>
						</div>

						<div class="form-group">
							<label for="">Image</label>
							<input type="file" name="pImage" class="input" accept=".jpg,.png,.jpeg" />
						</div>
						<div class="form-group">
							<label for="">Quantity</label>
							<input class="input" type="number" title="Can't Not Be Edited" name="pQuantity" min="1" value="1" readonly placeholder="Quantity" required>
						</div>
						<div class="form-group">
							<label for="">Cost (K)</label>
							<input class="input" type="number" name="pInitialCost" min="1" placeholder="Cost (K)" required>
						</div>
						<div class="form-group">
							<label for="">Duration</label>
							<input class="input" type="datetime-local" name="duration" required>
						</div>
					</div>
					<div class="text-center">
						<button type="submit" class="primary-btn btn-block">UPLOAD</button>
					</div>
				</div>

				<div class="col-md-6">

					<div class="shiping-methods">
						<div class="section-title">
							<h4 class="title">More products</h4>
						</div>
						<div class="caption">
							<label for="shipping-2">Let's get bidding!</label>
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