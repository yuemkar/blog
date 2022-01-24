<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4f1e2ef9bbe404dbfc7ad0100972d517
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit4f1e2ef9bbe404dbfc7ad0100972d517::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit4f1e2ef9bbe404dbfc7ad0100972d517::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
