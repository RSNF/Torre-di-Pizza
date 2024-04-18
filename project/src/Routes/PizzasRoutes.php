<?php

namespace App\Routes;

use Slim\Routing\RouteCollectorProxy;
use App\Controllers\PizzasController;

class PizzasRoutes implements BaseRoutesInterface
{
    public static function getRoutes()
    {
        return function (RouteCollectorProxy $pizzas) {

            $controller = new PizzasController;

            $pizzas->post("/", [$controller, "create"]);
            $pizzas->put("/{id}", [$controller, "update"]);
            $pizzas->delete("/{id}", [$controller, "delete"]);
            $pizzas->get("/{id}", [$controller, "find"]);
            $pizzas->get("/", [$controller, "all"]);
        };
    }
}

?>