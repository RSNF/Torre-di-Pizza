<?php

namespace App\Validators;

use InvalidArgumentException;

abstract class BaseValidator
{
    /**
     * @param string $value
     * @param string $message
     * @return string
     */
    public function checkWhiteList(string $value, array $whitelist, string $message = "Invalid Parameter")
    {
        if ($value === null) {

            return $whitelist[0];
        }

        $key = array_search($value, $whitelist, true);

        if ($key === false) {

            throw new InvalidArgumentException($message);
        }

        return $value;
    }
}

?>