<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Hash;

class LoginController extends Controller
{
    public function check(Request $request)
    {

     $credentials = $request->validate([
     'email' => ['required', 'email'],
     'password' => ['required'],
        ]);

        if (Auth::attempt($credentials))
        {
           return response()->json([ 'status' => true ,
                                     'message' => "Success"
        ]);
        }
            return response()->json(['status' => false ,
                                     'message' => "Fail"

        ]);
       }
}

/* This code is using Laravel's default authentication system, which assumes that the user credentials are stored in the 'users' table. The 'users' table should have at least the following columns: 'id', 'name', 'email', 'password', and 'remember_token'.

The 'email' and 'password' fields are used for user authentication, and the 'remember_token' field is used for the "Remember me" feature. The 'id' and 'name' fields are used for retrieving user information after authentication.

If your application has a different table name or column names for user authentication, you can customize it by modifying the configuration file located at 'config/auth.php'.
 */



