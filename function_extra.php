<?php
// Additional fields.
function get_file_link($item) {
	return market_dao_item_get_field('s_file_link', $item);
}

function get_version($item) {
	return market_dao_item_get_field('s_file_version', $item);
}

function get_file($item) {
	return market_dao_item_get_field('s_file_zip', $item);
}

function get_github_url($item) {
	return market_dao_item_get_field('s_github_url', $item);
}

function get_downloads($item) {
	return market_dao_item_get_field('i_downloads', $item);
}

function delete_file($item) {
	return market_dao_item_delete_file($item);
}

function get_donation_link($user) {
	return market_dao_user_get_field('s_donation_link', $user);
}

// Helpers.
function item_is_theme() {
	$aCategories = Category::newInstance()->hierarchy( osc_item_category_id() );
 	$parentCategory = osc_get_category('id', $aCategory['fk_i_parent_id']);
 	if($aCategories[1]['s_name'] == "Themes" || osc_item_category() == "Themes") {
		return true;
	}
}

function item_default_image_url() {
 	if(item_is_theme()) {
		$icon = "images/theme_noimage.jpg";
	} else {
	      $icon = "images/plugin_noimage.jpg";
	}
 	return osc_current_web_theme_url($icon);
}


function dev($user) {
	if(osc_is_web_user_logged_in() && osc_users_enabled()) {
		if(Session::newInstance()->_get('userCompany') != '') {
			return (bool) Session::newInstance()->_get('userCompany');
		} else {
			$dev = User::newInstance()->findByPrimaryKey($user);
			Session::newInstance()->_set('userCompany', $dev['b_company']);
			return (bool) $dev['b_company'];
		}
	}

	return false;
}

function item_version() {
	return get_version(osc_item_id());

}
function download_url(){
	$id = osc_item_id();
	if(get_file_link($id) != '') {
		return get_file_link($id);
	} else {
		return osc_base_url()."oc-content/uploads/".get_file(osc_item_id());
	}
}

function user_total_plugins($user) {
	if(!is_numeric($user)) {
		return 0;
	}

	return MarketModel_CoreItem::newInstance()->countByCategoryUser(MARKET_PLUGINS_CATID, $user);
}

function user_total_themes($user) {
	if(!is_numeric($user)) {
		return 0;
	}

	return MarketModel_CoreItem::newInstance()->countByCategoryUser(MARKET_THEMES_CATID, $user);
}

function user_total_plugins_formatted($user) {
	$count = user_total_plugins($user);
	if($count === 0) {
		return '<strong>No</strong> plugins';
	} elseif($count === 1) {
		return '<strong>1</strong> plugin';
	} else {
		return '<strong>'.$count.'</strong> plugins';
	}
}

function user_total_themes_formatted($user) {
	$count = user_total_themes($user);
	if($count === 0) {
		return '<strong>No</strong> themes';
	} elseif($count === 1) {
		return '<strong>1</strong> theme';
	} else {
		return '<strong>'.$count.'</strong> themes';
	}
}
?>
