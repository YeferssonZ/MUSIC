@extends('layouts.app')

@section('content')

<div class="container" style="background-color: white;border-radius: 20px ">
    <div class="justify-content-center">
        <div class="row">
            <div class="col-5 m-3">
                <div class="text-center">
                    <img style="border-radius:10px ;" src="https://i.pinimg.com/564x/eb/a5/56/eba556cae64b32ed24efcf140078f1ba.jpg" alt="" height="570" width="">
                   
                </div>
            </div>
            <div class="col-5 m-5 ">
                <div class="">
                    <div class="">
                        <h2>
                            <b>
                                {{ __('Spotify') }}
                            </b>
                        </h2>
                    </div>
                    <div class="">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div>
                                <h3 class="text-center m-3"><b> Registrate gratis para escuchar</b></h3>
                            </div>
                            <div class="row mb-2">
                                <label for="name" class="col-form-label text-md"><b>{{ __('Nombre') }}</b></label>

                                <div class="col-md-11">
                                    <input id="name" type="text" placeholder="Name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="email" class=" col-form-label text-md"><b>{{ __('Email') }}</b></label>

                                <div class="col-md-11">
                                    <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="password" class="col-form-label text-md"><b>{{ __('Contraseña') }}</b></label>

                                <div class="col-md-11">
                                    <input id="password" type="password" placeholder="*******" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-2">
                                <label for="password-confirm" class="col-form-label text-md"><b>{{ __('Confirmar Contraseña') }}</b></label>

                                <div class="col-md-11">
                                    <input id="password-confirm" type="password" placeholder="*******" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-12 text-center m-4">
                                    <button type="submit" class="btn" style="background-color:#744BF5; color:aliceblue;">
                                        <small>
                                            <b>
                                                {{ __('REGISTRARTE') }}
                                            </b>
                                        </small>
                                    </button>
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