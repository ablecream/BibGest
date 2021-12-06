<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Intervention\Image\Facades\Image;

class BookController extends Controller
{
    public function list() {
        $books = Book::all();
        return view('books.index', ['books'=>$books]);
    }

    public function listguest() {
        $books = Book::all();
        return view('home', ['books'=>$books]);
    }

    public function index() {
        return view('books.form');
    }

    public function store(Request $request) {
        
        $this->validate($request, [
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'editor' => 'required|max:255',
            'ISBN' => 'required|max:255',
            'language' => 'required|max:255',
            'year' => 'required|max:4',
            'copies' => 'required',
            'image' => 'required|image'
        ]);
        
        $imagePath = $request->file('image')->store('uploads', 'public');
        
        $image = Image::make(public_path("storage/{$imagePath}"))->resize(350,500);
        $image->save();
        
        
        $book = new Book();
        
        $book->title = $request->title;
        $book->author = $request->author;
        $book->category_id = $request->category;
        $book->editor = $request->editor;
        $book->ISBN = $request->ISBN;
        $book->language = $request->language;
        $book->year = $request->year;
        $book->copies = $request->copies;
        $book->image = $imagePath;
        $book->resume = $request->resume;
        $book->save();
        $book->tags()->attach([1,2]);
            
            
            return redirect()->route('books');
        }

    public function destroy($id) {
        $book = Book::find($id);

        $book->delete();

        return redirect()->route('books');
    }

    public function editview($id) {
        $book = Book::find($id);

        return view('books.editform')->with('book', $book);
    }

    public function edit(Request $request, $id) {
        $book = Book::find($id);
        
        $this->validate($request, [
            'title' => 'max:255',
            'author' => 'max:255',
            'editor' => 'max:255',
            'ISBN' => 'max:255',
            'language' => 'max:255',
            'year' => 'max:4',
            'copies' => 'integer',
        ]);

        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('uploads', 'public');
    
            $image = Image::make(public_path("storage/{$imagePath}"))->resize(350,500);
            $image->save();
            $book->image = $imagePath;
        }

        $book->title = $request->title;
        $book->author = $request->author;
        $book->category_id = $request->category;
        $book->editor = $request->editor;
        $book->ISBN = $request->ISBN;
        $book->language = $request->language;
        $book->year = $request->year;
        $book->copies = $request->copies;
        $book->resume = $request->resume;
        $book->save();

        return redirect()->route('books');
    }

    public function search() {
        $search_text = $_GET['search'];
        $books = Book::where('title', 'LIKE', '%'.$search_text.'%')
                        ->orWhere('author', 'LIKE', '%'.$search_text.'%')
                        ->orWhere('editor', 'LIKE', '%'.$search_text.'%')
                        ->orWhere('ISBN', 'LIKE', '%'.$search_text.'%')
                        ->orWhere('year', 'LIKE', '%'.$search_text.'%')
                        ->orWhere('language', 'LIKE', '%'.$search_text.'%')
                        ->get();

        return view('search', compact('books'));
        
    }

}

