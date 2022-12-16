<?php

namespace App\Http\Controllers;

use App\Models\Pair;
use App\Models\User;

class ChatController extends Controller
{
    public function index() {
        $user_id = auth()->user()->id;
        $chats = [];

        $pairs = Pair::where(function($query) use ($user_id) {
            $query->where(['first_user_id' => $user_id])
                ->orWhere(['second_user_id' => $user_id]);
        })->get();

        foreach($pairs as $pair) {
            if($pair->first_user_id == auth()->user()->id) {
                $user = User::where(['id' => $pair->second_user_id])->first();
            } else {
                $user = User::where(['id' => $pair->first_user_id])->first();
            }

            array_push($chats, [
                'pair_id' => $pair->id,
                'name' => $user->name,
                'user_id' => $user->id,
            ]);
        }

        return view('chats.index', compact('chats'));
    }

    public function show(int $pair_id) {
        $pair = Pair::where(['id' => $pair_id])->get()->first();
        $current_user_id = auth()->user()->id;

        if(!$pair) {
            return redirect()->route('chats.index');
        }

        if($pair->first_user_id == $current_user_id) {
            $user_id = $pair->second_user_id;
        } else if($pair->second_user_id == $current_user_id) {
            $user_id = $pair->first_user_id;
        }

        if(!isset($user_id)) {
            return redirect()->route('chats.index');
        }

        $receiver = User::where(['id' => $user_id])->get()->first();

        return view('chats.show', compact('receiver', 'pair_id'));
    }
}
