@extends('layouts.caces')
@section('sidebar')
    @include('layouts.sidebar')
@endsection
@section('content')
<div class="pagetitle">
    <h3>REGISTRAR USUARIO</h3>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Registrar usuario</li>
        </ol>
    </nav>
</div>
<div class="card">
    <div class="card-header pb-2">
        <h6 class="fw-normal text-pacifico text-uppercase">Registrar Usuario</h6>
    </div>
    <div class="card-body mt-3">
        <div class="row p-2">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">
                    <div class="col-1">
                        <i class="bi bi-person-fill" style="font-size: 30px"></i>
                    </div>
                    <div class="col">
                        <div class="wrap-input100">
                            {{-- <span class="label-input100">Nombre</span> --}}
                            <input id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                name="name" value="{{ old('name') }}" required placeholder='Nombre'>
                        </div>
                    </div>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-1">
                        <i class="bi bi-envelope" style="font-size: 30px"></i>
                    </div>
                    <div class="col">
                        <div class="wrap-input100">
                            {{-- <span class="label-input100">Correo</span> --}}
                            <input id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required placeholder="Correo">
                        </div>
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-1">
                        <i class="bi bi-lock" style="font-size: 30px"></i>
                    </div>
                    <div class="col">
                        <div class="wrap-input100">
                            {{-- <span class="label-input100">Contraseña</span> --}}
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password" placeholder="Contraseña">
                        </div>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-1">
                        <i class="bi bi-shield-lock" style="font-size: 30px"></i>
                    </div>
                    <div class="col">
                        <div class="wrap-input100">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required autocomplete="new-password"
                                placeholder="Confirmar contraseña">
                        </div>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-success">Registrarse</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection