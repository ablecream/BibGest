@extends('layouts.app')

@section('content')
  
  <div class="flex justify-center">
    <div class="w-4/12 bg-dark p-6 rounded-lg">
      <form action="{{ route('edit', $manager->id) }}" method="post">
        @csrf
        <div class="mb-4">
          <input type="text" name="name" id="name" placeholder="Nom"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('name') border-red-500 @enderror" value="{{ $manager->name }}">
        </div>

        <div class="mb-4">
          <input type="text" name="username" id="username" placeholder="Pseudo"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('username') border-red-500 @enderror" value="{{ $manager->username }}">
        </div>

        <div class="mb-4">
          <input type="text" name="email" id="email" placeholder="Email"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('email') border-red-500 @enderror" value="{{ $manager->email }}">
        </div>

        <div class="mb-4">
          <input type="password" name="password" id="password" placeholder="Mot de passe"
          class="bg-gray-100 border-2 w-full p-4 rounded-lg
          @error('password') border-red-500 @enderror" value="">
        </div>

        <div class="div">
          <button type="submit" class="bg-gray-800 text-white px-4 py-3 rounded
         font-medium w-full">Modifier</button>
        </div>
      </form>
    </div>
  </div>

@endsection