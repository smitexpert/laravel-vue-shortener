<?php

namespace App\Http\Services;

use App\Models\Shortener;

class CreateShortLInkService {

    private $hash;

    public function __construct()
    {
        $this->hash = $this->makeHash();
    }

    public function create($url, $is_spam)
    {
        while(true) {

            $this->hash = $this->makeHash();

            $shorter = Shortener::where('hash', $this->hash)->first();

            if(!$shorter)
                break;
        }

        $shortener = Shortener::firstOrCreate(
            ['url' => $url],
            ['hash' => $this->hash, 'is_spam' => $is_spam]
        );

        return collect($shortener)->put('APP_URL', config('app.url'))->all();
    }

    private function makeHash()
    {
        return substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 6);
    }
}
