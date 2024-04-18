<?php

namespace App\Repositories\BebidasRepository;

use App\Repositories\BebidasRepository\BebidaInterface;
use App\Repositories\RepoQueries;

class BebidasRepository extends RepoQueries implements BebidaInterface
{
    public function create(array $data)
    {
        $sql = "INSERT INTO pizzaria.bebidas
        (nome, preco)
        VALUES ($1, $2);";

        return $this->doQueryParams($sql, $data);
    }

    public function update(array $data)
    {
        $sql = "UPDATE pizzaria.bebidas SET
        nome = COALESCE($2, nome),
        preco = COALESCE($3, preco)
        WHERE id = $1;";

        return $this->doQueryParams($sql, $data);
    }

    public function delete(string $id)
    {
        $sql = "DELETE FROM pizzaria.bebidas WHERE id = $1;";

        return $this->doQueryParams($sql, array($id));
    }

    public function find(string $id)
    {
        $sql = "SELECT * FROM pizzaria.bebidas WHERE id = $1";

        return $this->getRowParams($sql, array($id));
    }

    public function all(array $params)
    {
        $sql = "SELECT * FROM pizzaria.bebidas ORDER BY $params[field] $params[sort] LIMIT $params[limit]";

        return $this->getRows($sql);
    }
}

?>