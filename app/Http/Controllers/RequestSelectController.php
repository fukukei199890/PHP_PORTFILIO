<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\TradeRequest;

class RequestSelectController extends Controller
{
    public function index()
    {
        $requests = TradeRequest::with('user')->get();
        return view('requestSelect', compact('requests'));
    }
}
