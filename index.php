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

$app = new \Slim\App();
$container = $app->getContainer();
$container['view'] = new \Slim\Views\PhpRenderer('resources/views/');

use App\Models\Datebase;
new Datebase();

require_once('app/routes.php');

$app->run();

?>