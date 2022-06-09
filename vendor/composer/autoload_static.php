<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7714f0a670086dad9828db26b9915506
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Projeto\\GaleriaDeFotos\\' => 23,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Projeto\\GaleriaDeFotos\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7714f0a670086dad9828db26b9915506::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7714f0a670086dad9828db26b9915506::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7714f0a670086dad9828db26b9915506::$classMap;

        }, null, ClassLoader::class);
    }
}
