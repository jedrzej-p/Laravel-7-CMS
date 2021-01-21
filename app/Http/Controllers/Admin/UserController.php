<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        $user = User::find(auth()->user()->id);
        return view('admin.user.user')->with(['user' => $user]);
    }

    public function updateEmailName(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->name     = $request->current_name;
        $user->email    = $request->current_email;
        $user->save();
        return view('admin.user.user')->with(['user' => $user, 'flash_message', 'Zaktualizowano dane profilu.']);
    }

    public function changePassword(Request $request)
    {
        $user = User::find(auth()->user()->id);

        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required', 'min:8'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        return view('admin.user.user')->with(['user' => $user, 'flash_message', 'Zmieniono hasło.']);
    }
}
