<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Owner;
use App\Models\Shop;
use App\Models\Reservation;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function store(Request $request) {
        /* Validation */
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:owners',
            'password' => 'required|min:8'
        ]);

        /*Database Insert*/
        $owner = Owner::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Auth::login($owner);
        return redirect()->route('owner.index');

    }
}