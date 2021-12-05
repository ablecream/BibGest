<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function list() {
        $tags = Tag::paginate(5);
        return view('tags.index', ['tags'=>$tags]);
    }

    public function index() {
        return view('tags.form');
    }

    public function store(Request $request) {

        $this->validate($request, [
            'label' => 'required|max:255',
        ]);

        $tag = new Tag();

        $tag->label = $request->label;
        $tag->save();

        return redirect()->route('tags');
    }

    public function destroy($id) {
        $tag = Tag::find($id);

        $tag->delete();

        return redirect()->route('tags');
    }

    public function editview($id) {
        $tag = Tag::find($id);

        return view('tags.editform')->with('tag', $tag);
    }

    public function edit(Request $request, $id) {
        $tag = Tag::find($id);

        $this->validate([$request, 
            'label' => 'max:255',
        ]);

        $tag->label = $request->label;
        $tag->save();

        return redirect()->route('tags');
    }

}
