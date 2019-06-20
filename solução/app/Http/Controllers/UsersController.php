<?php

namespace App\Http\Controllers;

use App\User;
use Hash;

class UsersController extends Controller {
    
    public function store() {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
            
        try {
            $credentials = [
                'name' => request('name'), 
                'email' => request('email'), 
                'password' => Hash::make(request('password'))
            ];
            
            return ResponseController::created(User::create($credentials));
        } catch (\Throwable $exc) {
            return ResponseController::badRequest();
        }
    }
}
