<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitf013d35969a63838b242740b738854f9
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Abebooks\\API\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Abebooks\\API\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitf013d35969a63838b242740b738854f9::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitf013d35969a63838b242740b738854f9::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}