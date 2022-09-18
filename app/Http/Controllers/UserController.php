<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{
    public function store(Request $request) {

        $validated = $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email|unique:users',
            'login' => 'required|unique:users',
            'password' => 'required',
            're-password' => 'required'
        ]);

        if($validated['password'] != $validated['re-password']) {
            return redirect()->route('welcome')->withErrors(['Пароли не совпадают']);
        }else if(htmlspecialchars($validated['password']) == '' ) {
            return redirect()->route('welcome')->withErrors(['Заполните все поля']);
        }


        $user = User::create($validated);
        Auth::login($user);

        return redirect()->route('profile');

    }

    public function login(Request $request) {

        $chose = $request->only(['login', 'password', 'remember']);

        $validator = Validator::make($chose, [
            'login' => 'required',
            'password' => 'required',
            'remember' => ''
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('welcome')
                ->withErrors($validator)
                ->withInput();
        }

        $validated = $validator->validated();

        isset($validated['remember']) ? $remember = true : $remember = false;

        $authorized = Auth::attempt([
            'login' => $validated['login'],
            'password' => $validated['password']
        ], $remember);

        if($authorized)
            return redirect()->route('profile');

        return redirect()->route('welcome')->withErrors(['Логин или пароль неверный']);
    }

    public function logout(Request $request) {

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');

    }

    public function settings() {

        return view('settings');

    }
}
