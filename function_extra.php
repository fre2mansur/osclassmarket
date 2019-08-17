<?php 
//Delete preference
function delete_file_link($item) {
	osc_delete_preference($item.'_file_link', 'market');
}
function delete_version($item) {
	osc_delete_preference($item.'_file_version', 'market');
}
function delete_file($item) {
	osc_delete_preference($item.'_zip_file', 'market');
}
function delete_donation_link($user) {
	osc_delete_preference($user.'_donation_link', 'market');
}

//Get preference
function get_file_link($item) {
	return osc_get_preference($item.'_file_link', 'market');
}
function get_version($item) {
	return osc_get_preference($item.'_file_version', 'market');
}
function get_file($item) {
	return osc_get_preference($item.'_zip_file', 'market');
}
function get_donation_link($user) {
	return osc_get_preference($user.'_donation_link', 'market');
}

//Store preference
function set_file_link($item) {
	osc_set_preference($item.'_file_link', Params::getParam('file_link'), 'market');
}
function set_version($item) {
	osc_set_preference($item.'_file_version', Params::getParam('file_version'), 'market');
}
function set_file($item) {
		$target_dir = osc_content_path()."uploads/";
		$target_file = $target_dir . basename($item."_".$_FILES["zip_file"]["name"]);
		move_uploaded_file($_FILES["zip_file"]["tmp_name"], $target_file);		 
		osc_set_preference($item.'_zip_file', $item."_".$_FILES["zip_file"]["name"], 'market');
}
function set_donation_link($user) {
	osc_set_preference($user.'_donation_link', Params::getParam('donation_link'), 'market');
}

function if_item_is_theme() {
	$aCategories = Category::newInstance()->hierarchy( osc_item_category_id() );
 	$parentCategory = osc_get_category('id', $aCategory['fk_i_parent_id']);
 	if($aCategories[1]['s_name'] == "Themes") {
		return true;
	}
}

function item_default_image_url() {
 	if(if_item_is_theme()) {
		$icon = "images/theme_noimage.jpg";
	} else {
	      $icon = "images/plugin)_noimage.jpg";
	}
 	return osc_current_web_theme_url($icon);
}



function dev($user){
	$dev = User::newInstance()->findByPrimaryKey($user);
	if($dev['b_company'] == 1) { return true;	}
		return false;
	}
		
function market_total_downloads_count($itemId) {	return 0;}

function item_version() {	return get_version(osc_item_id());}function download_url(){
	$id = osc_item_id();
	if(get_file_link($id)) {
		return get_file_link($id);
	} else {
		return osc_base_url()."oc-content/uploads/".get_file(osc_item_id());
	}
}
function user_total_plugins() { }

function user_total_themes() { }





?>