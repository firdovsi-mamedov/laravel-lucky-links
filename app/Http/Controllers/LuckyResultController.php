<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\LuckyResult;
use Illuminate\Http\Request;

class LuckyResultController extends Controller
{
    public function imFeelingLucky(Request $request, $token)
    {
        $link = Link::query()->where('token', $token)->firstOrFail();
        $user = $link->user;

        $randomNumber = rand(1, 1000);
        $isWin = $randomNumber % 2 === 0;
        $winAmount = 0;

        if ($isWin) {
            if ($randomNumber > 900) {
                $winAmount = $randomNumber * 0.7;
            } elseif ($randomNumber > 600) {
                $winAmount = $randomNumber * 0.5;
            } elseif ($randomNumber > 300) {
                $winAmount = $randomNumber * 0.3;
            } else {
                $winAmount = $randomNumber * 0.1;
            }
        }

        $result = LuckyResult::query()->create([
            'user_id' => $user->id,
            'random_number' => $randomNumber,
            'result' => $isWin ? 'Win' : 'Lose',
            'win_amount' => $winAmount,
        ]);

        return response()->json([
            'result' => $result,
        ]);
    }

    public function history($token)
    {
        $link = Link::query()
            ->where('token', $token)
            ->firstOrFail();

        $user = $link->user;

        $luckyResults = LuckyResult::query()
            ->where('user_id', $user->id)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        return view('history', compact('luckyResults'));
    }
}
