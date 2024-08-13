@extends('layouts.app')

@section('content')
    <section id="hero" class="d-flex align-items-center">
        <div class="container" style="padding: 25px;">
            <div class="row">
                <div class="col-sm-5 wrap-contact100">
                    {{-- <div class="wrap-contact100"> --}}
                    <form class="contact100-form" method="POST" action="{{ route('login') }}">
                        @csrf

                        <span class="contact100-form-title">Iniciar sesión</span>
                        <div class="row">
                            <div class="col-sm-2">
                                <i class="bi bi-envelope" style="font-size: 30px"></i>
                            </div>
                            <div class="col-sm-10">
                                <div class="wrap-input100">
                                    <input id="email" type="email"
                                        class="input100 @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus
                                        placeholder="Escriba su correo electrónico">
                                </div>
                            </div>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Error al ingresar credenciales</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <i class="bi bi-lock" style="font-size: 30px"></i>
                            </div>
                            <div class="col-sm-10">
                                <div class="wrap-input100">
                                    <input id="password" type="password"
                                        class="input100 @error('password') is-invalid @enderror" name="password" required
                                        autocomplete="current-password" placeholder="Escriba su contraseña">
                                </div>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Error al ingresar credenciales</strong>
                                </span>
                            @enderror

                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        Recordar sesión
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-login">Iniciar sesión</button>
                        </div>
                        <!-- Register buttons -->
                        {{-- <div class="text-center" style="margin-top: 40px;">
                                    <p>¿No tienes una cuenta? <a href="{{ route('register') }}">Regístrate</a></p>
                                </div> --}}
                    </form>
                    {{-- </div>                     --}}
                </div>
                {{-- <div class="col-sm-5 wrap-contact101">
                    <div class="row">
                        <span class="contact100-form-title">SISTEMA AUTOMATIZADO DE ACREDITACIÓN PARA LAS UNIVERSIDADES Y ESCUELAS POLITÉCNICAS 2023</span>
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
