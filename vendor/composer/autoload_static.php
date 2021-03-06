<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitd3f49e6a1ad6c02101763de1a7c53ebb
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
        'R' => 
        array (
            'RedBeanPHP\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
        'RedBeanPHP\\' => 
        array (
            0 => __DIR__ . '/..' . '/gabordemooij/redbean/RedBeanPHP',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitd3f49e6a1ad6c02101763de1a7c53ebb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitd3f49e6a1ad6c02101763de1a7c53ebb::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
