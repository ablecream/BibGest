@extends('layouts.app')

@section('content')
  
  <div class="flex justify-center">
    <div class="w-4/12 bg-dark p-6 rounded-lg">
      <div class="text-center text-green-500 font-bold mb-8 text-2xl">Modifier le mot clé</div>
      <form action="{{ route('tags.edit', $tag->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
          <input type="text" name="lable" id="lable" placeholder="Libellé"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('label') border-red-500 @enderror" value="{{ $tag->label }}">

          @error('label')
            <div class="text-red-500 mt-2 text-sm">
              Vous devez remplir ce champ.
            </div>
          @enderror 
        </div>

        <div class="div">
          <button type="submit" class="bg-gray-800 text-white px-4 py-3 rounded
         font-medium w-full">Modifier</button>
        </div>

      </form>
    </div>
  </div>

@endsection