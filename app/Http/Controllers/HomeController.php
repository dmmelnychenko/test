<?php

namespace App\Http\Controllers;

use App\Models\Click;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $clicks = Click::orderBy('created_at', 'DESC')->get();
        return view('main')->with(['clicks' => $clicks]);
    }
}
