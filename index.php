<?php
/**
 * Created by PhpStorm.
 * User: 20161197100045
 * Date: 03/10/2018
 * Time: 11:04
 */
session_start();

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', 'On');

require_once(__DIR__."/vendor/autoload.php");
require_once(__DIR__."/config/constants.php");
require_once(__DIR__."/config/config.php");

$app = new \Slim\App($config);

$container = $app->getContainer();
$container['view'] = new \Slim\Views\PhpRenderer('resources/views/');

$capsule = new Illuminate\Database\Capsule\Manager;
$capsule->addConnection($container->get('settings')['db']);
$capsule->bootEloquent();

$capsule->setAsGlobal();
$capsule->bootEloquent();

require_once('app/routes.php');

$app->run();

?>