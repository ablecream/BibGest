@extends('layouts.app')

@section('content')

<div class="flex justify-between mx-8 @auth ml-32 @endauth">
  <nav class="flex flex-wrap text-sm font-bold">
    @foreach($cats as $cat)
    <li class="block px-3 py-2 m-2 rounded-md bg-white hover:bg-indigo-300 
              dark:bg-gray-900 dark:text-white dark:hover:bg-green-500 transition-all">
      <a href="{{ route('bycats', $cat->id) }}">{{ $cat->label }}</a>
    </li>
    @endforeach
  </nav>
</div>
<form class="flex justify-start mx-9 my-4 items-center text-gray-700 @auth ml-32 @endauth" type="get" action="{{ route('homesearch') }}">
    <input type="text" class="border-2 border-gray-300 bg-white
     h-10 px-5 sm:pr-72 rounded-lg text-sm focus:outline-none" name="search" placeholder="Rechercher un livre">
     <button type="submit" class="flex items-center justify-center px-4"><i class="fas fa-search"></i></button>
</form>

<div class="flex flex-wrap gap-6 mx-6 my-12 @auth ml-32 @endauth"> 
  @foreach($books as $book)
    <a href="{{ route('book', $book->id) }}" class="h-screen sm:h-96 lg:h-80 w-full sm:w-1/3 lg:w-1/6 flex items-end rounded-2xl transition-all bg-cover bg-center"
                                                    style="background-image: url('../storage/{{ $book->image }}')" >
      <div class="mx-auto my-2">
        <p class="text-indigo-800 dark:text-green-500 font-extrabold text-base">{{ $book->category['label'] }}</p>
      </div>
    </a>
  @endforeach
</div>

@endsection