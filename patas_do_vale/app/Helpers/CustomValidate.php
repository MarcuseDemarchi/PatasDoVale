<?php

namespace App\Helpers;

use Illuminate\Validation\ValidationException;

trait CustomValidate
{
    public function validatePassword(string $passWord): string
    {
        // aqui ainda vou aplicar as validações da senha em questão
        $lowercase = preg_match('/[a-z]/',$passWord); ## senha com valor minusculo
        $uppercase = preg_match('/[A-Z]/',$passWord);
        $number = preg_match('/[0-9]/',$passWord);
        $specialChar = preg_match('/[^\w]/',$passWord);
    

        if (!$lowercase) {
            throw ValidationException::withMessages(['password' => 'O campo password tem que ter uma letra minúscula.']);
        } else if (!$uppercase) {
            throw ValidationException::withMessages(['password' => 'O campo password tem que ter uma letra maiúscula.']);
        } else if (!$number) {
            throw ValidationException::withMessages(['password' => 'O campo password tem que ter um número.']);
        } else if (!$specialChar) {
            throw ValidationException::withMessages(['password' => 'O campo password tem que ter um caractere especial.']);
        }

        return $passWord;
    }
}
