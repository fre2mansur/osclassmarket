<?php
if(osc_count_items() == 0 || stripos($_SERVER['REQUEST_URI'], 'search')) {
    osc_add_hook('header','market_nofollow_construct');
} else {
    osc_add_hook('header','market_follow_construct');
}

market_add_body_class('search');
?>
<?php osc_current_web_theme_path('header.php') ; ?>
<section id="search" class="pt-4 pb-4 gray-bg">
    <div class="container">
    	<div class="filter text-right">
        	<?php if(osc_is_admin_user_logged_in()) { ?>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value=""> Plugins
                    </label>
                </div>
                <div class="form-check form-check-inline disabled">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="" disabled> Themes
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value=""> Free
                    </label>
                </div>
                <div class="form-check form-check-inline disabled">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="" disabled> Paid
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value=""> Latest
                    </label>
                </div>
                <div class="form-check form-check-inline disabled">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" value="" disabled> Downloads
                    </label>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<section id="search-data" class="mt-4">
	<div class="container">
    	<div class="row">
            <?php osc_current_web_theme_path('search-sidebar.php'); ?>
            <div class="col-md-9">
                <h1><?php echo search_title(); ?></h1>
                <?php if(osc_count_items() == 0) { ?>
                    <p class="empty" ><?php printf(__('There are no results matching "%s"', 'market'), osc_search_pattern()) ; ?></p>
                <?php } else { ?>
                    <?php if(osc_count_items() > 0) { ?>
                        <?php View::newInstance()->_exportVariableToView("listType", 'items'); ?>
                        <?php osc_current_web_theme_path('loop.php'); ?>
                        <div class="paginate">
                            <?php // echo osc_search_pagination(); ?>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php osc_current_web_theme_path('footer.php'); ?>
