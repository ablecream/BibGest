<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function list() {
        $cats = Category::all();
        return view('categories.index', ['cats'=>$cats]);
    }

    public function index() {
        return view('categories.form');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'lable' => 'required|max:255',
        ]);

        $cat = new Category();

        $cat->lable = $request->lable;
        $cat->save();

        return redirect()->route('cats');
    }

    public function destroy($id) {
        $cat = Category::find($id);

        $cat->delete();

        return redirect()->route('cats');
    }

    public function editview($id) {
        $cat = Category::find($id);

        return view('categories.editform')->with('cat', $cat);
    }

    public function edit(Request $request, $id) {
        $cat = category::find($id);

        $this->validate([$request, 
            'lable' => 'max:255',
        ]);

        $cat->lable = $request->lable;
        $cat->save();

        return redirect()->route('cats');
    }

}
