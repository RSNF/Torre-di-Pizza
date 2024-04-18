<?php

namespace App\Controllers;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Services\BebidasServices;
use App\Repositories\BebidasRepository\BebidasRepository;

class BebidasController extends BaseController implements BaseControllerInterface
{
    private BebidasServices $bebidasServices;

    public function __construct()
    {
        $this->bebidasServices = new BebidasServices();
    }

    function create(Request $request, Response $response)
    {

    }

    function update(Request $request, Response $response)
    {

    }

    function delete(Request $request, Response $response)
    {

    }

    function find(Request $request, Response $response)
    {

    }

    function all(Request $request, Response $response)
    {
        $params = $this->getParams($request);

        $content = $this->bebidasServices->all($params);

        $response->getBody()->write(json_encode($content));

        return $response;
    }
}

?>