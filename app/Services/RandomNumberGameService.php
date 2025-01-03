<?php

namespace App\Services;

class RandomNumberGameService
{
    public function calculateWithAmount(int $number): float|int
    {
        $thresholds = [
            900 => 0.7,
            600 => 0.5,
            300 => 0.3,
            0 => 0.1,
        ];

        foreach ($thresholds as $threshold => $percentage) {
            if ($number > $threshold) {
                return $number * $percentage;
            }
        }

        return 0;
    }
}
