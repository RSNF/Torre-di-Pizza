<?php

namespace App\Routes;

interface BaseRoutesInterface
{
    /**
     * @return \Closure(\Slim\Routing\RouteCollectorProxy $routes): void
     */
    public static function getRoutes();
}

?>