<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitef9e12d2eb4dd421f759b263d51e5cd6
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Aryandev\\zibal\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Aryandev\\zibal\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInitef9e12d2eb4dd421f759b263d51e5cd6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitef9e12d2eb4dd421f759b263d51e5cd6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitef9e12d2eb4dd421f759b263d51e5cd6::$classMap;

        }, null, ClassLoader::class);
    }
}
