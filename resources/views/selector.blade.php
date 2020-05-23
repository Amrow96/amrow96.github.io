@extends('templates.main')
@section('titulo')
Textos
@endsection
@section('principal')
        <textos></textos>

    @if(Auth::check())
        <a class="btn btn-secondary">{{ Auth::user()->email }}</a>
        {{-- Aqui estas loguejat faltarà posar el auth al routes--}}
   @else         
   
       {{-- <div>No estas loguejat!</div> --}}
        <a class="btn btn-danger"href="{{ route('logout') }}">Logout</a>
    @endif

    @endsection