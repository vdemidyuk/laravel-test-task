<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookController extends BaseController
{
    public function findAllByName(string $name): JsonResponse
    {
        $name = preg_replace('/[^\w]/', '', $name);

        if(strlen($name) <= 1) {
            return response()->json(['message' => ':name min length is 2'], 422);
        }

        $books = $this->appService->findAllBooksByName($name);

        return response()->json($books);
    }

    public function update(Request $request): JsonResponse
    {
        $validate = [
            'genre' => [
                'required',
            ],
            'author' => [
                'required',
            ],
            'name' => [
                'required',
            ],
        ];

        $request->validate($validate);

        $result = $this->appService->updateBooks($request);

        return response()->json($result);
    }
}
