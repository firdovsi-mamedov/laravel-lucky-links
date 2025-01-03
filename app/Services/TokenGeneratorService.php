<?php

namespace App\Services;

use Illuminate\Support\Str;

class TokenGeneratorService
{
    public function generateToken(): string
    {
        return Str::random(32);
    }
}
