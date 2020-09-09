<?php 
include 'head.php'; 
if (isset($_COOKIE["userId"]) || isset($_COOKIE["admin"])) {
	header('Location:index.php');
}
?>


<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
		<?php include 'db/login_db.php'; ?>
          <form method="post" class="clearfix" id="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="on">
				<div class="col-md-6">
					<div class="billing-details">
						<p>Don't have an account yet ? <a href="signup.php">Create Now</a></p>
						<div class="section-title">
							<h3 class="title">LOGIN</h3>
						</div>
						<div class="form-group">
							<input class="input" type="email" name="email" placeholder="Email" required>
						</div>
						<div class="form-group">
							<input class="input" type="password" name="password" placeholder="Password" required>
						</div>
					</div>
					<div class="text-center">
						<button type="submit" class="primary-btn btn-block">Login</button>
					</div>
				</div>

				<div class="col-md-6">

					<div class="shiping-methods">
						<div class="section-title">
							<h4 class="title">Welcome Back!</h4>
						</div>
						<div class="caption">
							<label for="shipping-2">It's good to see you again</label>
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

