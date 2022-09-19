<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ChatRoom;
use App\Models\Guest;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function login(Request $request)
    {
        $guest = Guest::where("email", $request->email)->first();

        if (is_null($guest)) {
            $guest = new Guest();
            $guest->name = $request->name;
            $guest->email = $request->email;
            $guest->save();
        }

        $chatRoom = ChatRoom::where("guest_id", $guest->id)->first();

        if (is_null($chatRoom)) {
            $chatRoom = new ChatRoom();
            $chatRoom->guest_id = $guest->id;
            $chatRoom->user_id = User::first()->id;
            $chatRoom->save();
        }

        $guest->chat_room = $chatRoom;

        return response()->json(['data' => $guest], 200);
    }


    public function getChat(Request $request)
    {
        $chat = Message::where("chat_room_id", $request->chat_room_id)->get();

        return response()->json([
            "data" => $chat
        ], 200);
    }


    public function sendMessage(Request $request)
    {
        $chatRoom = ChatRoom::find($request->id);

        if ($request->message != "") {
            $messages = new Message();
            $messages->chat_room_id =  $chatRoom->id;
            $messages->user_id = User::first()->id;
            $messages->guest_id = $chatRoom->guest_id;
            $messages->message = $request->message;
            $messages->type = "guest-admin";
            $messages->save();
        }

        return response()->json([
            "data" => $messages
        ], 200);
    }
}
