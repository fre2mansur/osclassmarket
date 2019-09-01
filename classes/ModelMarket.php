<?php
if(!defined('ABS_PATH')) exit('ABS_PATH is not loaded. Direct access is not allowed.');

class MarketModel extends DAO {
    private static $instance;

    public static function newInstance() {
        if(!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    function __construct() {
        parent::__construct();
    }

    public function getSQL($file) {
        $path = MARKET_PATH.'assets/model/'.$file;
        $sql = file_get_contents($path);

        return $sql;
    }

    public function install() {
        $sql = $this->getSQL('install.sql');
        if(!$this->dao->importSQL($sql)) {
            throw new Exception('Installation error: MarketModel:'.$file);
        }
    }

    public function uninstall() {
        $sql = $this->getSQL('uninstall.sql');
        if(!$this->dao->importSQL($sql)) {
            throw new Exception('Uninstallation error: MarketModel:'.$file);
        }
    }
}

class MarketModel_User extends DAO {
    private static $instance;

    public static function newInstance() {
        if(!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    function __construct() {
        parent::__construct();
        $this->setTableName('t_user_market');
        $this->setPrimaryKey('fk_i_user_id');
        $this->setFields(array('fk_i_user_id', 's_donation_link', 's_profile_pic'));
    }
}

class MarketModel_Item extends DAO {
    private static $instance;

    public static function newInstance() {
        if(!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    function __construct() {
        parent::__construct();
        $this->setTableName('t_item_market');
        $this->setPrimaryKey('fk_i_item_id');
        $this->setFields(array('fk_i_item_id', 's_file_zip', 's_file_link', 's_file_version', 's_github_url', 'i_downloads'));
    }
}
?>
