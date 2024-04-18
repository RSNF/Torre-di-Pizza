<?php

namespace App\Services;

use App\Validators\BebidaValidation;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

use App\Repositories\BebidasRepository\BebidasRepository;
use App\Services\BaseServiceInterface;

class BebidasServices implements BaseServiceInterface
{
    /**
     * @var \App\Repositories\BebidasRepository\BebidasRepository;
     */
    private $repository;

    /**
     * @var \App\Validators\BebidaValidation;
     */
    private $validator;

    public function __construct()
    {
        $this->repository = new BebidasRepository();
        $this->validator = new BebidaValidation();
    }

    function create(Response $response, Request $request)
    {

    }

    function update(Response $response, Request $request)
    {

    }

    function delete(Response $response, Request $request)
    {

    }

    function find(Response $response, Request $request)
    {

    }

    function all(array $params)
    {
        $params["field"] = $this->validator->checkWhiteList($params["field"], ["id", "nome", "preco"]);
        $this->validator->checkWhiteList($params["sort"], ["asc", "desc", "ASC", "DESC"]);

        return $this->repository->all($params);
    }
}

?>