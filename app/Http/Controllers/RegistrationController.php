<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegistrationController extends Controller
{
    public function index()
    {
        return  view('registration');
    }

    // Requestオブジェクトはブラウザから送られてきた全てのデータを含んだオブジェクト
    // $_REQUEST['']にかわるものと考えればよい
    public function store(Request $request)
    {
        // Userモデルのオブジェクトを作る
        // コンストラクタとして、insert文が実行され、
        // Userモデルで対応付けられたカラムにデータが格納される
        $register = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => $request->password
        ]);

        return view('registrationcomplete');
    }
}
