<?php

namespace App\Services;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

interface BaseServiceInterface
{
    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return bool
     */
    public function create(Response $response, Request $request);

    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return bool
     */
    public function update(Response $response, Request $request);

    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return bool
     */
    public function delete(Response $response, Request $request);

    /**
     * @param \Psr\Http\Message\ResponseInterface $response
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return array
     */
    public function find(Response $response, Request $request);

    /**
     * @param array $params
     * @return array
     */
    public function all(array $params);
}

?>