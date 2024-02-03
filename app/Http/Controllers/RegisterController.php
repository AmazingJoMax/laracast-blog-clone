<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{

    public function create(){
        return view('register.create');

    }

    public function store(){
        $attributes = request()->validate([
            'name' => ['required', 'min:3', 'max:255'],
            'profile_img' => 'image',
            'username' => ['required', 'min:3', 'max:255', Rule::unique('users','username')],
            'email' => ['required','email', Rule::unique('users','username')],
            'password' => ['required','min:7','max:255']
        ]);

        if(isset($attributes['profile_img'])){
            $attributes['profile_img'] = request()->file('profile_img')->store('profile');
        }

        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('success','Your account has been created.');
    }

}
