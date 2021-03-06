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
                            <h2 class="log-title">Login</h2>
                            @include('alerts.error')
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email"> <label
                                        class="control-label" for="input">Email</label><i class="mtrl-select"></i>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password" />
                                    <label class="control-label" for="input">Password</label><i class="mtrl-select"></i>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }} /><i class="check-box"></i>
                                        Recordarme
                                    </label>
                                </div>
                                <a href="#" title="" class="forgot-pwd">Recuperar contraseña</a>
                                <div class="submit-btns">
                                    <button type="submit" class="btn btn-primary">Ingresar</button>
                                    <a href="{{ route('register.step2') }}" class="btn btn-warning">Registrarte</a>
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