@extends('layouts.app')

@section('content')
  
  <div class="flex justify-center">
    <div class="w-4/12 bg-dark p-6 rounded-lg">
      <form action="{{ route('addbook') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
          <input type="text" name="title" id="title" placeholder="Titre"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('title') border-red-500 @enderror" value="{{ old('title') }}">

          @error('title')
            <div class="text-red-500 mt-2 text-sm">
              Vous devez remplir ce champ.
            </div>
          @enderror 
        </div>

        <div class="mb-4">
          <input type="text" name="author" id="author" placeholder="Auteur"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('author') border-red-500 @enderror" value="{{ old('author') }}">

          @error('author')
            <div class="text-red-500 mt-2 text-sm">
              Vous devez remplir ce champ.
            </div>
          @enderror 
        </div>

        <div class="mb-4">
          <input type="text" name="editor" id="editor" placeholder="Editeur"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('editor') border-red-500 @enderror" value="{{ old('editor') }}">
          
          @error('editor')
            <div class="text-red-500 mt-2 text-sm">
              Vous devez remplir ce champ.
            </div>
          @enderror 

        </div>

        <div class="mb-4">
          <input type="text" name="ISBN" id="ISBN" placeholder="ISBN"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('ISBN') border-red-500 @enderror" value="{{ old('ISBN') }}">
          
          @error('ISBN')
            <div class="text-red-500 mt-2 text-sm">
              Vous devez remplir ce champ.
            </div>
          @enderror 

        </div>
        
        <div class="mb-4">
          <input type="text" name="language" id="language" placeholder="Langue"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('language') border-red-500 @enderror" value="{{ old('language') }}">
          
          @error('language')
            <div class="text-red-500 mt-2 text-sm">
              Vous devez remplir ce champ.
            </div>
          @enderror 

        </div>

        
        <div class="mb-4">
          <input type="text" name="year" id="year" placeholder="Année"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('year') border-red-500 @enderror" value="{{ old('year') }}">
          
          @error('year')
            <div class="text-red-500 mt-2 text-sm">
              Vous devez remplir ce champ.
            </div>
          @enderror 

        </div>
        
        <div class="mb-4">
          <input type="text" name="copies" id="copies" placeholder="Nombre d'exemplaires"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('copies') border-red-500 @enderror" value="{{ old('copies') }}">
          
          @error('copies')
            <div class="text-red-500 mt-2 text-sm">
              Vous devez remplir ce champ.
            </div>
          @enderror 

        </div>
        
        <div class="mb-4">
          <input type="file" name="image" id="image"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('image') border-red-500 @enderror" value="{{ old('image') }}">
          
          @error('image')
            <div class="text-red-500 mt-2 text-sm">
              Vous devez remplir ce champ.
            </div>
          @enderror 

        </div>

        <div class="mb-4">
          <textarea name="resume" id="resume" placeholder="Resumé"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('resume') border-red-500 @enderror" value="{{ old('resume') }}">
          
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