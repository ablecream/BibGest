@extends('layouts.app')

@section('content')
  
  <div class="flex justify-center">
    <div class="w-4/12 bg-dark p-6 rounded-lg">
      <form action="{{ route('clients.edit', $client->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
          <input type="text" name="lastname" id="lastname" placeholder="Nom"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('lastname') border-red-500 @enderror" value="{{ $client->lastname }}">

          @error('lastname')
            <div class="text-red-500 mt-2 text-sm">
              Vous devez remplir ce champ.
            </div>
          @enderror 
        </div>

        <div class="mb-4">
          <input type="text" name="firstname" id="firstname" placeholder="Prénom"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('firstname') border-red-500 @enderror" value="{{ $client->firstname }}">

          @error('firstname')
            <div class="text-red-500 mt-2 text-sm">
              Vous devez remplir ce champ.
            </div>
          @enderror 
        </div>

        <div class="mb-4">
          <input type="date" name="birth" id="birth" placeholder="Date de naissance"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('birth') border-red-500 @enderror" value="{{ $client->birth }}">

          @error('birth')
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