<?php

/**



DEFINES



*/

	include('function_extra.php');

	include 'classes/RandomColor.php';

	use \Colors\RandomColor;

    define('MARKET_THEME_VERSION', '100');

    if( (string)osc_get_preference('keyword_placeholder', 'market')=="" ) {

        Params::setParam('keyword_placeholder', __('ie. PHP Programmer', 'market') ) ;

    }

	

	if( (string)osc_get_preference('ft_widget_1', 'market')=="" ) {

	 Params::setParam('ft_widget_1', __('Sample content', 'market') ) ;

}



if( (string)osc_get_preference('ft_widget_2', 'market')=="" ) {

	 Params::setParam('ft_widget_2', __('Sample Content Too', 'market') ) ;

}



if( (string)osc_get_preference('fb_page', 'market')=="" ) {

	 Params::setParam('fb_page', __('Your facebook page', 'market') ) ;

}



if( (string)osc_get_preference('twit_page', 'market')=="" ) {

	 Params::setParam('twit_page', __('Your Twitter Page', 'market') ) ;

}



    osc_register_script('fancybox', osc_current_web_theme_url('js/fancybox/jquery.fancybox.pack.js'), array('jquery'));

    osc_enqueue_style('fancybox', osc_current_web_theme_url('js/fancybox/jquery.fancybox.css'));

    osc_enqueue_script('fancybox');



    osc_enqueue_style('font-awesome', osc_current_web_theme_url('css/font-awesome-4.1.0/css/font-awesome.min.css'));

    // used for date/dateinterval custom fields

    osc_enqueue_script('php-date');

    if(!OC_ADMIN) {

        osc_enqueue_style('fine-uploader-css', osc_assets_url('js/fineuploader/fineuploader.css'));

        osc_enqueue_style('market-fine-uploader-css', osc_current_web_theme_url('css/ajax-uploader.css'));

    }

    osc_enqueue_script('jquery-fineuploader');





