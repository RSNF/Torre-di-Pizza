<?php

use App\Routes\PizzariaRoutes;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

include_once __DIR__ . "/bootstrap.php";

class MyApp
{
    public \Slim\App $server;

    function __construct()
    {
        $this->server = AppFactory::create();
        $this->middlewares();
        $this->routes();
    }

    private function middlewares()
    {
        $this->server->addRoutingMiddleware();
    }

    private function routes()
    {
        $this->server->group("/api", PizzariaRoutes::getRoutes());
    }
}

$myApp = new MyApp();
$myApp->server->run();

?>