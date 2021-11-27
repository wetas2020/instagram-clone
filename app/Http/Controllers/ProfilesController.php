<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfilesController extends Controller
{
    public function index(\App\Models\User $user) {
        // dd(User::find($user));
        // $user = User::findOrFail($user);
        return view('profiles.index', [
            'user' => $user,
        ]);
    }

    public function edit(\App\Models\User $user) {

        return view('profiles.edit', [
            'user' => $user,
        ]);
    }

    public function update(\App\Models\User $user) {

        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => 'url',
            'image' => '',
        ]);

        // dd($data);
        auth()->user()->profile->update($data);

        return redirect("/profile/{$user->id}");

    }
}
