<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginView() {
        return view ('admin.login');
    }

    public function login(Request $request){
        $credentials = $request->only(['user_id', 'password']);

        if(Auth::guard('administrators')->attempt(($credentials)){
            return redirect('/admin')->with([
            ])
        })
    }
}
