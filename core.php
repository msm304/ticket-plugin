<?php
/*
Plugin Name: تیکت پشتیبانی
Plugin URI: https://owebra.com
Description: افزونه تیکت پشتیبانی
Author: Amirhosein Soltani
Version: 1.0.0
Author URI: https://owebra.com
*/

defined('ABSPATH') || exit('Not Access');
require 'inc/tkt-assets.php';
require 'inc/tkt-db.php';
require 'inc/admin/abstract/base-menu.php';
require 'inc/admin/abstract/tkt-menu.php';
class Core
{
    private static $_instance = null;
    const MINIMUM_PHP_VERSION = '7.2';
    public static function instance()
    {
        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    public function __construct()
    {
        if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '<')) {
            add_action('admin_notices', [$this, 'admin_php_notice']);
            return;
        }
        $this->constants();
        $this->init();
    }
    public function constants()
    {
        if (!function_exists('get_plugin_data')) {
            require_once(ABSPATH . 'wp-admin/includes/plugin.php');
        }
        define('TKT_BASE_FILE', __FILE__);
        define('TKT_PATH', trailingslashit(plugin_dir_path(TKT_BASE_FILE)));
        define('TKT_URL', trailingslashit(plugin_dir_url(TKT_BASE_FILE)));
        define('TKT_ADMIN_ASSETS', trailingslashit(plugin_dir_url(TKT_URL . 'assets/admin')));
        define('TKT_FRONT_ASSETS', trailingslashit(plugin_dir_url(TKT_URL . 'assets/front')));

        $tkt_plugin_data = get_plugin_data(TKT_BASE_FILE);
        define('TKT_VER', $$tkt_plugin_data['Version']);
    }
    public function init()
    {
        register_activation_hook(TKT_BASE_FILE, [$this, 'active']);
        register_deactivation_hook(TKT_BASE_FILE, [$this, 'deactive']);
        new TKT_Assets();
        if(is_admin()){
            new TKT_Menu();
        }
    }
    public function active()
    {
        TKT_DB::create_tables();    
    }
    public function deactive()
    {
    }
    public function admin_php_notice()
    { ?>
        <div class="notice notice-warning">
            <p> افزونه تیکت پشتیبانی برای اجرای صحیح نیاز به نسخه php 7.2 به بالا دارد، لطفا نسخه php هاست خود را ارتقا دهید.
            </p>
        </div>
<?php
    }
}

Core::instance();
