<?php
// meta tag robots
    osc_add_hook('header','market_follow_construct');
	market_add_body_class('user-public-profile');
	osc_current_web_theme_path('header.php');
?>
 <?php if(!dev(osc_logged_user_id()) and osc_logged_user_id() == osc_user_id()){ 
 	header('Location:'.osc_base_url());
 } ?>
<section id="user-pub-profile" style="background: #f4f4f4;" class="pt-4 pb-4">
	<div class="container">
    	<div class="row">
        	<div class="col-12">
            	<div class="float-left">
            		<?php echo show_letter_avatar(osc_user_name()); ?>
                </div>
            	<div class="col-7 float-left">
                   <h5><b><a class="text-dark" href=""><?php echo osc_user_name();?></a></b> <br /><small><?php echo market_user_total_plugins(osc_user_id()); ?> plugins | <?php echo market_user_total_themes(osc_user_id()); ?> Themes <?php if(osc_is_admin_user_logged_in()){ ?>| 140 Posts <?php } ?></small></h5>
                   <p><?php echo nl2br(osc_user_info()); ?></p>
                <p><?php if (function_exists('show_user_ratings_by_id')) { show_user_ratings_by_id(osc_user_id()); } ?></p>
                <?php if(osc_is_admin_user_logged_in()){ ?>
                	<button class="btn btn-danger btn-sm">Follow</button> 120 followers <br />
                <?php } ?>
                 
                </div>
              	<div class="col-4 float-right">
              		<div class="buttons mt-4">
                  		<?php if(osc_is_admin_user_logged_in()){ ?>
                        <button class="btn btn-primary">Donate</button>
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