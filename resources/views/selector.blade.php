@extends('templates.main')
@section('titulo')
Selector{{-- TODO: llegir aquest Text de la BAse de dades  id=2 controlAcces--}}
@endsection
@section('principal')
    @if(Auth::check())
        <a class="btn btn-secondary">{{ Auth::user()->email }}</a>
        
      <div>Has de seleccionar una de les dues opcions</div>
    @else
        <a class="btn btn-danger"href="{{ route('logout') }}">Logout</a>
        <div>No estas loguejat:</div>
    @endif
@endsection