<?php

include_once "src/bootstrap.php";

$sql_domains = file_get_contents("./domains.sql");
$sql_schema = file_get_contents("./schema.sql");
$sql_functions = file_get_contents("./functions.sql");

if (pg_query($dbconn, $sql_domains) === FALSE) {
    echo "\nERROR\nError: Create Domains failed :(\n\n";
}

if (pg_query($dbconn, $sql_functions) === FALSE) {
    echo "\nERROR\nError: Create Functions failed :(\n\n";
}

if (pg_query($dbconn, $sql_schema) === FALSE) {
    echo "\nERROR\nError: Create Schema failed :(\n\n";
}