/**



FUNCTIONS



*/



    // install options

    if( !function_exists('market_theme_install') ) {

        function market_theme_install() {

            osc_set_preference('keyword_placeholder', Params::getParam('keyword_placeholder'), 'market');

            osc_set_preference('version', MARKET_THEME_VERSION, 'market');

            osc_set_preference('footer_link', '1', 'market');

            osc_set_preference('donation', '0', 'market');

            osc_set_preference('defaultShowAs@all', 'list', 'market');

            osc_set_preference('defaultShowAs@search', 'list');

            osc_set_preference('defaultLocationShowAs', 'dropdown', 'market'); // dropdown / autocomplete

			

			osc_set_preference('ft_widget_1', Params::getParam('ft_widget_1'), 'market');

			

			osc_set_preference('ft_widget_2', Params::getParam('ft_widget_2'), 'market');

			

			osc_set_preference('fb_page', Params::getParam('fb_page'), 'market');

			

			osc_set_preference('twit_page', Params::getParam('twit_page'), 'market');

			

			osc_set_preference('thenme_view', 'List', 'market');

			

			osc_set_preference('color', 'Red', 'market');



            osc_reset_preferences();

        }

    }

    // update options

    if( !function_exists('market_theme_update') ) {

        function market_theme_update($current_version) {

            if($current_version==0) {

                market_theme_install();

            }

            osc_delete_preference('default_logo', 'market');



            $logo_prefence = osc_get_preference('logo', 'market');

            $logo_name     = 'market_logo';

            $temp_name     = WebThemes::newInstance()->getCurrentThemePath() . 'images/logo.jpg';

            if( file_exists( $temp_name ) && !$logo_prefence) {



                $img = ImageResizer::fromFile($temp_name);

                $ext = $img->getExt();

                $logo_name .= '.'.$ext;

                $img->saveToFile(osc_uploads_path().$logo_name);

                osc_set_preference('logo', $logo_name, 'market');

            }

            osc_set_preference('version', '301', 'market');



            if($current_version<313 || $current_version=='3.0.1') {

                // add preferences

                osc_set_preference('defaultLocationShowAs', 'dropdown', 'market');

                osc_set_preference('version', '313', 'market');

            }

            osc_set_preference('version', '314', 'market');

            osc_reset_preferences();

        }

    }

    if(!function_exists('check_install_market_theme')) {

        function check_install_market_theme() {

            $current_version = osc_get_preference('version', 'market');

            //check if current version is installed or need an update<

            if( $current_version=='' ) {

                market_theme_update(0);

            } else if($current_version < MARKET_THEME_VERSION){

                market_theme_update($current_version);

            }

        }

    }



    if(!function_exists('market_add_body_class_construct')) {

        function market_add_body_class_construct($classes){

            $marketBodyClass = marketBodyClass::newInstance();

            $classes = array_merge($classes, $marketBodyClass->get());

            return $classes;

        }

    }

    if(!function_exists('market_body_class')) {

        function market_body_class($echo = true){

            /**

            * Print body classes.

            *

            * @param string $echo Optional parameter.

            * @return print string with all body classes concatenated

            */

            osc_add_filter('market_bodyClass','market_add_body_class_construct');

            $classes = osc_apply_filter('market_bodyClass', array());

            if($echo && count($classes)){

                echo 'class="'.implode(' ',$classes).'"';

            } else {

                return $classes;

            }

        }

    }

    if(!function_exists('market_add_body_class')) {

        function market_add_body_class($class){

            /**

            * Add new body class to body class array.

            *

            * @param string $class required parameter.

            */

            $marketBodyClass = marketBodyClass::newInstance();

            $marketBodyClass->add($class);

        }

    }

    if(!function_exists('market_nofollow_construct')) {

        /**

        * Hook for header, meta tags robots nofollos

        */

        function market_nofollow_construct() {

            echo '<meta name="robots" content="noindex, nofollow, noarchive" />' . PHP_EOL;

            echo '<meta name="googlebot" content="noindex, nofollow, noarchive" />' . PHP_EOL;



        }

    }

    if( !function_exists('market_follow_construct') ) {

        /**

        * Hook for header, meta tags robots follow

        */

        function market_follow_construct() {

            echo '<meta name="robots" content="index, follow" />' . PHP_EOL;

            echo '<meta name="googlebot" content="index, follow" />' . PHP_EOL;



        }

    }

    /* logo */

    if( !function_exists('logo_header') ) {

        function logo_header() {

             $logo = osc_get_preference('logo','market');

             $html = '<a href="'.osc_base_url().'"><img border="0" alt="' . osc_page_title() . '" src="' . market_logo_url() . '"></a>';

             if( $logo!='' && file_exists( osc_uploads_path() . $logo ) ) {

                return $html;

             } else {

                return '<a href="'.osc_base_url().'">'.osc_page_title().'</a>';

            }

        }

    }

    /* logo */

    if( !function_exists('market_logo_url') ) {

        function market_logo_url() {

            $logo = osc_get_preference('logo','market');

            if( $logo ) {

                return osc_uploads_url($logo);

            }

            return false;

        }

    }

    if( !function_exists('market_draw_item') ) {

        function market_draw_item($class = false,$admin = false, $premium = false) {

            $filename = 'loop-single';

            if($premium){

                $filename .='-premium';

            }

            require WebThemes::newInstance()->getCurrentThemePath().$filename.'.php';

        }

    }

    if( !function_exists('market_show_as') ){

        function market_show_as(){



            $p_sShowAs    = Params::getParam('sShowAs');

            $aValidShowAsValues = array('list', 'gallery');

            if (!in_array($p_sShowAs, $aValidShowAsValues)) {

                $p_sShowAs = market_default_show_as();

            }



            return $p_sShowAs;

        }

    }

	if( !function_exists('market_default_thenme_view') ){

    function market_default_thenme_view(){

        return getPreference('thenme_view','market');

    }

}



