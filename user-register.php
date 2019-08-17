<?php osc_current_web_theme_path('header.php'); ?>
<section id="register" style="background: #f4f4f4;" class="pt-4 pb-4">
	<div class="container">
    	
    	<div class="row justify-content-md-center">
         		<div class="card p-4 col-4">
                <h2>Register</h2>
                <hr />
        	   <form name="register" action="<?php echo osc_base_url(true); ?>" method="post" >
                <input type="hidden" name="page" value="register" />
                <input type="hidden" name="action" value="register_post" />
                <div class="form-group">
                    <label for="email">Name:</label>
                    <input type="text" name="s_name" class="form-control" id="email" value="">
                  </div>
                  
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="s_email" class="form-control" id="email" value="">
                    
                  </div>
                  
                  <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" name="s_password" class="form-control" id="s_password" value="">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Repeat Password:</label>
                    <input type="password" name="s_password2" class="form-control" id="s_password2" value="">
                  </div>
                  <div class="form-group">
                    <label for="email">Are you osclass developer?</label><br />
                   <input type="radio" name="b_company" checked="checked"  id="email" value="0"> No
                   <input type="radio" name="b_company"  id="email" value="1"> Yes 
                 </div>
                  <button type="submit" class="btn btn-primary btn-block">Login</button>
                  
                </form>
             </div> 
        </div>
    </div>
</section>
<?php osc_current_web_theme_path('footer.php') ; ?>