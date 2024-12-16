<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\Information;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class MailableController extends Controller
{
    public function index() {
        return view('mail.index');
    }

    public function send(Request $request) {
        $data = $request->all();
        $users = User::all();
        foreach($users as $user) {
            Mail::to($user)->send(new Information($data));
        }
        return back()->with('sent', '送信完了しました。');
    }
}
