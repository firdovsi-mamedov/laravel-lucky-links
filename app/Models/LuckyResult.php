<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LuckyResult extends Model
{
    /** @use HasFactory<\Database\Factories\LuckyResultFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'random_number',
        'result',
        'win_amount',
    ];
}
