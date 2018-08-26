<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit78e6c9cb594866515c0470b7031a60c3
{
    public static $prefixLengthsPsr4 = array (
        'L' => 
        array (
            'Ledoc\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Ledoc\\' => 
        array (
            0 => __DIR__ . '/..' . '/ledoc/php-classes/src',
        ),
    );

    public static $classMap = array (
        'EasyPeasyICS' => __DIR__ . '/..' . '/phpmailer/phpmailer/extras/EasyPeasyICS.php',
        'PHPMailer' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmailer.php',
        'PHPMailerOAuth' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmaileroauth.php',
        'PHPMailerOAuthGoogle' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmaileroauthgoogle.php',
        'POP3' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.pop3.php',
        'SMTP' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.smtp.php',
        'ntlm_sasl_client_class' => __DIR__ . '/..' . '/phpmailer/phpmailer/extras/ntlm_sasl_client.php',
        'phpmailerException' => __DIR__ . '/..' . '/phpmailer/phpmailer/class.phpmailer.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit78e6c9cb594866515c0470b7031a60c3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit78e6c9cb594866515c0470b7031a60c3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit78e6c9cb594866515c0470b7031a60c3::$classMap;

        }, null, ClassLoader::class);
    }
}
