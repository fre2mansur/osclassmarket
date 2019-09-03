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

class MarketModel_CoreItem extends DAO {
    private static $instance;

    public static function newInstance() {
        if(!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    function __construct() {
        parent::__construct();
        $this->setTableName('t_item');
        $this->setPrimaryKey('pk_i_id');
        $this->setFields(array(
            'pk_i_id',
            'fk_i_user_id',
            'fk_i_category_id',
            'dt_pub_date',
            'dt_mod_date',
            'f_price',
            'i_price',
            'fk_c_currency_code',
            's_contact_name',
            's_contact_email',
            'b_premium',
            's_ip',
            'b_enabled',
            'b_active',
            'b_spam',
            's_secret',
            'b_show_email',
            'dt_expiration'
        ));
    }

    public function countByCategoryUser($category, $user) {
        $category = Category::newInstance()->findRootCategory($category)['pk_i_id'];

        $this->dao->select('count(*) as total');
        $this->dao->from($this->getTableName().' i');
        $this->dao->join(DB_TABLE_PREFIX.'t_category c', 'c.pk_i_id = i.fk_i_category_id');
        $this->dao->where('i.fk_i_category_id', $category);
        $this->dao->where('i.fk_i_user_id', $user);

        $result = $this->dao->get();
        if($result == false) {
            return 0;
        }
        $total_ads = $result->row();
        return (int) $total_ads['total'];
    }
}
?>
