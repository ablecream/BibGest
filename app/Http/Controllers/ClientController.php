<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function list() {
    $clients = Client::all();

    return view('clients.index', ['clients'=>$clients]);
    }

    public function index() {
        return view('clients.form');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'birth' => 'required|date',
        ]);

        $client = new Client();

        $client->firstname = $request->firstname;
        $client->lastname = $request->lastname;
        $client->birth = $request->birth;
        $client->save();

        return redirect()->route('clients');
    }

    public function destroy($id) {
        $client = Client::find($id);

        $client->delete();

        return redirect()->route('clients');
    }

    public function editview($id) {
        $client = Client::find($id);

        return view('clients.editform', ['client', $client]);
    }

    public function edit(Request $request, $id) {

        $client = Client::find($id);

        $this->validate($request, [
            'firstname' => 'required|max:255',
            'lastname' => 'required|max:255',
            'birth' => 'required|birth',
        ]);

        $client->firstname = $request->firstname;
        $client->lastname = $request->lastname;
        $client->birth = $request->birth;
        $client->save();

        return redirect()->route('clients');
    }
}