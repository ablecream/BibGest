@extends('layouts.app')

@section('content')

  <div class="ml-48 mt-16">
    <a href="{{ route('register') }}" class="bg-gray-800 text-white px-4 py-3 rounded
                                             font-medium w-24">Ajouter</a>
  </div>

  <table class="table-layout">
    <tr class="bg-gray-200">
      <td class="text-center p-2">#</td>
    </tr>
    
    <tr class="row">

    </tr>
    @endforeach
  </table>

@endsection