<?php

namespace App\Routes;

use Slim\Routing\RouteCollectorProxy;
use App\Controllers\UsuariosController;

class UsuariosRoutes implements BaseRoutesInterface
{
    public static function getRoutes()
    {
        return function (RouteCollectorProxy $usuarios) {

            $controller = new UsuariosController();

            $usuarios->post("/", [$controller, "create"]);
            $usuarios->put("/{id}", [$controller, "update"]);
            $usuarios->delete("/{id}", [$controller, "delete"]);
            $usuarios->get("/{id}", [$controller, "find"]);
            $usuarios->get("/", [$controller, "all"]);
        };
    }
}

?>