<?php

namespace App\Routes;

use Slim\Routing\RouteCollectorProxy;
use App\Controllers\BebidasController;

class BebidaRoutes implements BaseRoutesInterface
{
    public static function getRoutes()
    {
        return function (RouteCollectorProxy $bebidas) {

            $controller = new BebidasController;

            $bebidas->post("/", [$controller, "create"]);
            $bebidas->put("/{id}", [$controller, "update"]);
            $bebidas->delete("/{id}", [$controller, "delete"]);
            $bebidas->get("/{id}", [$controller, "find"]);
            $bebidas->get("/", [$controller, "all"]);
        };
    }
}

?>