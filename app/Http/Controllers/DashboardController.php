<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index() {
        $cats = Category::all();
        $items_rec = array();
        $books_date = Book::all()->pluck('created_at')->toArray();
        $books_count = Book::all()->count();
        $years = array();
        
        for($x = 1; $x <= $cats->count(); $x++) {
            $books = Book::where('category_id', $x)->get()->count();
            $items_rec[] = $books;
        }

        for($x = 0; $x <= $books+1; $x++) {
            $date = new Carbon($books_date[$x]);
            if(!in_array($date->year, $years)){
                $years[] = $date->year;
            }
        }
        sort($years);
        $books_years = array_count_values($years);
        
        return view('dashboard', ['cats'=>json_encode($cats), 'items'=>$items_rec, 'books_years'=>$books_years]);
    }

    public function contact() {
        return view('contact');
    }
}
