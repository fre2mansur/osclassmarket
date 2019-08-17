<?php osc_current_web_theme_path('header.php'); ?>
<section id="login" style="background: #f4f4f4;" class="pt-4 pb-4">
	<div class="container">
    	
    	<div class="row justify-content-md-center">
         		<div class="card p-4">
                <h2>Login</h2>
                <hr />
        	  <form action="<?php echo osc_base_url(true); ?>" method="post" >
                <input type="hidden" name="page" value="login" />
                <input type="hidden" name="action" value="login_post" />
                  <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" name="email" class="form-control" id="email">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" name="password" class="form-control" id="pwd">
                  </div>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox"> Remember me
                    </label>
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">Login</button>
                  <div class="actions">
                <a href="<?php echo osc_register_account_url(); ?>">Register</a><br /><a href="<?php echo osc_recover_user_password_url(); ?>">Forgot password?</a>
            </div>
                </form>
             </div> 
        </div>
    </div>
</section>
<?php osc_current_web_theme_path('footer.php') ; ?>