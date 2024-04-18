<?php

namespace App\Routes;

use Slim\Routing\RouteCollectorProxy;
use App\Controllers\CoberturasController;

class CoberturasRoutes implements BaseRoutesInterface
{
    public static function getRoutes()
    {
        return function (RouteCollectorProxy $coberturas) {

            $controller = new CoberturasController;

            $coberturas->post("/", [$controller, "create"]);
            $coberturas->put("/{id}", [$controller, "update"]);
            $coberturas->delete("/{id}", [$controller, "delete"]);
            $coberturas->get("/{id}", [$controller, "find"]);
            $coberturas->get("/", [$controller, "all"]);
        };
    }
}

?>