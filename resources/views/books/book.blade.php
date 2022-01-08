@extends('layouts.app')

@section('content')

 <div class="flex flex-wrap mx-24 my-16 @auth ml-40 @endauth">
  <img class="w-72 rounded" src="../storage/{{ $book->image }}" alt="image">
  <div class="md:px-8 py-4 md:m-6 w-2/3 align-center">
      <p class="font-bold text-red-800 text-2xl mb-4">{{ $book->category['label']}}</p>
    <div class="font-bold text-5xl mb-6 dark:text-white">{{ $book->title }}</div>
    <div class="py-2 dark:text-white">{!! DNS1D::getBarcodeHTML($book->ISBN, 'CODABAR') !!}</div>
      <p class="text-blue-900 text-2xl mb-2">{{ $book->author }}, {{ $book->year }}</p>
      <p class="text-gray-800 dark:text-white text-lg my-2">Editeur : {{ $book->editor }}</p>
      <p class="text-gray-800 dark:text-white text-lg mb-2">Code ISBN : {{ $book->ISBN }}</p>
      <p class="text-gray-800 dark:text-white text-lg mb-2">Langue : {{ $book->language }}</p>
      <p class="text-gray-800 dark:text-white text-lg mb-2">Exemplaires disponible : {{ $book->copies }}</p>
      <div class="flex justify-center">
        @foreach($book->tags as $tag)
        <p class="font-bold bg-white dark:bg-black rounded-md text-red-800 text-xl m-2 p-2"> {{ $tag->label }}</p>
        @endforeach
      </div>
    </div>
    <div class="dark:text-white font-medium my-16 text-2xl">
      <h3 class="font-semibold mb-4">Résumé<hr class="text-black"></h3>
      <p>{{ $book->resume }}</p>
    </div>
 </div>

@endsection