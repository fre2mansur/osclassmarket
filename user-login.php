<?php osc_current_web_theme_path('header.php'); ?>

<section id="login" class="pt-4 pb-4 gray-bg">

	<div class="container">

    	<div class="row justify-content-md-center">

			<div class="card col-md-6 col-lg-4 p-4 m-4 m-sm-0">

				<h2>Login</h2>

				<hr />

				<form action="<?php echo osc_base_url(true); ?>" method="post" >

					<input type="hidden" name="page" value="login" />

					<input type="hidden" name="action" value="login_post" />

					<div class="form-group">

						<label for="email">Email address:</label>

						<input type="email" name="email" class="form-control" id="email" required>

					</div>

					<div class="form-group">

						<label for="pwd">Password:</label>

						<input type="password" name="password" class="form-control" id="pwd" required>

					</div>

					<div class="form-check">

						<label class="form-check-label">
<input class="form-check-input" type="checkbox">Remember me
</label>

					</div>

					<button type="submit" class="btn btn-primary btn-block mt-1">Login</button>

					<div class="actions mt-2">

						<a href="<?php echo osc_register_account_url(); ?>">Register</a><br /><a href="<?php echo osc_recover_user_password_url(); ?>">Forgot password?</a>

					</div>

				</form>

			</div>

        </div>

    </div>

</section>

<?php osc_current_web_theme_path('footer.php') ; ?>
