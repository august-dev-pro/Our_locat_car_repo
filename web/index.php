<?php
require_once '../vendor/autoload.php';

use August\Controllers\HomeController;
use August\Helpers\Router;


$monRouter = new Router();

$monRouter->addRoute("/", "August\\Controllers\\HomeController", "index");
$monRouter->addRoute("/cars", "August\\Controllers\\CarsController", "index");
$monRouter->addRoute("/profil", "August\\Controllers\\ProfilController", "index");
$monRouter->addRoute("/login", "August\\Controllers\\UserController", "loginUser");
$monRouter->addRoute("/register", "August\\Controllers\\UserController", "registerUsern");

/* Run router */

$monRouter->route();
