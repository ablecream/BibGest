@extends('layouts.app')

@section('content')

<div class="flex flex-wrap justify-evenly items-center m-12">
  <div class="flow-root mx-8 dark:text-white">
    <div class="text-5xl my-6 animate-bounce">Contactez-nous</div>
    <div class="text-xl animate-pulse">+213 555 23 44 35</div>
    <div class="text-xl animate-pulse">quoiquequiquand@gmail.com</div>
    <div class="text-xl animate-pulse">rayenebenmansour20@gmail.com</div>
    <div class="text-xl my-4">
      <a href="" class="hover:text-indigo-500 duration-300 ease-in-out"><i class="fab fa-facebook fa-3x"></i></a>
      <a href="" class="hover:text-indigo-500 duration-300 ease-in-out"><i class="fab fa-twitter fa-3x"></i></a>
      <a href="" class="hover:text-indigo-500 duration-300 ease-in-out"><i class="fab fa-instagram fa-3x"></i></a>
    </div>
  </div>

  <form action="">
    @csrf
    <div class="m-4 font-bold text-center text-indigo-800 dark:text-green-500">Ecrivez-nous</div>
    <div class="mb-4">
        <input type="text" name="Nom" id="Nom" placeholder="Nom"
        class="bg-gray-100 border-2 w-full px-8 py-4 rounded-lg
        @error('Nom') border-red-500 @enderror" value="{{ old('Nom') }}">

        @error('Nom')
          <div class="text-red-500 mt-2 text-sm">
            Vous devez remplir ce champ.
          </div>
        @enderror 
      </div>
      <div class="mb-4">
        <input type="text" name="Email" id="Email" placeholder="Email"
        class="bg-gray-100 border-2 w-full px-8 py-4 rounded-lg
        @error('Email') border-red-500 @enderror" value="{{ old('Email') }}">

        @error('Email')
          <div class="text-red-500 mt-2 text-sm">
            Vous devez remplir ce champ.
          </div>
        @enderror 
      </div>
      <div class="mb-4">
          <textarea name="Message" id="Message" placeholder="Message"
          class="bg-gray-100 border-2 w-full px-8 py-4 rounded-lg
          @error('Message') border-red-500 @enderror" value="{{ old('Message') }}">
          
          @error('Message')
            <div class="text-red-500 mt-2 text-sm">
              Vous devez remplir ce champ.
            </div>
          @enderror 
          </textarea>
        </div>

        <div class="div">
          <button type="submit" class="bg-gray-800 text-white px-4 py-3 rounded
         font-medium w-full">Envoyer</button>
        </div>
  </form>
</div>

@endsection