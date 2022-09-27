<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class HomeController extends Controller
{

    public function test () {
        
    }

    public function index()
    {
        if(Auth::check()) return redirect()->route('user.profile');
        return view('welcome');

    }

    public function support() {
        return view('support');
    }

    public function friends() {
        return view('user.friends');
    }

    public function profile($id = false)
    {

        if(!$id) $id = Auth::id();

        $user = User::find($id);

        if($user === null) return view('404');

        $friends = $user->friends();
        $relation = null;



        $shortcodes = $user->shortcodes;
        $repositories = $user->repositories()->latest()->limit(4)->get();


        if($id != Auth::id()) {
            $relation = User::find(Auth::id())
                ->relationCheck(User::find($id));
        }

        return view('user.profile', [
            'user' => $user,
            'friends' => $friends,
            'relation' => $relation,
            'shortcodes' => $shortcodes,
            'repositories' => $repositories
        ]);
    }

}