if( !function_exists('market_default_color') ){

    function market_default_color(){

        return getPreference('color','market');

    }

}





    if( !function_exists('market_default_show_as') ){

        function market_default_show_as(){

            return getPreference('defaultShowAs@all','market');

        }

    }

    if( !function_exists('market_default_location_show_as') ){

        function market_default_location_show_as(){

            return osc_get_preference('defaultLocationShowAs','market');

        }

    }

    if( !function_exists('market_draw_categories_list') ) {

        function market_draw_categories_list(){ ?>

        <?php if(!osc_is_home_page()){ echo '<div class="resp-wrapper">'; } ?>

         <?php

         //cell_3

        $total_categories   = osc_count_categories();

        $col1_max_cat       = ceil($total_categories/3);



         osc_goto_first_category();

         $i      = 0;



         while ( osc_has_categories() ) {

         ?>

        <?php

            if($i%$col1_max_cat == 0){

                if($i > 0) { echo '</div>'; }

                if($i == 0) {

                   echo '<div class="cell_3 first_cel">';

                } else {

                    echo '<div class="cell_3">';

                }

            }

        ?>

        <ul class="r-list">

             <li>

                 <h1>

                    <?php

                    $_slug      = osc_category_slug();

                    $_url       = osc_search_category_url();

                    $_name      = osc_category_name();

                    $_total_items = osc_category_total_items();

                    if ( osc_count_subcategories() > 0 ) { ?>

                    <span class="collapse resp-toogle"><i class="fa fa-caret-right fa-lg"></i></span>

                    <?php } ?>

                    <?php if($_total_items > 0) { ?>

                    <a class="category <?php echo $_slug; ?>" href="<?php echo $_url; ?>"><?php echo $_name ; ?></a> <span>(<?php echo $_total_items ; ?>)</span>

                    <?php } else { ?>

                    <a class="category <?php echo $_slug; ?>" href="#"><?php echo $_name ; ?></a> <span>(<?php echo $_total_items ; ?>)</span>

                    <?php } ?>

                 </h1>

                 <?php if ( osc_count_subcategories() > 0 ) { ?>

                   <ul>

                         <?php while ( osc_has_subcategories() ) { ?>

                             <li>

                             <?php if( osc_category_total_items() > 0 ) { ?>

                                 <a class="category sub-category <?php echo osc_category_slug() ; ?>" href="<?php echo osc_search_category_url() ; ?>"><?php echo osc_category_name() ; ?></a> <span>(<?php echo osc_category_total_items() ; ?>)</span>

                             <?php } else { ?>

                                 <a class="category sub-category <?php echo osc_category_slug() ; ?>" href="#"><?php echo osc_category_name() ; ?></a> <span>(<?php echo osc_category_total_items() ; ?>)</span>

                             <?php } ?>

                             </li>

                         <?php } ?>

                   </ul>

                 <?php } ?>

             </li>

        </ul>

        <?php

                $i++;

            }

            echo '</div>';

        ?>

        <?php if(!osc_is_home_page()){ echo '</div>'; } ?>

        <?php

        }

    }

    if( !function_exists('market_search_number') ) {

        /**

          *

          * @return array

          */

        function market_search_number() {

            $search_from = ((osc_search_page() * osc_default_results_per_page_at_search()) + 1);

            $search_to   = ((osc_search_page() + 1) * osc_default_results_per_page_at_search());

            if( $search_to > osc_search_total_items() ) {

                $search_to = osc_search_total_items();

            }



            return array(

                'from' => $search_from,

                'to'   => $search_to,

                'of'   => osc_search_total_items()

            );

        }

    }

    /*

     * Helpers used at view

     */

    if( !function_exists('market_item_title') ) {

        function market_item_title() {

            $title = osc_item_title();

            foreach( osc_get_locales() as $locale ) {

                if( Session::newInstance()->_getForm('title') != "" ) {

                    $title_ = Session::newInstance()->_getForm('title');

                    if( @$title_[$locale['pk_c_code']] != "" ){

                        $title = $title_[$locale['pk_c_code']];

                    }

                }

            }

            return $title;

        }

    }

    if( !function_exists('market_item_description') ) {

        function market_item_description() {

            $description = osc_item_description();

            foreach( osc_get_locales() as $locale ) {

                if( Session::newInstance()->_getForm('description') != "" ) {

                    $description_ = Session::newInstance()->_getForm('description');

                    if( @$description_[$locale['pk_c_code']] != "" ){

                        $description = $description_[$locale['pk_c_code']];

                    }

                }

            }

            return $description;

        }

    }

    if( !function_exists('related_listings') ) {

        function related_listings() {

            View::newInstance()->_exportVariableToView('items', array());



            $mSearch = new Search();

            $mSearch->addCategory(osc_item_category_id());

            $mSearch->addRegion(osc_item_region());

            $mSearch->addItemConditions(sprintf("%st_item.pk_i_id < %s ", DB_TABLE_PREFIX, osc_item_id()));

            $mSearch->limit('0', '3');



            $aItems      = $mSearch->doSearch();

            $iTotalItems = count($aItems);

            if( $iTotalItems == 3 ) {

                View::newInstance()->_exportVariableToView('items', $aItems);

                return $iTotalItems;

            }

            unset($mSearch);



            $mSearch = new Search();

            $mSearch->addCategory(osc_item_category_id());

            $mSearch->addItemConditions(sprintf("%st_item.pk_i_id != %s ", DB_TABLE_PREFIX, osc_item_id()));

            $mSearch->limit('0', '3');



            $aItems = $mSearch->doSearch();

            $iTotalItems = count($aItems);

            if( $iTotalItems > 0 ) {

                View::newInstance()->_exportVariableToView('items', $aItems);

                return $iTotalItems;

            }

            unset($mSearch);



            return 0;

        }

    }



    if( !function_exists('osc_is_contact_page') ) {

        function osc_is_contact_page() {

            if( Rewrite::newInstance()->get_location() === 'contact' ) {

                return true;

            }



            return false;

        }

    }



    if( !function_exists('get_breadcrumb_lang') ) {

        function get_breadcrumb_lang() {

            $lang = array();

            $lang['item_add']               = __('Publish a listing', 'market');

            $lang['item_edit']              = __('Edit your listing', 'market');

            $lang['item_send_friend']       = __('Send to a friend', 'market');

            $lang['item_contact']           = __('Contact publisher', 'market');

            $lang['search']                 = __('Search results', 'market');

            $lang['search_pattern']         = __('Search results: %s', 'market');

            $lang['user_dashboard']         = __('Dashboard', 'market');

            $lang['user_dashboard_profile'] = __("%s's profile", 'market');

            $lang['user_account']           = __('Account', 'market');

            $lang['user_items']             = __('Listings', 'market');

            $lang['user_alerts']            = __('Alerts', 'market');

            $lang['user_profile']           = __('Update account', 'market');

            $lang['user_change_email']      = __('Change email', 'market');

            $lang['user_change_username']   = __('Change username', 'market');

            $lang['user_change_password']   = __('Change password', 'market');

            $lang['login']                  = __('Login', 'market');

            $lang['login_recover']          = __('Recover password', 'market');

            $lang['login_forgot']           = __('Change password', 'market');

            $lang['register']               = __('Create a new account', 'market');

            $lang['contact']                = __('Contact', 'market');

            return $lang;

        }

    }



    if(!function_exists('user_dashboard_redirect')) {

        function user_dashboard_redirect() {

            $page   = Params::getParam('page');

            $action = Params::getParam('action');

            if($page=='user' && $action=='dashboard') {

                if(ob_get_length()>0) {

                    ob_end_flush();

                }

                header("Location: ".osc_user_list_items_url(), TRUE,301);

            }

        }

        osc_add_hook('init', 'user_dashboard_redirect');

    }



    if( !function_exists('get_user_menu') ) {

        function get_user_menu() {

			$user = User::newInstance()->findByPrimaryKey(osc_user_id());

            $options   = array();

            $options[] = array(

                'name' => __('Public Profile'),

                 'url' => osc_user_public_profile_url(),

               'class' => 'opt_publicprofile'

            );

            $options[] = array(

                'name'  => __('Listings', 'market'),

                'url'   => osc_user_list_items_url(),

                'class' => 'opt_items'

            );

            $options[] = array(

                'name' => __('Alerts', 'market'),

                'url' => osc_user_alerts_url(),

                'class' => 'opt_alerts'

            );

            $options[] = array(

                'name'  => __('Account', 'market'),

                'url'   => osc_user_profile_url(),

                'class' => 'opt_account'

            );

            $options[] = array(

                'name'  => __('Change email', 'market'),

                'url'   => osc_change_user_email_url(),

                'class' => 'opt_change_email'

            );

            $options[] = array(

                'name'  => __('Change username', 'market'),

                'url'   => osc_change_user_username_url(),

                'class' => 'opt_change_username'

            );

            $options[] = array(

                'name'  => __('Change password', 'market'),

                'url'   => osc_change_user_password_url(),

                'class' => 'opt_change_password'

            );

            $options[] = array(

				

                'name'  => __('Delete account', 'market'),

                'url'   =>  osc_base_url(true).'?page=user&action=delete&id='.osc_user_id().'&secret='.$user['s_secret'],

                'class' => 'opt_delete_account'

            );



            return $options;

        }

    }



    if( !function_exists('delete_user_js') ) {

        function delete_user_js() {

            $location = Rewrite::newInstance()->get_location();

            $section  = Rewrite::newInstance()->get_section();

            if( ($location === 'user' && in_array($section, array('dashboard', 'profile', 'alerts', 'change_email', 'change_username',  'change_password', 'items'))) || (Params::getParam('page') ==='custom' && Params::getParam('in_user_menu')==true ) ) {

                osc_enqueue_script('delete-user-js');

            }

        }

        osc_add_hook('header', 'delete_user_js', 1);

    }



    if( !function_exists('user_info_js') ) {

        function user_info_js() {

            $location = Rewrite::newInstance()->get_location();

            $section  = Rewrite::newInstance()->get_section();



            if( $location === 'user' && in_array($section, array('dashboard', 'profile', 'alerts', 'change_email', 'change_username',  'change_password', 'items')) ) {

                $user = User::newInstance()->findByPrimaryKey( Session::newInstance()->_get('userId') );

                View::newInstance()->_exportVariableToView('user', $user);

                ?>

<script type="text/javascript">

    market.user = {};

    market.user.id = '<?php echo osc_user_id(); ?>';

    market.user.secret = '<?php echo osc_user_field("s_secret"); ?>';

</script>

            <?php }

        }

        osc_add_hook('header', 'user_info_js');

    }



    function theme_market_actions_admin() {

        //if(OC_ADMIN)

        if( Params::getParam('file') == 'oc-content/themes/market/admin/settings.php' ) {

            if( Params::getParam('donation') == 'successful' ) {

                osc_set_preference('donation', '1', 'market');

                osc_reset_preferences();

            }

        }



        switch( Params::getParam('action_specific') ) {

            case('settings'):

                $footerLink  = Params::getParam('footer_link');



                osc_set_preference('keyword_placeholder', Params::getParam('keyword_placeholder'), 'market');

                osc_set_preference('footer_link', ($footerLink ? '1' : '0'), 'market');

                osc_set_preference('defaultShowAs@all', Params::getParam('defaultShowAs@all'), 'market');

                osc_set_preference('defaultShowAs@search', Params::getParam('defaultShowAs@all'));



                osc_set_preference('defaultLocationShowAs', Params::getParam('defaultLocationShowAs'), 'market');



                osc_set_preference('header-728x90',         trim(Params::getParam('header-728x90', false, false, false)),                  'market');

                osc_set_preference('homepage-728x90',       trim(Params::getParam('homepage-728x90', false, false, false)),                'market');

                osc_set_preference('sidebar-300x250',       trim(Params::getParam('sidebar-300x250', false, false, false)),                'market');

                osc_set_preference('search-results-top-728x90',     trim(Params::getParam('search-results-top-728x90', false, false, false)),          'market');

                osc_set_preference('search-results-middle-728x90',  trim(Params::getParam('search-results-middle-728x90', false, false, false)),       'market');

				

				osc_set_preference('ft_widget_1', trim(Params::getParam('ft_widget_1', false, false, false)), 'market');



				osc_set_preference('ft_widget_2', trim(Params::getParam('ft_widget_2', false, false, false)), 'market');

				

				osc_set_preference('fb_page', Params::getParam('fb_page'), 'market');

				

				osc_set_preference('twit_page', Params::getParam('twit_page'), 'market');

				

				osc_set_preference('thenme_view', Params::getParam('thenme_view'), 'market');

				

				osc_set_preference('color', Params::getParam('color'), 'market');





                osc_add_flash_ok_message(__('Theme settings updated correctly', 'market'), 'admin');

                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/market/admin/settings.php'));

            break;

            case('upload_logo'):

                $package = Params::getFiles('logo');

                if( $package['error'] == UPLOAD_ERR_OK ) {

                    $img = ImageResizer::fromFile($package['tmp_name']);

                    $ext = $img->getExt();

                    $logo_name     = 'market_logo';

                    $logo_name    .= '.'.$ext;

                    $path = osc_uploads_path() . $logo_name ;

                    $img->saveToFile($path);



                    osc_set_preference('logo', $logo_name, 'market');



                    osc_add_flash_ok_message(__('The logo image has been uploaded correctly', 'market'), 'admin');

                } else {

                    osc_add_flash_error_message(__("An error has occurred, please try again", 'market'), 'admin');

                }

                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/market/admin/header.php'));

            break;

            case('remove'):

                $logo = osc_get_preference('logo','market');

                $path = osc_uploads_path() . $logo ;

                if(file_exists( $path ) ) {

                    @unlink( $path );

                    osc_delete_preference('logo','market');

                    osc_reset_preferences();

                    osc_add_flash_ok_message(__('The logo image has been removed', 'market'), 'admin');

                } else {

                    osc_add_flash_error_message(__("Image not found", 'market'), 'admin');

                }

                osc_redirect_to(osc_admin_render_theme_url('oc-content/themes/market/admin/header.php'));

            break;

        }

    }



    function market_redirect_user_dashboard()

    {

        if( (Rewrite::newInstance()->get_location() === 'user') && (Rewrite::newInstance()->get_section() === 'dashboard') ) {

            header('Location: ' .osc_user_profile_url());

            exit;

        }

    }



    function market_delete() {

        Preference::newInstance()->delete(array('s_section' => 'market'));

    }



    osc_add_hook('init', 'market_redirect_user_dashboard', 2);

    osc_add_hook('init_admin', 'theme_market_actions_admin');

    osc_add_hook('theme_delete_market', 'market_delete');

    osc_admin_menu_appearance(__('Header logo', 'market'), osc_admin_render_theme_url('oc-content/themes/market/admin/header.php'), 'header_market');

    osc_admin_menu_appearance(__('Theme settings', 'market'), osc_admin_render_theme_url('oc-content/themes/market/admin/settings.php'), 'settings_market');

