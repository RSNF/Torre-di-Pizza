<?php

include_once "src/bootstrap.php";

include "usuario_seeder.php";
include "tamanhos_seeder.php";
include "pizzas_seeder.php";
include "coberturas_seeder.php";
include "coberturas_pizza_seeder.php";
include "bebidas_seeder.php";
include "cartoes_credito_seeder.php";
include "pedidos_seeder.php";

usuario_seeder();
tamanhos_seeder();
pizzas_seeder();
coberturas_seeder();
coberturas_pizza_seeder();
bebidas_seeder();
cartoes_credito_seeder();
pedidos_seeder();

?>