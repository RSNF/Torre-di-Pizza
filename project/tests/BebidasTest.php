<?php

namespace App\Tests;

require __DIR__ . "/../vendor/autoload.php";

use App\Models\Bebida;
use App\Validators\BebidaValidation;
use PHPunit\Framework\TestCase;

final class BebidasTest extends TestCase
{
    private $data = [
        "id" => "foo",
        "nome" => "foo",
        "preco" => 0.0
    ];

    public function testBebidaCanBeInstanced(): void
    {
        $bebida = new Bebida($this->data);

        $this->assertInstanceOf(Bebida::class, $bebida);
    }

    public function testValidateBebida(): void
    {
        $bebida = new Bebida($this->data);

        $validator = new BebidaValidation();

        $this->assertNull($validator->validate($bebida));
    }
}

?>