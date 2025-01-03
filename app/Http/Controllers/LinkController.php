<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

class LinkController extends Controller
{
    public function show($token)
    {
        $link = Link::query()
            ->where('token', $token)
            ->firstOrFail();

        return view('page_a', compact('link'));
    }

    public function generateNew($token): RedirectResponse
    {
        $oldLink = Link::query()
            ->where('token', $token)
            ->firstOrFail();
        $oldLink->update(['active' => false]);

        $newToken = Str::random(32);

        Link::query()->create([
            'user_id' => $oldLink->user_id,
            'token' => $newToken,
            'expires_at' => now()->addDays(7),
        ]);

        return redirect()->route('page.a', ['token' => $newToken]);
    }

    public function deactivate($token)
    {
        $link = Link::query()->where('token', $token)->firstOrFail();
        $link->update(['active' => false]);

        return response('Link deactivated');
    }
}
