<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    public function indexChat($id)
    {
        $chat = DB::table('chats')->where('idPesanan', $id)
                    ->select('chat', 'balas', 'idPesanan')->get();

        return view('chat', ['chat' => $chat, 'id' => $id]);
    }

    public function indexChatAdmin($id)
    {
        $chat = DB::table('chats')->where('idPesanan', $id)
                    ->get(['chat', 'balas', 'idPesanan']);
        
        $user = Pesanan::where('id', $id)->join('users', 'users.idUser', '=', 'pesanans.idUser')->first(['users.nama']);

        return view('chatAdmin', ['chat' => $chat, 'user' => $user->nama, 'id' => $id]);
    }

    public function chatUser(Request $request, $id)
    {
        $chat = new Chat;
        $chat->idPesanan = $id;
        $chat->chat = $request->chat;
        $chat->save();

        $newChat = DB::table('chats')->where('idPesanan', $id)
                    ->select('chat', 'balas')->get();

        return view('chat', ['chat' => $newChat, 'id' => $id]);
    }

    public function chatAdmin(Request $request, $id)
    {
        $chat = new Chat;
        $chat->idPesanan = $id;
        $chat->balas = $request->balas;
        $chat->save();

        $newChat = DB::table('chats')->where('idPesanan', $id)
                    ->select('chat', 'balas')->get();

        $user = Pesanan::where('id', $id)->join('users', 'users.idUser', '=', 'pesanans.idUser')->first(['users.nama']);

        return view('chatAdmin', ['chat' => $newChat,'user' => $user->nama, 'id' => $id]);
    }
}
