@extends('layouts.app')

@section('content')

<form class="flex justify-end relative mx-16 text-gray-700" type="get" action="{{ route('search') }}">
    <input type="text" class="border-2 border-gray-300 bg-white
     h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" name="search" placeholder="Recherche">
     <button type="submit" class="flex items-center justify-center px-4"><i class="fas fa-search"></i></button>
  </form>

<div class="grid grid-cols-3 gap-4 m-16">  
  @foreach($books as $book)
    <div class="max-w-sm shadow-lg overflow-hidden rounded">
      <img class="w-full" src="storage/{{ $book->image }}" alt="image">
      <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">{{ $book->title }}</div>
        <p class="text-gray-700 text-base">{{ $book->author }}</p>
      </div>
    </div>
  @endforeach
</div>

@endsection