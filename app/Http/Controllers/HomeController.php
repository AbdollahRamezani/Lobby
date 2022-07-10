<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        $messages = Message::all(); //SELECT * FROM messages

        return view('index', compact('messages'));
    }

    function add(Request $request)
    {
        $message = new Message();
        $message->name = $request ['name'];
        $message->text = $request ['text'];
        $message->save();
        return redirect('/');
    }
}
