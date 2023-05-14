<?php
defined('ABSPATH') || exit('Not Access');

class TKT_Menu extends Base_Menu
{
    public function __construct()
    {
        $this->page_title = 'تیکت پشتیبانی';
        $this->menu_title = 'تیکت پشتیبانی';
        $this->menu_slug = 'ticket-plugin';
        $this->icon = plugins_url('ticket-plugin/assets/admin/images/icon.png');
        // $this->icon = TKT_ADMIN_ASSETS . 'images/icon.png';

        parent::__construct();
    }
    public function page()
    {
        echo 'ticket plugin page';
    }
}