/**



TRIGGER FUNCTIONS



*/

check_install_market_theme();

if(osc_is_home_page()){

    osc_add_hook('inside-main','market_draw_categories_list');

} else if( osc_is_static_page() || osc_is_contact_page() ){

    osc_add_hook('before-content','market_draw_categories_list');

}



if(osc_is_home_page() || osc_is_search_page()){

    market_add_body_class('has-searchbox');

}





function market_sidebar_category_search($catId = null)

{

    $aCategories = array();

    if($catId==null) {

        $aCategories[] = Category::newInstance()->findRootCategoriesEnabled();

    } else {

        // if parent category, only show parent categories

        $aCategories = Category::newInstance()->toRootTree($catId);

        end($aCategories);

        $cat = current($aCategories);

        // if is parent of some category

        $childCategories = Category::newInstance()->findSubcategoriesEnabled($cat['pk_i_id']);

        if(count($childCategories) > 0) {

            $aCategories[] = $childCategories;

        }

    }



    if(count($aCategories) == 0) {

        return "";

    }



    market_print_sidebar_category_search($aCategories, $catId);

}



function market_print_sidebar_category_search($aCategories, $current_category = null, $i = 0)

{

    $class = '';

    if(!isset($aCategories[$i])) {

        return null;

    }



    if($i===0) {

        $class = 'class="category"';

    }



    $c   = $aCategories[$i];

    $i++;

    if(!isset($c['pk_i_id'])) {

        echo '<ul '.$class.'>';

        if($i==1) {

            echo '<li><a href="'.osc_esc_html(osc_update_search_url(array('sCategory'=>null, 'iPage'=>null))).'">'.__('All categories', 'market')."</a></li>";

        }

        foreach($c as $key => $value) {

    ?>

            <li>

                <a id="cat_<?php echo osc_esc_html($value['pk_i_id']);?>" href="<?php echo osc_esc_html(osc_update_search_url(array('sCategory'=> $value['pk_i_id'], 'iPage'=>null))); ?>">

                <?php if(isset($current_category) && $current_category == $value['pk_i_id']){ echo '<strong>'.$value['s_name'].'</strong>'; }

                else{ echo $value['s_name']; } ?>

                </a>



            </li>

    <?php

        }

        if($i==1) {

        echo "</ul>";

        } else {

        echo "</ul>";

        }

    } else {

    ?>

    <ul <?php echo $class;?>>

        <?php if($i==1) { ?>

        <li><a href="<?php echo osc_esc_html(osc_update_search_url(array('sCategory'=>null, 'iPage'=>null))); ?>"><?php _e('All categories', 'market'); ?></a></li>

        <?php } ?>

            <li>

                <a id="cat_<?php echo osc_esc_html($c['pk_i_id']);?>" href="<?php echo osc_esc_html(osc_update_search_url(array('sCategory'=> $c['pk_i_id'], 'iPage'=>null))); ?>">

                <?php if(isset($current_category) && $current_category == $c['pk_i_id']){ echo '<strong>'.$c['s_name'].'</strong>'; }

                      else{ echo $c['s_name']; } ?>

                </a>

                <?php market_print_sidebar_category_search($aCategories, $current_category, $i); ?>

            </li>

        <?php if($i==1) { ?>

        <?php } ?>

    </ul>

<?php

    }

}



