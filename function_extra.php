<?php

function profile_data_edit($userid){

	osc_set_preference('donation_link', Params::getParam('donation_link'), 'donation_link_'.$userid);

}

osc_add_hook('user_edit_completed', 'profile_data_edit');



function dev($user){

	$dev = User::newInstance()->findByPrimaryKey($user);

	if($dev['b_company'] == 1) {

		return true;

	}

	return false;

}

function market_total_downloads_count($itemId) {

	return 0;

}



function item_version() {

	return get_version(osc_item_id());

}





function download_url(){
	$id = osc_item_id();
	if(get_file_link($id)) {
		return get_file_link($id);
	} else {
		return osc_base_url()."oc-content/uploads/".get_file(osc_item_id());
	}
}



function user_total_plugins() { }

function user_total_themes() { }






function delete_file_link($item) {
	osc_delete_preference($item.'_file_link', 'market');
}

function delete_version($item) {
	osc_delete_preference($item.'_file_version', 'market');
}

function delete_file($item) {
	osc_delete_preference($item.'_zip_file', 'market');
}

function get_file_link($item) {
	return osc_get_preference($item.'_file_link', 'market');
}

function get_version($item) {
	return osc_get_preference($item.'_file_version', 'market');
}

function get_file($item) {
	return osc_get_preference($item.'_zip_file', 'market');
}


function save_file_link($item) {
	osc_set_preference($item.'_file_link', Params::getParam('file_link'), 'market');
}

function save_version($item) {
	osc_set_preference($item.'_file_version', Params::getParam('file_version'), 'market');
}

function save_file($item) {
		osc_set_preference($item.'_zip_file', $item."_".$_FILES["zip_file"]["name"], 'market');
		 $target_dir = osc_content_path()."uploads/";

		 $target_file = $target_dir . basename($item."_".$_FILES["zip_file"]["name"]);

		 $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

		 move_uploaded_file($_FILES["zip_file"]["tmp_name"], $target_file);

		 
	
}
 function item_default_image_url() {
 	// $aCategories = Category::newInstance()->hierarchy( osc_item_category_id() );
 	// $parentCategory = osc_get_category('id', $aCategory['fk_i_parent_id']);
 	// $cat = $aCategories[1]['s_name'];
	 // if($cat == "Themes") {
	 //    $icon = "images/theme_noimage.jpg";
	 // } else {
	      $icon = "images/plugin_noimage.jpg";
	 // }
 	return osc_current_web_theme_url($icon);
}

//  function get_file($itemId) {

//  	echo osc_get_preference($itemId_.'file', 'market');

//  }







?>