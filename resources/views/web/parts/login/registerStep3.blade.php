<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>Peña Martín Palermo</title>
    <link rel="icon" href="{{ asset('styleWeb/images/favicon.png') }}" type="image/png" sizes="16x16">

    <link rel="stylesheet" href="{{ asset('styleWeb/css/main.min.css') }}">
    <link rel="stylesheet" href="{{ asset('styleWeb/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('styleWeb/css/color.css') }}">
    <link rel="stylesheet" href="{{ asset('styleWeb/css/responsive.css') }}">

</head>

<body>
    <!--<div class="se-pre-con"></div>-->
    <div class="theme-layout">
        <div class="container-fluid pdng0">
            <div class="row merged">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    @include('web.parts.login._asideLogin')
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="login-reg-bg">
                        <div class="log-reg-area sign">
                            <h2 class="log-title">Registro</h2>
                            <p>
                                Complete los campos faltan, si llega haber un error comuniquese con la peña para
                                corregirlo.
                            </p>
                            <form method="POST" action="{{ route('register.update') }}">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control" id="readOnlyInput" type="text" placeholder="{{ $user->name }}" readonly="">                                    
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="readOnlyInput" name="email" type="text" value="{{ $user->email }}" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" id="readOnlyInput" type="text" placeholder="{{ $user->number_member }}" readonly="">
                                    <input value="{{ $user->number_member }}" name="number_member" hidden readonly>
                                </div>

                                <div class="form-group">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">
                                    <label class="control-label" for="input">Ingresar Password</label><i class="mtrl-select"></i>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                    <label class="control-label" for="input">Repetir Password</label><i class="mtrl-select"></i>
                                </div>
                                                               
                                <div class="submit-btns">
                                    <button class="mtr-btn" type="submit"><span>Registrarse</span></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="{{ asset('styleWeb/js/main.min.js') }}"></script>
    <script src="{{ asset('styleWeb/js/script.js') }}"></script>

</body>

</html>
