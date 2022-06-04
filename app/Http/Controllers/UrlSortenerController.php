<?php

namespace App\Http\Controllers;

use App\Http\Services\CreateShortLInkService;
use App\Http\Services\GoogleSafeBrowserService;
use Illuminate\Http\Request;

class UrlSortenerController extends Controller
{
    public function shortUrl(Request $request, GoogleSafeBrowserService $safeBrowserService, CreateShortLInkService $createShortLInkService)
    {
        $request->validate([
            'url' => 'required|url'
        ]);

        $response = $safeBrowserService->check($request->url);

        return response()->json((isset(json_decode($response->body())->matches) ? $createShortLInkService->create($request->url, true) : $createShortLInkService->create($request->url, false)));
    }
}
