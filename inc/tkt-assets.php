<?php
defined('ABSPATH') || exit('Not Access');

class TKT_Assets
{
    public function __construct()
    {
        add_action('wp_enqueue_scripts' , [$this , 'front_assets']);
        add_action('admin_enqueue_scripts' , [$this , 'admin_assets']);
    }
    public function admin_assets()
    {
    }
    public function front_assets()
    {
        wp_enqueue_style('tkt-style' , TKT_FRONT_ASSETS . 'css/style.css' , '' ,'')
    }
}
