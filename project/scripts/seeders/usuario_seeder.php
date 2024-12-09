<?php

$usuarios = array(
    array("João", password_hash("senha123", PASSWORD_BCRYPT), "(11) 98765-4321", "Rua A, 123"),
    array("Maria", password_hash("senha456", PASSWORD_BCRYPT), "+55 (21) 99876-5432", "Rua B, 456"),
    array("Pedro", password_hash("senha789", PASSWORD_BCRYPT), "(31) 98765-4321", "Rua C, 789"),
    array("Ana", password_hash("senhaabc", PASSWORD_BCRYPT), "(41) 99876-5432", "Rua D, 012"),
    array("José", password_hash("senhaxyz", PASSWORD_BCRYPT), "(51) 98765-4321", "Rua E, 345"),
    array("Mariana", password_hash("senha123", PASSWORD_BCRYPT), "(61) 99876-5432", "Rua F, 678"),
    array("Fernando", password_hash("senha456", PASSWORD_BCRYPT), "(71) 98765-4321", "Rua G, 901"),
    array("Camila", password_hash("senha789", PASSWORD_BCRYPT), "(81) 99876-5432", "Rua H, 234"),
    array("Rodrigo", password_hash("senhaabc", PASSWORD_BCRYPT), "(91) 98765-4321", "Rua I, 567"),
    array("Juliana", password_hash("senhaxyz", PASSWORD_BCRYPT), "(91) 99876-5432", "Rua J, 890")
);

function usuario_seeder()
{

    global $usuarios, $dbconn;

    $sql = "INSERT INTO pizzaria.usuario (nome, senha, tel, endereco) VALUES ($1, $2, $3, $4);";

    foreach ($usuarios as $params) {

        if (pg_query_params($dbconn, $sql, $params) === FALSE) {
            echo ":(\n";
        }
    }
}

?>

