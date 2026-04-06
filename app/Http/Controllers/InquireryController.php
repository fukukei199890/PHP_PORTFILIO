<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use App\Models\Inquiry;

class InquireryController extends Controller
{
    public function index()
    {
        return view('inquirery');
    }
    //

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:2000',
        ]);


        Inquiry::create([
            'user_id' => auth()->id(),
            'inquire_text' => $request->message,
            'is_resolved' => false,


        ]);
        return back()->with('status', '送信が完了しました！');
    }
}
