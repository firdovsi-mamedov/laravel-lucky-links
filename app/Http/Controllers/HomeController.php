<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $link = Link::query()->where('user_id', auth()->id())->firstOrFail();

        return view('home', [
            'link' => $link
        ]);
    }
}