/**



CLASSES



*/

class marketBodyClass

{

    /**

    * Custom Class for add, remove or get body classes.

    *

    * @param string $instance used for singleton.

    * @param array $class.

    */

    private static $instance;

    private $class;



    private function __construct()

    {

        $this->class = array();

    }



    public static function newInstance()

    {

        if (  !self::$instance instanceof self)

        {

            self::$instance = new self;

        }

        return self::$instance;

    }



    public function add($class)

    {

        $this->class[] = $class;

    }

    public function get()

    {

        return $this->class;

    }

}



/**



HELPERS



*/

if( !function_exists('osc_uploads_url')) {

    function osc_uploads_url($item = '') {

        $logo = osc_get_preference('logo', 'market');

        if ($logo != '' && file_exists(osc_uploads_path() . $logo)) {

            $path = str_replace(ABS_PATH, '', osc_uploads_path() . '/');

            return osc_base_url() . $path . $item;

        }

    }

}



/*



    ads  SEARCH



 */

if (!function_exists('search_ads_listing_top_fn')) {

    function search_ads_listing_top_fn() {

        if(osc_get_preference('search-results-top-728x90', 'market')!='') {

            echo '<div class="clear"></div>' . PHP_EOL;

            echo '<div class="ads_728">' . PHP_EOL;

            echo osc_get_preference('search-results-top-728x90', 'market');

            echo '</div>' . PHP_EOL;

        }

    }

}

