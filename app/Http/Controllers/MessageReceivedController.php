<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageReceivedController extends Controller
{
    public function index() {
        return view('messageReceived');
    }

    public function read($id) {
        $notification = Auth::user()->unreadNotifications->find($id);

        if ($notification) {
            $notificaiont->markAsRead();
        }

        return view('message');
    }
}
