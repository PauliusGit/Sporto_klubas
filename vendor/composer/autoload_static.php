<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3c03bdbfc90e22d4247a4e58a5673612
{
    public static $prefixLengthsPsr4 = array (
        's' => 
        array (
            'srcApp\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'srcApp\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'srcApp\\app\\controllers\\API' => __DIR__ . '/../..' . '/app/controllers/API.php',
        'srcApp\\app\\controllers\\Pages' => __DIR__ . '/../..' . '/app/controllers/Pages.php',
        'srcApp\\app\\controllers\\Posts' => __DIR__ . '/../..' . '/app/controllers/Posts.php',
        'srcApp\\app\\controllers\\Users' => __DIR__ . '/../..' . '/app/controllers/Users.php',
        'srcApp\\app\\libraries\\Controller' => __DIR__ . '/../..' . '/app/libraries/Controller.php',
        'srcApp\\app\\libraries\\Core' => __DIR__ . '/../..' . '/app/libraries/Core.php',
        'srcApp\\app\\libraries\\Database' => __DIR__ . '/../..' . '/app/libraries/Database.php',
        'srcApp\\app\\models\\Post' => __DIR__ . '/../..' . '/app/models/Post.php',
        'srcApp\\app\\models\\User' => __DIR__ . '/../..' . '/app/models/User.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3c03bdbfc90e22d4247a4e58a5673612::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3c03bdbfc90e22d4247a4e58a5673612::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3c03bdbfc90e22d4247a4e58a5673612::$classMap;

        }, null, ClassLoader::class);
    }
}