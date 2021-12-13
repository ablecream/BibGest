<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index() {
        $cats = Category::all();
        $items_rec = array();
        
        for($x = 1; $x <= $cats->count(); $x++) {
            $books = Book::where('category_id', $x)->get()->count();
            $items_rec[] = $books;
        }
        

        return view('dashboard', ['cats'=>json_encode($cats), 'items'=>$items_rec]);
    }
}
