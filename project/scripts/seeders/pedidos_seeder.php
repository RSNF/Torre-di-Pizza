<?php

$pedidos = array(
    array(0.0, 1),
    array(0.0, 2)
);

function pedidos_seeder() {

    global $pedidos, $dbconn;

    $sql = "INSERT INTO pizzaria.pedido (preco_total, usuario_id) VALUES ($1, $2);";

    foreach ($pedidos as $params) {

        if (pg_query_params($dbconn, $sql, $params) === FALSE) {
            echo ":(\n";
        }
    }
}

?>