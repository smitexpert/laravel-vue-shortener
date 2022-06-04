<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;

class GoogleSafeBrowserService {

    public function check($url)
    {
        return Http::withHeaders([
            'Content-Type' => 'application/json'
        ])->post('https://safebrowsing.googleapis.com/v4/threatMatches:find?key='.config('googleapi.key'), [
                "client" => [
                    "clientId" => 'SM-SOFT DEV',
                    "clientVersion" => "0.1"
                ],
            "threatInfo" => [
                "threatTypes" => ["MALWARE", "SOCIAL_ENGINEERING"],
                "platformTypes" => ["ANY_PLATFORM"],
                "threatEntryTypes" => ["URL"],
                "threatEntries" => [
                    ['url' => $url]
                ]
            ]
        ]);
    }
}
