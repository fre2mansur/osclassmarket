<?php
/*
** INCLUDES
*/

require_once MARKET_PATH.'classes/ModelMarket.php';

/*
** INSTALL
*/
function market_dao_install() {
    return MarketModel::newInstance()->install();
}

/*
** USER
*/

function market_dao_user_insert_update($user) {
    $data = array(
        'fk_i_user_id' => $user,
        's_donation_link' => osc_esc_html(Params::getParam('donation_link'))
    );

    if(MarketModel_User::newInstance()->findByPrimaryKey($user) != false) {
        return MarketModel_User::newInstance()->updateByPrimaryKey($data, $user);
    } else {
        return MarketModel_User::newInstance()->insert($data);
    }
}

function market_dao_user_delete($user) {
    return MarketModel_User::newInstance()->deleteByPrimaryKey($user);
}

function market_dao_user_find($user) {
    $data = MarketModel_User::newInstance()->findByPrimaryKey($user);
    $data = (!$data) ? null : $data;
    View::newInstance()->_exportVariableToView('market_user_'.$user, $data);

    return $data;
}

function market_dao_user_get($user) {
    if(View::newInstance()->_get('market_user_'.$user) == '') {
        return market_dao_user_find($user);
    } else {
        return View::newInstance()->_get('market_user_'.$user);
    }
}

function market_dao_user_get_field($field, $user) {
    $data = market_dao_user_get($user);
    if($data != null && array_key_exists($field, $data)) {
        return $data[$field];
    } else {
        return '';
    }
}

function market_dao_user_register_avatar($name, $user) {
    $data = array(
        'fk_i_user_id' => $user,
        's_profile_pic' => osc_esc_html($name),
    );

    if(MarketModel_User::newInstance()->findByPrimaryKey($user) != false) {
        return MarketModel_User::newInstance()->updateByPrimaryKey($data, $user);
    } else {
        return MarketModel_User::newInstance()->insert($data);
    }
}

/*
** ITEM
*/
function market_dao_item_insert($item) {
    return market_dao_item_insert_update($item, true);
}

function market_dao_item_update($item) {
    return market_dao_item_insert_update($item, false);
}

function market_dao_item_insert_update($item, $insert = true) {
    $itemId = $item['pk_i_id'];
    $data = array(
        'fk_i_item_id' => $itemId,
        's_file_version' => osc_esc_html(Params::getParam('file_version')),
        's_file_link' => osc_esc_html(Params::getParam('file_link')),
        's_github_url' => osc_esc_html(Params::getParam('github_url')),
    );

    if(isset($_FILES['zip_file'])){
        $zip = market_dao_upload_zip($itemId);
        $data['s_file_zip'] = $zip;
    }

    if($insert) {
        return MarketModel_Item::newInstance()->insert($data);
    } else {
        return MarketModel_Item::newInstance()->updateByPrimaryKey($data, $itemId);
    }
}

function market_dao_item_delete_file($item) {
    return MarketModel_Item::newInstance()->updateByPrimaryKey(array('s_file_zip' => '', 's_file_link' => ''), $item);
}

function market_dao_item_delete($item) {
    return MarketModel_Item::newInstance()->delete(array('fk_i_item_id' => $item));
}

function market_dao_upload_zip($item) {
    $target_dir = osc_content_path().'uploads/';
    $name = $_FILES['zip_file']['name'];
    $tmpname = $_FILES['zip_file']['tmp_name'];
    $target_file = $target_dir.basename($item.'_'.$name);

    move_uploaded_file($tmpname, $target_file);
    return $item."_".$name;
}

function market_dao_item_find($item) {
    $data = MarketModel_Item::newInstance()->findByPrimaryKey($item);
    $data = (!$data) ? null : $data;
    View::newInstance()->_exportVariableToView('market_item_'.$item, $data);

    return $data;
}

function market_dao_item_get($item) {
    if(View::newInstance()->_get('market_item_'.$item) == '') {
        return market_dao_item_find($item);
    } else {
        return View::newInstance()->_get('market_item_'.$item);
    }
}

function market_dao_item_get_field($field, $item) {
    $data = market_dao_item_get($item);
    if($data != null && array_key_exists($field, $data)) {
        return $data[$field];
    } else {
        return '';
    }
}

function market_dao_item_download($data) {
    $item = $data['fk_i_item_id'];
    $update = array('i_downloads' => $data['i_downloads'] + 1);
    $result = MarketModel_Item::newInstance()->updateByPrimaryKey($update, $item);
    if($result) {
        return json_encode(array('status' => (bool) 1));
    } else {
        return json_encode(array('status' => (bool) 0));
    }
}
?>
