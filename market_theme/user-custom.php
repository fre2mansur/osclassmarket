<?php
  
    // meta tag robots
    osc_add_hook('header','market_nofollow_construct');

    market_add_body_class('user user-custom');
	osc_current_web_theme_path('header.php') ;
?>
<section id="user-profile" style="background: #f4f4f4;" class="pt-4 pb-4">
	<div class="container">
    	<div class="row">
            <div class="button-group float-right">
                <a href="<?php echo osc_user_public_profile_url(); ?>" class="btn btn-primary">My Profile</a> <a href="<?php echo osc_user_profile_url(); ?>" class="btn btn-primary">Edit account</a> <a href="<?php echo osc_user_list_items_url(); ?>" class="btn btn-primary">My Uploads</a>
            </div>
         </div>
    </div>
</section>
<section id="search-data" class="mt-4">
	<div class="container">
    	<div class="row">	
    		<?php echo osc_render_file(); ?>
        </div>
    </div>
</section>
<?php osc_current_web_theme_path('footer.php'); ?>