<?php

namespace App\Routes;

use Slim\Routing\RouteCollectorProxy;
use App\Controllers\PedidoBebidasController;

class PedidoBebidasRoutes implements BaseRoutesInterface
{
    public static function getRoutes()
    {
        return function (RouteCollectorProxy $pedidoBebidas) {

            $controller = new PedidoBebidasController;

            $pedidoBebidas->post("/", [$controller, "create"]);
            $pedidoBebidas->put("/{id}", [$controller, "update"]);
            $pedidoBebidas->delete("/{id}", [$controller, "delete"]);
            $pedidoBebidas->get("/{id}", [$controller, "find"]);
            $pedidoBebidas->get("/", [$controller, "all"]);
        };
    }
}

?>