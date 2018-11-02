<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbbe5df99c72638449b31975ec159f844
{
    public static $classMap = array (
        'ComposerAutoloaderInitbbe5df99c72638449b31975ec159f844' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInitbbe5df99c72638449b31975ec159f844' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Connection' => __DIR__ . '/../..' . '/core/database/Connection.php',
        'MVCTraining\\app\\controllers\\PagesController' => __DIR__ . '/../..' . '/app/controllers/PagesController.php',
        'MVCTraining\\app\\controllers\\TaskController' => __DIR__ . '/../..' . '/app/controllers/TaskController.php',
        'MVCTraining\\app\\controllers\\UserController' => __DIR__ . '/../..' . '/app/controllers/UserController.php',
        'MVCTraining\\app\\models\\Admin' => __DIR__ . '/../..' . '/app/models/Admin.php',
        'MVCTraining\\app\\models\\Task' => __DIR__ . '/../..' . '/app/models/Task.php',
        'MVCTraining\\app\\models\\User' => __DIR__ . '/../..' . '/app/models/User.php',
        'MVCTraining\\core\\Container' => __DIR__ . '/../..' . '/core/Container.php',
        'MVCTraining\\core\\Request' => __DIR__ . '/../..' . '/core/Request.php',
        'MVCTraining\\core\\Router' => __DIR__ . '/../..' . '/core/Router.php',
        'Member' => __DIR__ . '/../..' . '/app/interfaces/Member.php',
        'QueryBuilder' => __DIR__ . '/../..' . '/core/database/QueryBuilder.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitbbe5df99c72638449b31975ec159f844::$classMap;

        }, null, ClassLoader::class);
    }
}
