<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitec85fe1f9269d9ec1b3161eb2d754423
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitec85fe1f9269d9ec1b3161eb2d754423', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitec85fe1f9269d9ec1b3161eb2d754423', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitec85fe1f9269d9ec1b3161eb2d754423::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
