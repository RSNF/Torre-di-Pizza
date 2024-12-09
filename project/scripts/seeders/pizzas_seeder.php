<?php

$pizzas = array(
    array("Margherita", 1),
    array("Pepperoni", 2),
    array("Frango com Catupiry", 3),
    array("Calabresa", 4),
    array("Portuguesa", 5),
    array("Quatro Queijos", 6),
    array("Atum", 7),
    array("Especial", 8),
    array("Bacon", 9),
    array("Vegetariana", 10),
    array("A Inhumana", 11)
);

function pizzas_seeder() {

    global $pizzas, $dbconn;

    $sql = "INSERT INTO pizzaria.pizzas (nome, tamanho_id) VALUES ($1, $2);";

    foreach ($pizzas as $params) {

        if (pg_query_params($dbconn, $sql, $params) === FALSE) {
            echo ":(\n";
        }
    }
}

?>