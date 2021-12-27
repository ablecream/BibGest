<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use App\Models\Tag;
use Intervention\Image\Facades\Image;

class BookController extends Controller
{
    public function list() {
        $books = Book::all();
        return view('books.index', ['books'=>$books]);
    }

    public function listguest() {
        $books = Book::all();
        $cats = Category::all();
        return view('home', ['books'=>$books], ['cats'=>$cats]);
    }

    public function listbyCat($id) {
        $books = Book::where('category_id', $id)->get();
        $cats = Category::all();
        return view('books.bycats', ['books'=>$books], ['cats'=>$cats]);
    }

    public function singlebook($id) {
        $book = Book::find($id);
        return view('books.book', ['book'=>$book]);
    }

    public function index() {
        $cats = Category::all();
        return view('books.form', ['cats'=>$cats]);
    }

    public function store(Request $request) {
        
        $tags_arr = explode(" ", $request->tags);

        $tagsinput = array();

        for($i = 0; $i<count($tags_arr); $i++) {
            if(Tag::where('label', $tags_arr[$i])->exists()) {
                array_push($tagsinput, Tag::where('label', $tags_arr[$i])->first()->id);
            }
        }

        $this->validate($request, [
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'editor' => 'required|max:255',
            'ISBN' => 'required|max:255',
            'language' => 'required|max:255',
            'year' => 'required|max:4',
            'copies' => 'required',
            'image' => 'required|image',
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
        $book->tags()->attach($tagsinput);
            
        return redirect()->route('books');
    }

    public function destroy($id) {
        $book = Book::find($id);

        $book->delete();

        return redirect()->route('books');
    }

    public function editview($id) {
        $book = Book::find($id);
        $cats = Category::all();

        return view('books.editform', ['book'=>$book, 'cats'=>$cats]);
    }

    public function edit(Request $request, $id) {
        $book = Book::find($id);

        $tags_arr = explode(" ", $request->tags);

        $tagsinput = array();

        for($i = 0; $i<count($tags_arr); $i++) {
            if(Tag::where('label', $tags_arr[$i])->exists()) {
                array_push($tagsinput, Tag::where('label', $tags_arr[$i])->first()->id);
            }
        }
        
        $this->validate($request, [
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'editor' => 'required|max:255',
            'ISBN' => 'required|max:255',
            'language' => 'required|max:255',
            'year' => 'required|max:4',
            'copies' => 'required|integer',
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
        $book->tags()->attach($tagsinput);

        return redirect()->route('books');
    }

    public function search() {
        $cats = Category::all();
        $search_text = $_GET['search'];
        $books = Book::where('title', 'LIKE', '%'.$search_text.'%')
                        ->orWhere('author', 'LIKE', '%'.$search_text.'%')
                        ->orWhere('editor', 'LIKE', '%'.$search_text.'%')
                        ->orWhere('ISBN', 'LIKE', '%'.$search_text.'%')
                        ->orWhere('year', 'LIKE', '%'.$search_text.'%')
                        ->orWhere('language', 'LIKE', '%'.$search_text.'%')
                        ->get();

        return view('search', compact('books'), ['cats'=>$cats]);
    }

    public function booksearch() {
        $search_text = $_GET['search'];
        $books = Book::where('title', 'LIKE', '%'.$search_text.'%')
                        ->orWhere('author', 'LIKE', '%'.$search_text.'%')
                        ->orWhere('editor', 'LIKE', '%'.$search_text.'%')
                        ->orWhere('ISBN', 'LIKE', '%'.$search_text.'%')
                        ->orWhere('year', 'LIKE', '%'.$search_text.'%')
                        ->orWhere('language', 'LIKE', '%'.$search_text.'%')
                        ->get();

        return view('books.search', compact('books'));
    }

}