//osc_add_hook('search_ads_listing_top', 'search_ads_listing_top_fn');



if (!function_exists('search_ads_listing_medium_fn')) {

    function search_ads_listing_medium_fn() {

        if(osc_get_preference('search-results-middle-728x90', 'market')!='') {

            echo '<div class="clear"></div>' . PHP_EOL;

            echo '<div class="ads_728">' . PHP_EOL;

            echo osc_get_preference('search-results-middle-728x90', 'market');

            echo '</div>' . PHP_EOL;

        }

    }

}

osc_add_hook('search_ads_listing_medium', 'search_ads_listing_medium_fn');



function user_filter() {

	if (Params::getParam('userType')) {

		// we may want to have param-specific searches

		if( Params::getParam('userType') == 1) {

			Search::newInstance()->addJoinTable ( 'c', DB_TABLE_PREFIX .'t_user c', DB_TABLE_PREFIX . 't_item.fk_i_user_id = c.pk_i_id', 'INNER' );

			Search::newInstance()->addConditions("c.b_company = 1");

		} else if( Params::getParam('userType') == 2) {

			Search::newInstance()->addJoinTable ( 'c', DB_TABLE_PREFIX .'t_user c', DB_TABLE_PREFIX . 't_item.fk_i_user_id = c.pk_i_id', 'LEFT' );

			Search::newInstance()->addConditions("c.b_company = 0");

		}

	

	}

}

