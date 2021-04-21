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

}
