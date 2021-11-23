<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {      
          
        return view('forms.login');
    }
    
    public function store(Request $request) {

        $this->validate($request, [
            'email' => 'required|email|max:255',
            'password' => 'required',
        ]);

        if (!auth()->attempt($request->only('email', 'password'))) {
            return back()->with('status', 'Email ou mot de passe invalide. Veuillez réessayer');
        }

        return redirect()->route('dashboard');
    }
}
