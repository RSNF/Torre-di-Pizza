<?php

namespace App\Routes;

use Slim\Routing\RouteCollectorProxy;
use App\Controllers\CartaoCreditoController;

class CartaoRoutes implements BaseRoutesInterface
{
    public static function getRoutes()
    {
        return function (RouteCollectorProxy $cartoes) {

            $controller = new CartaoCreditoController;

            $cartoes->post("/", [$controller, "create"]);
            $cartoes->put("/{id}", [$controller, "update"]);
            $cartoes->delete("/{id}", [$controller, "delete"]);
            $cartoes->get("/{id}", [$controller, "find"]);
            $cartoes->get("/", [$controller, "all"]);
        };
    }
}

?>