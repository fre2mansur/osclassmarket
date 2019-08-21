<?php osc_current_web_theme_path('header.php'); ?>
<section id="register" class="pt-4 pb-4 gray-bg">
	<div class="container">
    	<div class="row justify-content-md-center">
			<div class="card col-md-6 col-lg-4 p-4 m-4 m-sm-0">
				<h2>Register</h2>
				<hr />
				<form name="register" action="<?php echo osc_base_url(true); ?>" method="post">
					<input type="hidden" name="page" value="register" />
					<input type="hidden" name="action" value="register_post" />
					<div class="form-group">
						<label for="name">Name:</label>
						<input type="text" name="s_name" class="form-control" id="name" required />
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="email" name="s_email" class="form-control" id="email" required />
					</div>
					<div class="form-group">
						<label for="s_password">Password:</label>
						<input type="password" name="s_password" class="form-control" id="s_password" required />
					</div>
					<div class="form-group">
						<label for="s_password2">Repeat password:</label>
						<input type="password" name="s_password2" class="form-control" id="s_password2" required />
					</div>
					<div class="form-group">
						<label for="company">Are you an Osclass developer?</label><br />
						<input type="radio" name="b_company" checked="checked" id="company" value="0"> No
						<input type="radio" name="b_company" id="company" value="1"> Yes
					</div>
					<button type="submit" class="btn btn-primary btn-block">Register</button>
				</form>
			</div>
        </div>
    </div>
</section>
<script>
var pwd = document.getElementById('s_password')
var pwd2 = document.getElementById('s_password2');

function validatePwd() {
  if(pwd.value != pwd2.value) {
      pwd2.setCustomValidity('Passwords don\'t match');
  } else {
      pwd2.setCustomValidity('');
  }
}

pwd.onchange = validatePwd;
pwd2.onkeyup = validatePwd;
</script>
<?php osc_current_web_theme_path('footer.php') ; ?>
