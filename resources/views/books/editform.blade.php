@extends('layouts.app')

@section('content')
  
  <div class="flex justify-center">
    <div class="w-4/12 bg-dark p-6 rounded-lg">
      <div class="text-center text-green-500 font-bold mb-8 text-2xl">Modifier le livre</div>
      <form action="{{ route('books.edit', $book->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
          <input type="text" name="title" id="title" placeholder="Titre"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('title') border-red-500 @enderror" value="{{ $book->title }}">

          @error('title')
            <div class="text-red-500 mt-2 text-sm">
              Vous devez remplir ce champ.
            </div>
          @enderror 
        </div>

        <div class="mb-4">
          <input type="text" name="author" id="author" placeholder="Auteur"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('author') border-red-500 @enderror" value="{{ $book->author }}">

          @error('author')
            <div class="text-red-500 mt-2 text-sm">
              Vous devez remplir ce champ.
            </div>
          @enderror 
        </div>
        
        <div class="mb-4">
          <select name="category" id="category" placeholder="Categorie"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('category') border-red-500 @enderror">
          @foreach($cats as $cat)
          <option value="{{ $cat->id }}">{{$cat->label}}</option>
          @endforeach

          @error('category')
            <div class="text-red-500 mt-2 text-sm">
              Vous devez remplir ce champ.
            </div>
          @enderror
          </select> 
        </div>

        <div class="mb-4">
          <input type="text" name="editor" id="editor" placeholder="Editeur"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('editor') border-red-500 @enderror" value="{{ $book->editor }}">
          
          @error('editor')
            <div class="text-red-500 mt-2 text-sm">
              Vous devez remplir ce champ.
            </div>
          @enderror 

        </div>

        <div class="mb-4">
          <input type="text" name="ISBN" id="ISBN" placeholder="ISBN"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('ISBN') border-red-500 @enderror" value="{{ $book->ISBN }}">
          
          @error('ISBN')
            <div class="text-red-500 mt-2 text-sm">
              Vous devez remplir ce champ.
            </div>
          @enderror 

        </div>
        
        <div class="mb-4">
          <input type="text" name="language" id="language" placeholder="Langue"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('language') border-red-500 @enderror" value="{{ $book->language }}">
          
          @error('language')
            <div class="text-red-500 mt-2 text-sm">
              Vous devez remplir ce champ.
            </div>
          @enderror 

        </div>

        
        <div class="mb-4">
          <input type="text" name="year" id="year" placeholder="Année"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('year') border-red-500 @enderror" value="{{ $book->year }}">
          
          @error('year')
            <div class="text-red-500 mt-2 text-sm">
              Vous devez remplir ce champ.
            </div>
          @enderror 

        </div>
        
        <div class="mb-4">
          <input type="text" name="copies" id="copies" placeholder="Nombre d'exemplaires"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('copies') border-red-500 @enderror" value="{{ $book->copies }}">
          
          @error('copies')
            <div class="text-red-500 mt-2 text-sm">
              Vous devez remplir ce champ.
            </div>
          @enderror 

        </div>

        <div class="mb-4">
          <input type="text" name="tags" id="tags" placeholder="Mots-clés"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('tags') border-red-500 @enderror"
           value="@foreach($book->tags as $tag){{ $tag->label }} @endforeach">
          
          @error('tags')
            <div class="text-red-500 mt-2 text-sm">
              Vous devez remplir ce champ.
            </div>
          @enderror 

        </div>
        
        <div class="mb-4">
          <input type="file" name="image" id="image"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('image') border-red-500 @enderror" value="{{ $book->image }}">
      
        </div>

        <div class="mb-4">
          <textarea name="resume" id="resume" placeholder="Resumé"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('resume') border-red-500 @enderror" value="{{ $book->resume }}">
          
          @error('resume')
            <div class="text-red-500 mt-2 text-sm">
              Vous devez remplir ce champ.
            </div>
          @enderror 
          </textarea>
        </div>

        <div class="div">
          <button type="submit" class="bg-gray-800 text-white px-4 py-3 rounded
         font-medium w-full">Ajouter</button>
        </div>

      </form>
    </div>
  </div>

@endsection