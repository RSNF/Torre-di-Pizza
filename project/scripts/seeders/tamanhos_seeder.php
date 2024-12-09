<?php

$tamanhos = array(
    array("Pequena", 20.00),
    array("Média", 25.00),
    array("Grande", 30.00),
    array("Família", 35.00),
    array("Gigante", 40.00),
    array("Mega", 45.00),
    array("Ultra", 50.00),
    array("Suprema", 55.00),
    array("Titan", 60.00),
    array("Colossal", 65.00),
    array("Essa não cabe no delivery...", 100.00)
);

function tamanhos_seeder() {

    global $tamanhos, $dbconn;

    $sql = "INSERT INTO pizzaria.tamanhos (nome, preco) VALUES ($1, $2);";

    foreach ($tamanhos as $params) {

        if (pg_query_params($dbconn, $sql, $params) === FALSE) {
            echo ":(\n";
        }
    }
}

?>