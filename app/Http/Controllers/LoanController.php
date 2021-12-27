<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Client;
use App\Models\Book;
use Carbon\Carbon;

class LoanController extends Controller
{
    public function list() {
        $loans = Loan::all();
        return view('loans.index', ['loans'=>$loans]);
    }

    public function index() {
        $books = Book::where('copies', '>', 0)->get();
        $clients = Client::all();
        return view('loans.form', ['clients'=>$clients], ['books'=>$books]);
    }

    public function store(Request $request) {
        
        $this->validate($request, [
            'book' => 'required',
            'client' => 'required',
        ]);

        $loan = new Loan();
        $currentdate = Carbon::now();
        $book = $request->book;
        $client = $request->client;
        
        $loan->book()->associate($book);
        $loan->client()->associate($client);
        $loan->loaned_at = $currentdate;

        $bookmod = Book::where('id', $book)->first();
        $bookmod->copies = $bookmod->copies - 1;
        $bookmod->save();
        $loan->save();

        return redirect()->route('loans')->with('hooray');
    }

    public function return($id) {
        $loan = Loan::find($id);
        $currentdate = Carbon::now();

        $book = Book::where('id', $loan->book['id'])->first();
        $book->copies = $book->copies + 1;
        $book->save();

        $loan->returned = 1;
        $loan->returned_at = $currentdate;
        $loan->save();

        return redirect()->route('loans');
    }

}
