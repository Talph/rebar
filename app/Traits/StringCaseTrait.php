<?php

namespace App\Traits;

trait StringCaseTrait
{
    public function stringCapitalizeFirstLetter(?string $string): string
    {
        return ucfirst(strtolower($string));
    }

    public function stringLowerLetters(?string $string): string
    {
        return strtolower($string);
    }

    public function stringCapitalizeAllFirstLetters(?string $string): string
    {
        return ucwords(strtolower($string));
    }

    public function stringCapitalizeAllLetters(?string $string): string
    {
        return strtoupper($string);
    }
}