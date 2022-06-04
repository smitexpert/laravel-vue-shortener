<?php

namespace App\Http\Controllers;

use App\Models\Shortener;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function redirectUrl($hash)
    {
        $shorter = Shortener::where('hash', $hash)->first();

        if(!$shorter)
            return view('404');

        $shorter->update([
            'visited' => $shorter->visited+1
        ]);

        return redirect($shorter->url, 301);
    }
}
