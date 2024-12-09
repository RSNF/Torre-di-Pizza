<?php

$cartoes_credito = array(
    array("JOAO", "XXXXXXXXXXXXXXXX", "12/2028", 1),
    array("MARIA", "ZZZZZZZZZZZZZZZZ", "10/2028", 2),
    array("PEDRO", "YYYYYYYYYYYYYYYY", "05/2025", 3),
    array("ANA", "AAAAAAAAAAAAAAAA", "08/2028", 4),
    array("JOSE", "BBBBBBBBBBBBBBBB", "12/2028", 5),
    array("MARIANA", "CCCCCCCCCCCCCCCC", "11/2028", 6),
    array("FERNANDO", "DDDDDDDDDDDDDDDD", "07/2027", 7),
    array("CAMILA", "FFFFFFFFFFFFFFFF", "03/2028", 8),
    array("RODRIGO", "GGGGGGGGGGGGGGG", "02/2028", 9),
    array("JULIANA", "HHHHHHHHHHHHHHHH", "09/2028", 10)
);

function cartoes_credito_seeder() {

    global $cartoes_credito, $dbconn;

    $sql = "INSERT INTO pizzaria.cartao_credito (nome, numero, expiracao, usuario_id) VALUES ($1, $2, $3, $4);";

    foreach ($cartoes_credito as $params) {

        if (pg_query_params($dbconn, $sql, $params) === FALSE) {
            echo ":(\n";
        }
    }
}

?>