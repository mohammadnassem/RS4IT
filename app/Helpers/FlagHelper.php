<?php

namespace App\Helpers;

class FlagHelper
{
    public static function getFlagsNames(): array
    {
        return config('flags');
    }
}