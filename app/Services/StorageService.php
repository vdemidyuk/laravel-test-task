<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StorageService {

    const DATA_FILE = '2_Laravel_practice_LU-B_books.json';

    public function __construct()
    {
        $this->init();
    }

    public function init()
    {
        if(!Storage::disk('local')->exists(static::DATA_FILE)) {
            Storage::disk('local')->put(static::DATA_FILE, json_encode((object)[]));
        }
    }

    public function get()
    {
        return json_decode(Storage::disk('local')->get(static::DATA_FILE), true);
    }

}
