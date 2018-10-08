<?php
/**
 * Created by PhpStorm.
 * User: 20161197100045
 * Date: 03/10/2018
 * Time: 18:14
 */

namespace App\Models;

use Illuminate\Database\Capsule\Manager;

class Datebase extends Manager
{

    public function __construct(){
        $capsule = new Manager();
        $capsule->addConnection([
            'driver' => DBDRIVER,
            'host' => DBHOST,
            'database' => DBNAME,
            'username' => DBUSER,
            'password' => DBPASS,
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);
        // Setup the Eloquent ORM…
        $capsule->bootEloquent();
    }

}