<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChatRoom;
use App\Models\Message;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return view("pages.admin.chat.index");
    }

    public function getChatRoom()
    {
        $chats = ChatRoom::with([
            "user",
            "guest",
            "messages"
        ])->where("user_id", auth()->user()->id)->get();

        return response()->json([
            "data" => $chats
        ], 200);
    }

    public function getMessages(Request $request)
    {
        $messages = Message::with([
            "user",
            "guest",
        ])->where("chat_room_id", $request->id)->get();

        return response()->json([
            "data" => $messages
        ], 200);
    }
}
