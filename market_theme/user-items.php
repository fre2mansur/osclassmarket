<?php osc_current_web_theme_path('header.php') ; ?>

 <?php if(!dev(osc_logged_user_id())){ 

 	header('Location:'.osc_base_url());

 } ?>

<section id="user-uploads" style="background: #f4f4f4;" class="pt-4 pb-4">

	<div class="container">

    	<div class="row">

            <div class="button-group float-right">

                <a href="<?php echo "http://osclassmarket.com/user/profile/".osc_user_id(); ?>" class="btn btn-primary">My Profile</a> <a href="<?php echo osc_user_profile_url(); ?>" class="btn btn-primary ">Edit account</a> <a href="<?php echo osc_user_list_items_url(); ?>" class="btn btn-primary disabled">My Uploads</a>

            </div>

         </div>

    </div>

</section>

<section id="search-data" class="mt-4">

	<div class="container">
    <div class="row">
      <h2 class="h-bold clearfix"><?php _e('My Products', 'market'); ?>
        <?php if( osc_users_enabled() || ( !osc_users_enabled() && !osc_reg_user_post() )) { ?>
          <a class="btn btn-skin btn-lg" href="<?php echo osc_item_post_url_in_category() ; ?>">Add New</a>
        <?php } ?>
      </h2>
      <div class="col-12">
    		<?php if(osc_count_items() == 0) { ?>
          <p class="empty" ><?php _e('No listings have been added yet', 'market'); ?></p>
        <?php } else { 
          View::newInstance()->_exportVariableToView("listAdmin", true);
          osc_current_web_theme_path('loop.php'); ?>
          <div class="paginate" >
            <?php echo osc_pagination_items(); ?>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
</section>

<?php osc_current_web_theme_path('footer.php') ; ?>

