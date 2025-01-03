<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\LuckyResult;
use App\Services\RandomNumberGameService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class LuckyResultController extends Controller
{
    public function __construct(private readonly RandomNumberGameService $randomNumberGameService)
    {
    }

    public function imFeelingLucky(Request $request, $token): RedirectResponse
    {
        $link = Link::query()->where('token', $token)->firstOrFail();
        $user = $link->user;

        $randomNumber = rand(1, 1000);
        $isWin = $randomNumber % 2 === 0;

        $winAmount = $isWin ? $this
            ->randomNumberGameService
            ->calculateWithAmount($randomNumber) : 0;

        $link = LuckyResult::query()->create([
            'user_id' => $user->id,
            'random_number' => $randomNumber,
            'result' => $isWin ? 'Win' : 'Lose',
            'win_amount' => $winAmount,
        ]);

        return redirect()->back()
            ->with('result', $link->result)
            ->with('winAmount', $link->win_amount);
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
