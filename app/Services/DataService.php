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

    public function get(): array
    {
        return $this->storageService->get();
    }

    public function updateBooksByRequest(Request $request)
    {
        $data = $this->storageService->get();
        $we_got_book = false;
        $result = [];

        foreach ($data as $genre_name => $genre) {
            foreach ($genre as $book) {
                if($book['name'] === $request->get('name')) {
                    $we_got_book = true;
                    $book['author'] = $request->get('author');
                }
                $result[$genre_name][] = $book;
            }
        }

        if(!$we_got_book) {
            $result[$request->get('genre')][] = ['name' => $request->get('name'), 'author' => $request->get('author')];
        }

        $this->storageService->put($result);
    }

    public function findAllBooksByName(string $name): array
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
