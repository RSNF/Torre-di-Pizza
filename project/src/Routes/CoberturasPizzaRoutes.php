<?php

namespace App\Routes;

use Slim\Routing\RouteCollectorProxy;
use App\Controllers\CoberturasPizzaController;

class CoberturasPizzaRoutes implements BaseRoutesInterface
{
    public static function getRoutes()
    {
        return function (RouteCollectorProxy $coberturasPizza) {

            $controller = new CoberturasPizzaController;

            $coberturasPizza->post("/", [$controller, "create"]);
            $coberturasPizza->put("/{id}", [$controller, "update"]);
            $coberturasPizza->delete("/{id}", [$controller, "delete"]);
            $coberturasPizza->get("/{id}", [$controller, "find"]);
            $coberturasPizza->get("/", [$controller, "all"]);
        };
    }
}

?>