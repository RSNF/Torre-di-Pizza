<?php

namespace App\Routes;

use Slim\Routing\RouteCollectorProxy;
use App\Controllers\PedidosController;

class PedidosRoutes implements BaseRoutesInterface
{
    public static function getRoutes()
    {
        return function (RouteCollectorProxy $pedidos) {

            $controller = new PedidosController;

            $pedidos->post("/", [$controller, "create"]);
            $pedidos->put("/{id}", [$controller, "update"]);
            $pedidos->delete("/{id}", [$controller, "delete"]);
            $pedidos->get("/{id}", [$controller, "find"]);
            $pedidos->get("/", [$controller, "all"]);
        };
    }
}

?>