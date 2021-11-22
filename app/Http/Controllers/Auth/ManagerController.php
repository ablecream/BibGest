<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class ManagerController extends Controller
{
    public function index() {
        return view('forms.managers');
    }

    public function store(Request $request) {

        $password = Str::random(8);
        
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $password,
        ]);

        auth()->attempt([
            'email' => $request->email,
            'password' => $password,
        ]);

        return redirect()->route('managers');
    }

    public function list() {
        dd(auth()->user());

        $managers = User::all();
        return view('posts.managers', ['managers'=>$managers]);
    }
}
