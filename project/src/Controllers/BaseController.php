<?php

namespace App\Controllers;

class BaseController
{
    /**
     * Get values or default to query params.
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return array
     */
    protected function getParams($request)
    {
        return array_merge(
            array(
                "id" => null,
                "field" => null,
                "type" => "JSON",
                "sort" => "ASC",
                "limit" => 100
            ),
            array(
                "id" => $request->getAttribute("id"),
                ...$request->getQueryParams()
            )
        );
    }
}

?>