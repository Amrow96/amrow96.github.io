@extends('templates.main')

@section('titulo')
Musica
@endsection
@section('principal')
<div class="container">
    <musica></musica>
    {{-- Aqui anira el contingut que no estigués al vue --}}
    {{-- Aqui aniria el Footer --}}
    <script>
        var cookiDate = new Date(2020,11,24);
        document.cookie = "paginavisitada=musica; expires=" + cookiDate.toUTCString();
    </script>
</div>

@endsection
