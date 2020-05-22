@extends('templates.main')

@section('titulo')
DAW
@endsection
@section('principal')
<div class="container">
    <musica></musica>Estas en DAW
</div>
<script>
        var cookiDate = new Date(2020,11,24);
        document.cookie = "paginavisitada=daw; expires=" + cookiDate.toUTCString();
    </script>
@endsection
