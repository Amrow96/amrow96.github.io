@extends('templates.main')

@section('titulo')
Musica
@endsection
@section('principal')
<div class="container">
    <musica></musica>
    
</div>
<script>
        var cookiDate = new Date(2020,11,24);
        document.cookie = "paginavisitada=musica; expires=" + cookiDate.toUTCString();
    </script>
@endsection
