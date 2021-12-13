@extends('layouts.app')

@section('content')

<div class="flex justify-between mx-8 @auth ml-32 @endauth">
  <nav class="flex flex-wrap text-sm font-bold">
    @foreach($cats as $cat)
    <li class="block px-3 py-2 m-2 rounded-md bg-white hover:bg-green-500">
      <a href="{{ route('bycats', $cat->id) }}">{{ $cat->label }}</a>
    </li>
    @endforeach
  </nav>
</div>
<form class="flex justify-start mx-9 my-4 items-center text-gray-700 @auth ml-32 @endauth" type="get" action="{{ route('search') }}">
    <input type="text" class="border-2 border-gray-300 bg-white
     h-10 px-5 pr-72 rounded-lg text-sm focus:outline-none" name="search" placeholder="Rechercher un livre">
     <button type="submit" class="flex items-center justify-center px-4"><i class="fas fa-search"></i></button>
</form>

<div class="grid grid-cols-5 gap-4 m-6 @auth ml-32 @endauth">  
  @foreach($books as $book)
    <a href="{{ route('book', $book->id) }}" class="bg-white max-w-sm shadow-xl overflow-hidden rounded-lg">
      <img class="w-full" src="../storage/{{ $book->image }}" alt="image">
      <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">{{ $book->title }}</div>
        <p class="text-gray-700 text-base">{{ $book->author }}</p>
        <p class="text-green-500 text-base">{{ $book->category['label'] }}</p>
      </div>
    </a>
  @endforeach
</div>

@endsection