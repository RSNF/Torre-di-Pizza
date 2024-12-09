<?php

$coberturas = array(
    array("Molho de tomate", 1.5),
    array("Mussarela", 2.0),
    array("Pepperoni", 2.5),
    array("Azeitonas", 1.0),
    array("Frango desfiado", 3.0),
    array("Cebola", 1.5),
    array("Presunto", 2.0),
    array("Ovo", 1.5),
    array("Palmito", 2.5),
    array("Champignon", 2.5),
    array("Provolone", 3.0),
    array("Gorgonzola", 3.0),
    array("Parmesão", 3.0),
    array("Atum", 2.5),
    array("Bacon", 5.0),
    array("Milho", 1.5),
    array("Tomate", 1.5),
    array("Pimentão", 1.5),
    array("Oregano", 1.0),
    array("Manjericão", 1.0),
    array("Catupiry", 2.0),
    array("Calabresa", 3.0),
    array("Jalapenos", 2.5)
);

function coberturas_seeder() {

    global $coberturas, $dbconn;

    $sql = "INSERT INTO pizzaria.coberturas (nome, preco) VALUES ($1, $2);";

    foreach ($coberturas as $params) {

        if (pg_query_params($dbconn, $sql, $params) === FALSE) {
            echo ":(\n";
        }
    }
}

?>