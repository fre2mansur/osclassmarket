<?php
$loopClass = '';
$type = 'items';
if(View::newInstance()->_exists('listType')){
    $type = View::newInstance()->_get('listType');
}
if(View::newInstance()->_exists('listClass')){
    $loopClass = View::newInstance()->_get('listClass');
}
?>

    <?php
        $i = 0;

        if($type == 'latestItems'){
            while ( osc_has_latest_items() ) {
                $class = '';
                if($i%3 == 0){
                    $class = 'first';
                }
                market_draw_item($class);
                $i++;
            }
        } elseif($type == 'premiums'){
            while ( osc_has_premiums() ) {
                $class = '';
                if($i%3 == 0){
                    $class = 'first';
                }
                market_draw_item($class,false,true);
                $i++;
                if($i == 3){
                    break;
                }
            }
        } else {
            search_ads_listing_top_fn();
            while(osc_has_items()) {
                $i++;
                $class = false;
                if($i%4 == 0){
                    $class = 'last';
                }
                $admin = false;
                if(View::newInstance()->_exists("listAdmin")){
                    $admin = true;
                }

                market_draw_item($class,$admin);

                if(market_show_as()=='gallery') {
                    if($i%8 == 0){
                        osc_run_hook('search_ads_listing_medium');
                    }
                } else if(market_show_as()=='list') {
                    if($i%6 == 0){
                        osc_run_hook('search_ads_listing_medium');
                    }
                }
          }
        }
    ?>
