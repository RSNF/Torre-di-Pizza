<?php

namespace App\Validators;

use App\Models\Bebida;
use Respect\Validation\Exceptions\NestedValidationException;
use Respect\Validation\Validator;

class BebidaValidation extends BaseValidator
{
    /**
     * @param Bebida $bebida
     * @return void|array
     */
    public function validate(Bebida $bebida)
    {
        try {
            $this->rules()->assert($bebida);
        } catch (NestedValidationException $e) {
            return $e->getMessages();
        }
    }

    /**
     * @return \Respect\Validation\ChainedValidator
     */
    private function rules()
    {
        $bebidaValidator = Validator::attribute('nome', Validator::notBlank())
            ->attribute('preco', Validator::floatVal()->min(0.0));

        return $bebidaValidator;
    }
}

?>