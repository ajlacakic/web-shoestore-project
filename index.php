<?php

require 'vendor/autoload.php';
require 'rest/routes/middleware_routes.php';

require 'rest/routes/kids.php';
require 'rest/routes/women.php';
require 'rest/routes/men.php';
require 'rest/routes/users.php';

require 'rest/routes/cart.php';
require 'rest/routes/favorites.php';
require 'rest/routes/auth_routes.php';


Flight::route('/', function() {
    echo 'hello';
});

function allow_preflight() {
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('Access-Control-Allow-Headers: Request, Origin, Content-Type');
        header('Access-Control-Allow-Origin: *');
        die();
    } else {
        header('Access-Control-Allow-Origin: *');
    }
}
allow_preflight();

Flight::start();
