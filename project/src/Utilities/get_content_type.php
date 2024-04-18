<?php

function get_content_type(...$args) {

    list($header_type, $params_type) = $args;

    if ($header_type) {
        return $header_type;
    } else if ($params_type) {

        if ($params_type === "json" OR $params_type === "xml") {

            $params_type = "application/" . $params_type;
        }
        
        return $params_type;
    } else {
        return "application/json";
    }
}

?>