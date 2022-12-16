<?php

namespace App\Http\Controllers;

class ProfileController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('profile.index');
    }
}
