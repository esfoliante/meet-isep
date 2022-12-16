<?php

namespace App\Http\Controllers;

use App\Models\Meet;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        do {
            $user = User::all()->random(1)->first();
        } while($this->verifyIfMatched($user) || $user->id == auth()->user()->id);

        return view('dashboard', compact('user'));
    }

    private function verifyIfMatched(User $user) : bool {
        $usersMatch = Meet::where(['matcher_id' => auth()->user()->id, 'matched_id' => $user->id])->first();

        if($usersMatch) return true;

        return false;
    }
}
