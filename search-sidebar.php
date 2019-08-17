<?php
$category = osc_search_category_id();
$cat_id = null;
if(!empty($category)) {
    $cat_id = $category[0];
}
?>
<div class="col-md-3 d-none d-md-block">
    <div class="card p-3 mb-3">
        <div class="row justify-content-md-center">
            <form action="<?php echo osc_base_url(true); ?>" method="get" class="nocsrf">
                <input type="hidden" name="page" value="search"/>
                <input type="hidden" name="sOrder" value="<?php echo osc_search_order(); ?>" />
                <input type="hidden" name="iOrderType" value="<?php $allowedTypesForSorting = Search::getAllowedTypesForSorting() ; echo $allowedTypesForSorting[osc_search_order_type()]; ?>" />
                <div class="form-group">
                    <label for="email">Keyword:</label>
                    <input type="query" name="sPattern" class="form-control" id="query" value="<?php echo osc_esc_html(Params::getParam('sPattern')); ?>">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Search</button>
            </form>
        </div>
    </div>
    <h3>Categories</h3>
    <div class="list-group">
        <?php osc_goto_first_category(); ?>
        <?php while(osc_has_categories()) { ?>
            <?php $active = ''; if($cat_id == osc_category_id()) { $active = ' active'; } ?>
            <a href="<?php echo osc_search_category_url(osc_category_id()); ?>" class="list-group-item list-group-item-action<?php echo $active; ?>"><?php echo osc_category_name(); ?></a>
        <?php } ?>
    </div>
  </div>
