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
        return view('managers.form');
    }

    public function profil() {
        return view('managers.profil');
    }

    public function store(Request $request) {
        
        $this->validate($request, [
            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|max:255',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('managers');
    }

    public function list() {
        $managers = User::paginate(2);
        
        return view('managers.index')->with('managers', $managers);
    }

    public function destroy($id) {
        $manager = User::find($id);
        
        $manager->delete();

        return redirect()->route('managers');
    }

    public function editview($id) {
        $manager = User::find($id);

        return view('managers.editform')->with('manager', $manager);
    }

    public function edit(Request $request, $id) {
        $manager = User::find($id);

        $this->validate($request, [
            'name' => 'max:255',
            'username' => 'max:255',
            'email' => 'email|max:255',
            'password' => 'max:255',
        ]);

        $manager->name = $request->name;
        $manager->username = $request->username;
        $manager->email = $request->email;
        $manager->password = Hash::make($request->password);
        $manager->save();

        return redirect()->route('managers');
    }
}
