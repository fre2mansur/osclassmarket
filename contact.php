<?php osc_current_web_theme_path('header.php'); ?>
<section id="register" style="background: #f4f4f4;" class="pt-4 pb-4">
	<div class="container">
    	
    	<div class="row justify-content-md-center">
         		<div class="card p-4 col-6">
                <h2>Contact us</h2>
                <hr />
        	   <form name="contact_form" action="<?php echo osc_base_url(true); ?>" method="post" >
                <input type="hidden" name="page" value="contact" />
                <input type="hidden" name="action" value="contact_post" />
                <div class="form-group">
                    <label for="email">Name:</label>
                    <input type="text" name="yourName" class="form-control" id="yourName" value="">
                     
                  </div>
                  
                  <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="yourEmail" class="form-control" id="yourEmail" value="">
                   
                  </div>
                  
                  <div class="form-group">
                    <label for="pwd">Subject</label>
                    <input type="password" name="subject" class="form-control" id="subject" value="">
                  
                  </div>
                  <div class="form-group">
                    <label for="pwd">Message</label>
                    
                    <textarea id="message" class="form-control" name="message" rows="10"></textarea>
                  </div>
                  
                  <button type="submit" class="btn btn-primary btn-block">Send</button>
                  
                </form>
             </div> 
        </div>
    </div>
</section>
<?php osc_current_web_theme_path('footer.php') ; ?>