<?php
   // meta tag robots
    if( osc_count_items() == 0 || stripos($_SERVER['REQUEST_URI'], 'search') ) {
        osc_add_hook('header','market_nofollow_construct');
    } else {
        osc_add_hook('header','market_follow_construct');
    }
	market_add_body_class('search');
?>
<?php osc_current_web_theme_path('header.php') ; ?>
<section id="search" style="background: #f4f4f4;" class="pt-4 pb-4">
<div class="container">
	<div class="filter text-right">
    	<?php if(osc_is_admin_user_logged_in()){ ?>
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
        <?php }?>
    </div>
</div>
</section>
<section id="search-data" class="mt-4">
	<div class="container">
    	<div class="row">
        	<div class="col-3 float-left">
                <div class="card p-3">
                   <div class="row justify-content-md-center">
                     <form  action="<?php echo osc_base_url(true); ?>" method="get" class="nocsrf">
                        <input type="hidden" name="page" value="search"/>
                        <input type="hidden" name="sOrder" value="<?php echo osc_search_order(); ?>" />
                        <input type="hidden" name="iOrderType" value="<?php $allowedTypesForSorting = Search::getAllowedTypesForSorting() ; echo $allowedTypesForSorting[osc_search_order_type()]; ?>" />
                        <div class="form-group">
                            <label for="email">Keyword:</label>
                            <input type="query" name="sPattern" class="form-control" id="query">
                        </div>
                      <button type="submit" class="btn btn-primary btn-block">Search</button>
                    </form> 
                  </div>
                </div>
                <h3>Categories</h3>
                 <div class="list-group">
                  <a href="#" class="list-group-item list-group-item-action">Plugins</a>
                  <a href="#" class="list-group-item list-group-item-action disabled">Themes</a>
                </div> 
            </div>
            <div class="col-9 float-right">
                <h1><?php echo search_title(); ?></h1>
                <?php if(osc_count_items() == 0) { ?>
                    <p class="empty" ><?php printf(__('There are no results matching "%s"', 'market'), osc_search_pattern()) ; ?></p>
                <?php } else { ?>
                   <?php if(osc_count_items() > 0) {
                    
                    View::newInstance()->_exportVariableToView("listType", 'items');
                    osc_current_web_theme_path('loop.php');
                    ?>
                    <div class="paginate" >
                          <?php //echo osc_search_pagination(); ?>
                     </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<?php osc_current_web_theme_path('footer.php') ; ?>