<?php
/**
 * @package  p5galleryPatients
 * ===========================
 * Init plugin
 * ===========================
*/


namespace Inc;

use Inc\Base\P5Activate;
use Inc\Base\P5Deactivate;
use Inc\Pages\Admin;

final class Init
{

    public static function get_services()
    {
        return[
            Pages\Admin::class,
            Base\P5Enqueue::class,
            Base\P5SettingsLinks::class
        ];
    }

    public static function register_services()
    {
        foreach (self::get_services() as $class) {
            $service = self::instantiate($class);
            if(method_exists($service, 'register')){
                $service->register();
            }
        }
    }

    private static function instantiate($class)
    {
        $service = new $class();
        return $service;
    }
}