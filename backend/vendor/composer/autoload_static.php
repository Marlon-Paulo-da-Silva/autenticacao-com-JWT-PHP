<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0fe79a80cf7f27f5a795fc684c4e1bf8
{
    public static $prefixLengthsPsr4 = array (
        'a' => 
        array (
            'app\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'app\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0fe79a80cf7f27f5a795fc684c4e1bf8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0fe79a80cf7f27f5a795fc684c4e1bf8::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0fe79a80cf7f27f5a795fc684c4e1bf8::$classMap;

        }, null, ClassLoader::class);
    }
}
