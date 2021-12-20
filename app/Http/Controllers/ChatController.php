<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Support\Collection
     */
    public function index()
    {
        $chats = app('firebase.firestore')->database()->collection('Chat')->documents();

        return collect($chats)->map(function ($chat) {
            return [
                'id' => $chat->id(),
                'sender_id' => $chat->data()['sender_id'],
                'sender_name' => $chat->data()['sender_name'],
                'receiver_id' => $chat->data()['receiver_id'],
                'receiver_name' => $chat->data()['receiver_name'],
                'chatting' => $chat->data()['chatting'],
            ];
        });
    }


    public function store(Request $request)
    {
        $request->validate([
            'sender_id' => 'required',
            'sender_name' => 'required',
            'receiver_id' => 'required',
            'receiver_name' => 'required',
            'chatting' => 'required',
        ]);
        $chat = app('firebase.firestore')->database()->collection('Chat')->newDocument();

        $chat->set([
            'sender_id' => $request->sender_id,
            'sender_name' => $request->sender_name,
            'receiver_id' => $request->receiver_id,
            'receiver_name' => $request->receiver_name,
            'chatting' => $request->chatting,
        ]);

        return 'success';
    }


    public function update(Request $request, $id)
    {
        app('firebase.firestore')->database()->collection('Chat')->document($id)
            ->update([
                ['path' => 'chatting', 'value' => $request->chatting],
            ]);

        return 'success';
    }

    public function destroy($id)
    {
        app('firebase.firestore')->database()->collection('Chat')->document($id)->delete();
        return 'success';
    }


}
