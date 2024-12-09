<?php

$coberturas_pizza = array(
    # Margherita
    array(1, 1),
    array(1, 2),
    array(1, 20),
    # Pepperoni
    array(2, 1),
    array(2, 2),
    array(2, 3),
    array(2, 4),
    # Frango com Catupiry
    array(3, 1),
    array(3, 2),
    array(3, 5),
    array(3, 21),
    # Calabresa
    array(4, 1),
    array(4, 2),
    array(4, 22),
    array(4, 6),
    # Portuguesa
    array(5, 1),
    array(5, 2),
    array(5, 7),
    array(5, 8),
    array(5, 6),
    array(5, 4),
    # Quatro Queijos
    array(6, 1),
    array(6, 2),
    array(6, 11),
    array(6, 12),
    array(6, 13),
    # Atum
    array(7, 1),
    array(7, 2),
    array(7, 14),
    array(7, 6),
    # Especial
    array(8, 1),
    array(8, 2),
    array(8, 7),
    array(8, 9),
    array(8, 10),
    array(8, 4),
    # Bacon
    array(9, 1),
    array(9, 2),
    array(9, 15),
    array(9, 16),
    # Vegetariana
    array(10, 1),
    array(10, 2),
    array(10, 17),
    array(10, 6),
    array(10, 18),
    array(10, 4),
    # A Inhumana
    array(11, 1),
    array(11, 2),
    array(11, 11),
    array(11, 12),
    array(11, 13),
    array(11, 21),
    array(11, 15),
    array(11, 3),
    array(11, 22),
    array(11, 10),
    array(11, 6),
    array(11, 18),
    array(11, 23),
    array(11, 19),
    array(11, 20)
);

function coberturas_pizza_seeder() {

    global $coberturas_pizza, $dbconn;

    $sql = "INSERT INTO pizzaria.coberturas_pizza (pizza_id, cobertura_id) VALUES ($1, $2);";

    foreach ($coberturas_pizza as $params) {

        if (pg_query_params($dbconn, $sql, $params) === FALSE) {
            echo ":(\n";
        }
    }
}

?>