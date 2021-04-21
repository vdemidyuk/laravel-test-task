<?php
namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use function GuzzleHttp\json_decode;

class DataService {

    public StorageService $storageService;

    public function __construct(StorageService $storageService)
    {
        $this->storageService = $storageService;
    }

    public function findAllBooksByName(string $name)
    {
        $data = $this->storageService->get();
        $result = [];

        foreach ($data as $genre) {
            foreach ($genre as $book) {
                if(preg_match('/^'.$name.'*/i', $book['name'], $match)) {
                    $result[] = $book;
                }
            }
        }

        return $result;
    }

}
