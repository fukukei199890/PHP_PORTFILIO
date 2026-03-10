<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RatingController extends Controller
{
    public function index(
        // $id
    )
    {
    // 送られてきた $id (相手のユーザーID) で検索
    // $user = User::findOrFail($id);

    // 取得した相手の情報を 'user' という名前でViewに渡す ['user' => $user]
    return view('rating');
    }
}
