<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Session;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'O email e a password não estão corretos, tente novamente'
            ]);
        }
        return redirect()->to('/home');
    }

    public function destroy()
    {
        auth()->logout();
        Session::forget('cart');

        return redirect()->to('/home');
    }


}
