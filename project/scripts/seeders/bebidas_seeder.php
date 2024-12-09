<?php

$bebidas = array(
    array("Coca-Cola", 4.0),
    array("Guaraná", 3.5),
    array("Fanta Laranja", 3.5),
    array("Suco de Laranja", 5.0),
    array("Água", 2.5),
    array("Sprite", 4.0),
    array("Chá Gelado", 4.5),
    array("Cerveja", 6.0),
    array("Refrigerante de Limão", 3.5),
    array("Suco de Uva", 5.5)
);

function bebidas_seeder() {

    global $bebidas, $dbconn;

    $sql = "INSERT INTO pizzaria.bebidas (nome, preco) VALUES ($1, $2);";

    foreach ($bebidas as $params) {

        if (pg_query_params($dbconn, $sql, $params) === FALSE) {
            echo ":(\n";
        }
    }
}

?>