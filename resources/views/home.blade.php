@extends('templates.main')

@section('titulo')
Welcome
@endsection
@section('principal')
<div class="container">
    <home></home>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Elemento base</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                Aqui el contenido
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
