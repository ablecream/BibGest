<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    public function index() {
        $books = Book::all();
        return view('posts.books', ['books'=>$books]);
    }

    public function store() {
        
    }
}

