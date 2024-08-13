@extends('layouts.app')

@section('content')
    <section id="hero" class="d-flex align-items-center">
        <div class="container" style="padding: 25px;">
            <div class="row">
                <div class="col-sm-5 wrap-contact100">
                    {{-- <div class="wrap-contact100"> --}}
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <span class="contact100-form-title">Registrarse</span>

                        <div class="row">
                            <div class="col-sm-2">
                                <i class="bi bi-person-fill" style="font-size: 30px"></i>
                            </div>
                            <div class="col-sm-10">
                                <div class="wrap-input100">
                                    {{-- <span class="label-input100">Nombre</span> --}}
                                    <input id="name" type="text"
                                        class="input100 icono-placeholder @error('name') is-invalid @enderror"
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
                            <div class="col-sm-2">
                                <i class="bi bi-envelope" style="font-size: 30px"></i>
                            </div>
                            <div class="col-sm-10">
                                <div class="wrap-input100">
                                    {{-- <span class="label-input100">Correo</span> --}}
                                    <input id="email" type="email"
                                        class="input100 @error('email') is-invalid @enderror" name="email"
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
                            <div class="col-sm-2">
                                <i class="bi bi-lock" style="font-size: 30px"></i>
                            </div>
                            <div class="col-sm-10">
                                <div class="wrap-input100">
                                    {{-- <span class="label-input100">Contraseña</span> --}}
                                    <input id="password" type="password"
                                        class="input100 @error('password') is-invalid @enderror" name="password" required
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
                            <div class="col-sm-2">
                                <i class="bi bi-shield-lock" style="font-size: 30px"></i>
                            </div>
                            <div class="col-sm-10">
                                <div class="wrap-input100">
                                    {{-- <span class="label-input100">Confirmar contraseña</span> --}}
                                    <input id="password-confirm" type="password" class="input100"
                                        name="password_confirmation" required autocomplete="new-password"
                                        placeholder="Confirmar contraseña">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-login">Registrarse</button>
                        </div>
                    </form>
                    {{-- </div>                     --}}
                </div>
                {{-- <div class="col-sm-5 wrap-contact101">
                    <div class="row">
                        <span class="contact100-form-title">SISTEMA AUTOMATIZADO ADMINISTRATIVO
                            FINANCIERO VÁSQUEZ</span>
                        <div class="loading-screen">
                            <div class="loading">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <h6 class="text-danger">CONSEJOS DE SEGURIDAD</h6>
                        <ul>
                            <li>Recuerda actualizar tu contraseña periódicamente</li>
                            <li>Cierra sesión al terminar su jornada</li>
                            <li>No compartas tu usuario y clave con nadie</li>
                            <li>Si inicias sesión en un computador no concurrente, no guardes tu usuario ni constraseña en
                                el
                                ordenador</li>
                        </ul>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
@endsection
