<?php
if( osc_item_is_spam() || osc_premium_is_spam() ) {
        osc_add_hook('header','market_nofollow_construct');
    } else {
        osc_add_hook('header','market_follow_construct');
    }
	market_add_body_class('item');
	osc_current_web_theme_path('header.php');
?>
<section id="item-detail" style="background: #f4f4f4;" class="pt-4 pb-4">
	<div class="container">
    	<div class="row">
            <div class="col-md-2 d-none d-md-block">
            	<img width="150" alt="Card image cap" src="<?php echo item_default_image_url(); ?>" class="rounded">
            </div>
            <div class="col-md-10">
            	<div class="col-7 float-left">
                  <h5><b><a class="text-dark" href="<?php echo osc_item_url();?>"><?php echo osc_item_title();?></a></b> <br /><small>Version: <?php echo item_version(); ?> | Licence: Free | Author: <a href="<?php echo osc_user_public_profile_url(osc_item_user_id());?>"><?php echo osc_item_contact_name();?></a></small></h5>
                
                  <p class="mb-0"><?php echo osc_highlight( strip_tags( osc_item_description()), 100) ; ?></p>
                  <p class="mb-0 text-secondary"><small><?php echo osc_item_views(); ?> Downloads</small></p>
                </div>
              	<div class="col-5 float-right">
               	<div class="buttons mt-4">
                  <?php if(osc_is_admin_user_logged_in()){ ?>
                  	<button class="btn btn-info">Demo</button>
                  <?php } ?>
                    <a href="<?php echo download_url(); ?>" class="btn btn-dark">Download</a>
                  </div>
                  
            	</div>
            </div>
         </div>
	</div>
</section>
<section id="item-detail" class="pt-4 pb-4">
	<div class="container">
    	<div class="row">
        	<div class="col-md-8">
            	<div class="content">
                	<h2><?php echo osc_item_title();?></h2>
            	<div>
					      <?php if( osc_count_item_resources() > 0 ) { ?> 
                    	<h4>Screenshots</h4>
                    	 <?php //for ( $i = 0; osc_has_item_resources(); $i++ ) { ?>
                            <img src="<?php echo osc_resource_url(); ?>" alt="<?php echo osc_item_title(); ?>" title="<?php echo osc_item_title(); ?>" />
                          <?php //} ?>
                <?php } ?>
          </div>    
              		<?php echo osc_item_description(); ?>
                    <br /><br />
                    <?php osc_run_hook('list_questions');?>
                    <?php echo osc_run_hook('questions_comment'); ?>
                </div>
            </div>
           
            <div class="col-md-4">
            	<div class="card p-2 text-center">
                	<div class="profile-picture" style="margin: 0 auto;">
                		<?php //echo show_avatar(osc_item_user_id()); ?>
                    </div>
                    <div class="author">
                     <h5><b><a class="text-dark" href="<?php echo osc_user_public_profile_url();?>"><?php echo osc_item_contact_name();?></a></b> </h5>
                      <?php if(osc_is_admin_user_logged_in()){ ?>
                      <h5><small><?php echo user_total_plugins(osc_item_user_id()); ?> plugins | <?php echo user_total_themes(osc_item_user_id()); ?> Themes  <?php if(osc_is_admin_user_logged_in()){ ?>| 140 Posts <?php } ?></small></h5>
                      <p><button class="btn btn-danger btn-sm">Follow</button> 120 followers <br /></p>
                      <button class="btn btn-success">Job offer</button>
                      <?php } ?>
                 </div>
                 
                 <?php if(osc_get_preference('donation_link', 'donation_link_'.osc_item_user_id()) !=''){ ?>
                 <a target="_blank" href="<?php echo osc_get_preference('donation_link', 'donation_link_'.osc_item_user_id()); ?>" class="btn btn-primary mb-1">Donate</a>
                 <?php } ?>
            </div>
          
        </div>
    </div>
</section>
<?php osc_current_web_theme_path('footer.php'); ?>