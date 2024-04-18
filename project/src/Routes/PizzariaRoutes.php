<?php

namespace App\Routes;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Routing\RouteCollectorProxy;

use App\Routes\PizzasRoutes;

class PizzariaRoutes implements BaseRoutesInterface
{
    public static function getRoutes()
    {
        return function (RouteCollectorProxy $routes) {

            $routes->get("/check", function (Request $request, Response $response) {

                $response->getBody()->write(json_encode("Accepted!"));
                $response = $response->withStatus(202);

                return $response;
            });

            $routes->group("/pizza", PizzasRoutes::getRoutes());
            $routes->group("/usuario", UsuariosRoutes::getRoutes());
            $routes->group("/bebida", BebidaRoutes::getRoutes());
            $routes->group("/tamanho", TamanhosRoutes::getRoutes());
            $routes->group("/cobertura", CoberturasRoutes::getRoutes());
            $routes->group("/cartao", CartaoRoutes::getRoutes());
            $routes->group("/pedido", PedidosRoutes::getRoutes());
            $routes->group("/cobertura-pizza", CoberturasRoutes::getRoutes());
            $routes->group("/pedido-bebida", PedidoBebidasRoutes::getRoutes());
            $routes->group("/pedido-pizza", PedidoPizzasRoutes::getRoutes());
        };
    }
}

?>