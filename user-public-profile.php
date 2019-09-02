<?php

// meta tag robots
    osc_add_hook('header','market_follow_construct');
	market_add_body_class('user-public-profile');
	osc_current_web_theme_path('header.php');
?>

 <?php if(!osc_user_is_company()){
 	header('Location:'.osc_base_url());
 } ?>

<section id="user-pub-profile" style="background: #f4f4f4;" class="pt-4 pb-4">
	<div class="container">
    	<div class="row">
        	<div class="col-12">
            	<div class="float-left">
            		<img src="<?php echo market_get_avatar(osc_user_id()); ?>" alt="<?php echo osc_user_name(); ?>" title="<?php echo osc_user_name(); ?>" class="img-fluid" width="150">
                </div>
            	<div class="col-7 float-left">
                   <h5><strong><?php echo osc_user_name();?></strong> </h5>
                   <p>
                       <span class="count-plugins"><?php echo user_total_plugins_formatted(osc_user_id()); ?></span>
                       <span class="count-divider"> | </span>
                       <span class="count-themes"><?php echo user_total_themes_formatted(osc_user_id()); ?></span>
                        <?php if(osc_is_admin_user_logged_in()) { ?>
                            <span class="count-divider"> | </span>
                            <span class="count-posts"><strong><?php echo rand(10, 99); ?></strong> posts</span>
                        <?php } ?>
                   </p>

                   <p><?php echo nl2br(osc_user_info()); ?></p>
                   <p><?php if (function_exists('show_user_ratings_by_id')) { show_user_ratings_by_id(osc_user_id()); } ?></p>
                    <?php if(osc_is_admin_user_logged_in()){ ?>
                    	<button class="btn btn-danger btn-sm">Follow</button> 120 followers <br />
                    <?php } ?>
                </div>
              	<div class="col-4 ml-auto">
              		<div class="buttons mt-4">
                        <button class="btn btn-primary">Donate</button>
                        <?php if(osc_is_admin_user_logged_in()){ ?>
                            <button class="btn btn-success">Job offer</button>
                        <?php } ?>
                  	</div>
                </div>
            </div>
         </div>
    </div>
</section>

<section id="search-data" class="mt-4">
	<div class="container">
    	<div class="row">
       		<div class="user_item col-9 p-0">
            	<?php if( osc_count_items() > 0 ) { ?>
                    <div class="similar_ads clearfix">
                        <h2 class="pl-3 pb-3"><?php echo osc_user_name(); ?>'s <?php _e('Products', 'market'); ?></h2>
                        <?php osc_current_web_theme_path('loop.php'); ?>
                    </div>
                    <div class="paginate clearfix"><?php echo osc_pagination_items(); ?></div>
                    <?php } ?>
            </div>

            <div class="col-3">
            	<?php osc_run_hook('show_user_review_form'); ?>
            </div>
        </div>
    </div>
</section>
</div>
<?php osc_current_web_theme_path('footer.php') ; ?>
