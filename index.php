<?php
/**
 * Created by PhpStorm.
 * User: 20161197100045
 * Date: 03/10/2018
 * Time: 11:04
 */
session_start();
require_once(__DIR__."/vendor/autoload.php");
require_once(__DIR__."/config/constants.php");
require_once(__DIR__."/config/config.php");



error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');



$app = new \Slim\App($config);
$container = $app->getContainer();
$capsule = new Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();
$container['db'] = function ($container) use ($capsule){
    return $capsule;
};

$container['view'] = new \Slim\Views\PhpRenderer('resources/views/');

require_once('app/routes.php');

$app->run();

?>