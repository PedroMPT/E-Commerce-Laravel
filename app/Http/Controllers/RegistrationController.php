<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\RegistrationRequest;

class RegistrationController extends Controller
{
    public function create(){

    	return view('registration.create');
    }

    public function store(RegistrationRequest $request){

        $user = User::create($request->all());
    	  auth()->login($user);
        session()->flash('success','Registo efetuado com sucesso');

    	return redirect()->to('/home');

    }
}