osc_add_hook('search_conditions', 'user_filter');



function highlight_class(){

	if(function_exists('payment_pro_print_highlight_class')){

		if (payment_pro_is_highlighted(osc_item_id())) {

            return "highlight";

        }

	}

}



osc_remove_hook('highlight_class', 'payment_pro_print_highlight_class');



function defaultBlockUser($userId){

	User::newInstance()->update(array('b_enabled' => 0), array('pk_i_id' => $userId['pk_i_id']));

}

osc_run_hook('user_register_completed', 'defaultBlockUser');



//osc_run_hook('pre_user_post', 'defaultBlockUser');

//osc_add_filter('items_processing_row', 'cust_user_activated');



function cust_contact_phone($params) {

	//$yourName  = Params::getParam('yourName');

	//$yourEmail = Params::getParam('yourEmail');

	$yourPhone = "9894967023";

	//$subject   = Params::getParam('subject');

	//$message   = Params::getParam('message');

	//$message_name    = sprintf(__('Name: %s'), $yourName);

	//$message_email   = sprintf(__('Email: %s'), $yourEmail);

	$message_phone   = sprintf(__('Phone: %s'), $yourPhone);

	//$message_subject = sprintf(__('Subject: %s'), $subject);

	//$message_body    = sprintf(__('Message: %s'), $message);

	//$message_date    = sprintf(__('Date: %s at %s'), date('l F d, Y'), date('g:i a'));

	//$message_IP      = sprintf(__('IP Address: %s'), get_ip());

	$message = <<<MESSAGE

//{$message_name}

//{$message_email}

{$message_phone}

//{$message_subject}

//{$message_body}



//{$message_date}

//{$message_IP}

MESSAGE;



$params = array(

	'from'      => osc_contact_email(),

	'to'        => osc_contact_email(),

	'to_name'   => osc_page_title(),

	'reply_to'  => $yourEmail,

	'subject'   => '[' . osc_page_title() . '] ' . __('Contact'),

	'body'      => nl2br($message)

);



    //$params['body'] = $params['body'].'9894967023';

	return $params;

}

function run_if_new($item){

    $itemId = $item['pk_i_id'];
    save_version($itemId);
    
    if(Params::getParam('zip_file')){
    save_file($itemId);
    }
    save_file_link($itemId);

}

function run_if_edit($item){
    $itemId = $item['pk_i_id'];
    save_version($itemId);
    save_file_link($itemId);
    if(Params::getParam('zip_file')){
    save_file($itemId);
    }

}

function run_if_delete($item){

    delete_version($item);
    delete_file($item);
    delete_file_link($item);

}



osc_add_hook('posted_item', 'run_if_new');

osc_add_hook('edited_item', 'run_if_edit');

osc_add_hook('delete_item', 'run_if_delete');



osc_add_filter('contact_params', 'cust_contact_phone');



?>