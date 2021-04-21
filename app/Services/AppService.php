<?php
/*
 * Orchestrating service
 */

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AppService {

    public DataService $dataService;

    public function __construct(DataService $dataService)
    {
        $this->dataService = $dataService;
    }

    public function auth(Request $request)
    {
        // it's a hack!
        $obscured_email = $request->get('login').'@younevergonnaneedthis.com';

        $result = Auth::attempt(['email' => $obscured_email, 'password' => $request->get('password')]);

        if(!$result) {
            return false;
        }

        return Auth::user()->createToken('authToken')->plainTextToken;
    }

    public function findAllBooksByName(string $name)
    {
        return $this->dataService->findAllBooksByName($name);
    }

}
