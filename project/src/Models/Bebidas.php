<?php

namespace App\Models;

class Bebida
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var float
     */
    private $preco;

    /**
     * @param array $data
     */
    public function __construct($data)
    {
        $this->id = $data["id"];
        $this->nome = $data["nome"];
        $this->preco = $data["preco"];
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }
}

?>