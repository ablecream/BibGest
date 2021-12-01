@extends('layouts.app')

@section('content')
  
  <div class="flex justify-center">
    <div class="w-4/12 bg-dark p-6 rounded-lg">
      <form action="{{ route('addcat') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
          <input type="text" name="lable" id="lable" placeholder="Libellé"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('lable') border-red-500 @enderror" value="{{ old('lable') }}">

          @error('lable')
            <div class="text-red-500 mt-2 text-sm">
              Vous devez remplir ce champ.
            </div>
          @enderror 
        </div>

        <div class="div">
          <button type="submit" class="bg-gray-800 text-white px-4 py-3 rounded
         font-medium w-full">Ajouter</button>
        </div>

      </form>
    </div>
  </div>

@endsection