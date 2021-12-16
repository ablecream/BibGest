@extends('layouts.app')

@section('content')
  
  <div class="flex justify-center">
    <div class="w-6/12 bg-dark p-6 rounded-lg">
      <div class="text-center text-green-500 font-bold mb-8 text-2xl">Ajouter un livre</div>
      <form action="{{ route('addloan') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
          <select name="book" id="book" placeholder="Livre"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('book') border-red-500 @enderror" value="{{ old('book') }}">
          <option selected disabled>Livre</option>
          @foreach($books as $book)
          <option value="{{ $book->id }}">{{$book->title}}</option>
          @endforeach

          @error('book')
            <div class="text-red-500 mt-2 text-sm">
              Vous devez remplir ce champ.
            </div>
          @enderror
          </select> 
        </div>
    
        <div class="mb-4">
          <select name="client" id="client" placeholder="Abonné"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('client') border-red-500 @enderror" value="{{ old('client') }}">
          <option selected disabled>Abonné</option>
          @foreach($clients as $client)
          <option value="{{ $client->id }}">{{$client->lastname}}, {{$client->firstname}}</option>
          @endforeach

          @error('client')
            <div class="text-red-500 mt-2 text-sm">
              Vous devez remplir ce champ.
            </div>
          @enderror
          </select> 
        </div>

        <div class="div">
          <button type="submit" class="bg-gray-800 text-white px-4 py-3 rounded
         font-medium w-full">Ajouter</button>
        </div>

      </form>
    </div>
  </div>

@endsection