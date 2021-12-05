@extends('layouts.app')

@section('content')
  <div class="text-center text-xl">
    <div>
      Nom : {{ auth()->user()->name }}
    </div>
    <div>
      Pseudo : {{ auth()->user()->username }}
    </div>
    <div>
      Email : {{ auth()->user()->email }}
    </div>
  </div>

@endsection