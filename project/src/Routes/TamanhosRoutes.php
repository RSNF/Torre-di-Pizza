<?php

namespace App\Routes;

use Slim\Routing\RouteCollectorProxy;
use App\Controllers\TamanhosController;

class TamanhosRoutes implements BaseRoutesInterface
{
    public static function getRoutes()
    {
        return function (RouteCollectorProxy $tamanhos) {

            $controller = new TamanhosController;

            $tamanhos->post("/", [$controller, "create"]);
            $tamanhos->put("/{id}", [$controller, "update"]);
            $tamanhos->delete("/{id}", [$controller, "delete"]);
            $tamanhos->get("/{id}", [$controller, "find"]);
            $tamanhos->get("/", [$controller, "all"]);
        };
    }
}

?>