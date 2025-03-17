<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class QrCodeController extends Controller
{
    public function test()
    {
        $qrCode = QrCode::size(200)->generate("Hello World");
        return view('test', compact('qrCode'));
    }
}
