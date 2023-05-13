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
class Core
{
    public function __construct()
    {
        $this->constants();
        $this->init();
    }
    public function constants()
    {
        if(!function_exists('get_plugin_data')){
            require_once(ABSPATH . 'wp-admin/includes/plugin.php');
        }
        define('TKT_BASE_FILE', __FILE__);
        define('TKT_PATH', trailingslashit(plugin_dir_path(TKT_BASE_FILE)));
        define('TKT_URL', trailingslashit(plugin_dir_url(TKT_BASE_FILE)));
        define('TKT_ADMIN_ASSETS', trailingslashit(plugin_dir_url(TKT_URL . 'assets/admin')));
        define('TKT_FRONT_ASSETS', trailingslashit(plugin_dir_url(TKT_URL . 'assets/front')));

        $tkt_plugin_data = get_plugin_data(TKT_BASE_FILE);
        define('TKT_VER' , $$tkt_plugin_data['Version']);
    }
    public function init(){
        register_activation_hook(TKT_BASE_FILE , [$this , 'active']);
        register_deactivation_hook(TKT_BASE_FILE , [$this , 'deactive']);
        new TKT_Assets();
    }
    public function active()
    {
    }
    public function deactive()
    {
    }
}

$core = new Core();
