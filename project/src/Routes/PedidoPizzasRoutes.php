<?php

namespace App\Routes;

use Slim\Routing\RouteCollectorProxy;
use App\Controllers\PedidoPizzasController;

class PedidoPizzasRoutes implements BaseRoutesInterface
{
    public static function getRoutes()
    {
        return function (RouteCollectorProxy $pedidoPizzas) {

            $controller = new PedidoPizzasController;

            $pedidoPizzas->post("/", [$controller, "create"]);
            $pedidoPizzas->put("/{id}", [$controller, "update"]);
            $pedidoPizzas->delete("/{id}", [$controller, "delete"]);
            $pedidoPizzas->get("/{id}", [$controller, "find"]);
            $pedidoPizzas->get("/", [$controller, "all"]);
        };
    }
}

?>