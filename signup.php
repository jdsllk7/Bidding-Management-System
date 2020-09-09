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
			<?php include 'db/register_db.php'; ?>
			<form method="post" class="clearfix" id="registerForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" autocomplete="on">
				<div class="col-md-6">
					<div class="billing-details">
						<p>Already have an account ? <a href="login.php">Login Here</a></p>
						<div class="section-title">
							<h3 class="title">Create New Account</h3>
						</div>
						<div class="form-group">
							<input class="input" type="text" name="username" placeholder="Username" required>
						</div>
						<div class="form-group">
							<input class="input" type="email" name="email" placeholder="Email" required>
						</div>
						<div class="form-group">
							<input class="input" type="password" name="password" placeholder="Password" required>
						</div>
						<div class="form-group">
							<input class="input" type="password" name="repeatPassword" placeholder="Repeat Password" required>
						</div>
					</div>
					<div class="text-center">
						<button type="submit" class="primary-btn btn-block">Create Account</button>
					</div>
				</div>

				<div class="col-md-6">

					<div class="shiping-methods">
						<div class="section-title">
							<h4 class="title">WHY SIGN UP WITH US</h4>
						</div>
						<div class="caption">
							<label for="shipping-2">Set You Price</label>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
								<p>
						</div>

						<br>

						<div class="caption">
							<label for="shipping-2">Get More For Less</label>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
								<p>
						</div>

						<br>

						<div class="caption">
							<label for="shipping-2">Find What You Need</label>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
								<p>
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