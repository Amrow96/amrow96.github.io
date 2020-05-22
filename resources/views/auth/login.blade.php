@extends('templates.main')
@section('titulo')
Control d'Acces 
{{-- TODO: llegir aquest Text de la BAse de dades  id=2 controlAcces--}}
@endsection
@section('principal')
<div class="container justify-content-center ">
    <div class="row ">
      <div class="col col-12 text-center">
        <div class="vh-100 d-flex justify-content-center">
          <div class="col mt-auto mb-auto">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>{{-- TODO: llegir text de la base de dades  id=2 controlAcces--}}
                    @if(Auth::check())
                    {<p>Estas conectat</p>}@endif
                <div class="card-body">
                    <form method="POST" action="{{ action('Auth\LoginController@login') }}">
                        @csrf
                        <div class="form-group row">{{-- TODO: llegir text de la base de dades  id=3 correu--}}
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" placeholder="example@example.com" required autocomplete="email" autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>{{-- TODO: llegir text de la base de dades  id=4 paswd--}}

                            <div class="col-md-6">
                                <input id="paswd" type="password" class="form-control" name="paswd" value="{{ old('paswd') }}" required autocomplete="current-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary mr-3">
                                    {{ __('Login') }}{{-- TODO: llegir text de la base de dades  id=2 controlAcces--}}
                                </button>
                          
                                <a href="{{ url('/') }}" class="btn btn-secondary ml-3">
                                    Cancelar{{-- TODO: llegir text de la base de dades--}}
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
             </div>
            </div>
             </div>
            
    </div>
</div>
@endsection
