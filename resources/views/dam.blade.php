@extends('templates.main')

@section('titulo')
DAM
@endsection
@section('principal')
<div class="container">
    <dam ref="component"></dam>
</div>
<script>
        var cookiDate = new Date(2020,11,24);
        document.cookie = "paginavisitada=dam; expires=" + cookiDate.toUTCString();
    </script>
@endsection
