@extends('layouts.app')

@section('content')

  <div class="div">
    <a href="{{ route('register') }}" class="bg-gray-800 text-white px-4 py-3 rounded
                                 font-medium w-24 ml-20">Ajouter</a>
  </div>

  <table class="max-w-7xl leading-normal ml-20 mt-6 bg-indigo-100">
    <tr class="bg-gray-100">
      <td class="text-center">#</td>
      <td class="text-center">Nom</td>
      <td class="text-center">Nom d'utilisateur</td>
      <td class="text-center">Email</td>
      <td class="text-center">Mot de passe</td>
    </tr>
    @foreach($managers as $manager)
    <tr>
      <td class="text-center border-2 border-black">{{$manager->id}}</td>
      <td class="text-center border-2 border-black">{{$manager->name}}</td>
      <td class="text-center border-2 border-black">{{$manager->username}}</td>
      <td class="text-center border-2 border-black">{{$manager->email}}</td>
      <td class="text-center border-2 border-black">{{$manager->password}}</td>
    </tr>
    @endforeach
  </table>

@endsection