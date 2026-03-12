<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    public function index(Request $request)
    {
        // 1. ログインしているかチェック
        if (Auth::check()) {

            return view('request', [
                'inputs' => $request->all()
            ]);
        } else {
            // 2. 未ログインの場合の遷移先を指定


            return redirect()->route('applicationnot');
        }
    }
}
