<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit505a7dd590e95628831573a37c812223
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit505a7dd590e95628831573a37c812223::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit505a7dd590e95628831573a37c812223::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
