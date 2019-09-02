<?php osc_current_web_theme_path('header.php') ; ?>
<?php
if(!dev(osc_logged_user_id())){
    header('Location:'.osc_base_url());
}
?>

<section id="user-header" class="pt-4 pb-4 gray-bg">
    <div class="container">
        <div class="row col-md-12">
            <div class="button-group float-right">
                <a href="<?php echo osc_user_list_items_url(); ?>" class="btn btn-primary disabled">My uploads</a>
                <a href="<?php echo osc_user_profile_url(); ?>" class="btn btn-primary">Edit account</a>
                <a href="<?php echo osc_user_public_profile_url(); ?>" class="btn btn-primary">My profile</a>
            </div>
        </div>
    </div>
</section>

<section id="user-items" class="mt-4">
	<div class="container">
    <div class="row">
        <h2 class="h-bold clearfix">
            <?php _e('My products', 'market'); ?>
            <?php if( osc_users_enabled() || (!osc_users_enabled() && !osc_reg_user_post())) { ?>
                <a class="btn btn-skin btn-outline-primary" href="<?php echo osc_item_post_url_in_category(); ?>">Add new</a>
            <?php } ?>
        </h2>
        <div class="col-12">
            <?php if(osc_count_items() == 0) { ?>
                <p class="empty"><?php _e('No listings have been added, yet.', 'market'); ?></p>
            <?php } else {
                View::newInstance()->_exportVariableToView("listAdmin", true);
                osc_current_web_theme_path('loop.php'); ?>
                <div class="paginate">
                    <?php echo osc_pagination_items(); ?>
                </div>
            <?php } ?>
        </div>
    </div>
  </div>
</section>

<?php osc_current_web_theme_path('footer.php') ; ?>
