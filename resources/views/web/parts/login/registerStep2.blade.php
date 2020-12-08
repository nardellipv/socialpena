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
                            <h2 class="log-title">Número de Socio</h2>
                            @include('alerts.error')
                            @include('alerts.errorRegister')
                            <p>
                                Por favor ingresar el número de socio que aparece en el carnet.
                            </p>
                            <form method="post" action="{{ route('register.step3') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" id="input" required="required" name="number_member" />
                                    <label class="control-label" for="input">Número de Socio</label><i class="mtrl-select"></i>
                                </div>                                
                                <a href="{{ route('login') }}" title="" class="forgot-pwd">Ya tengo cuenta</a>
                                <div class="submit-btns">
                                    <button class="mtr-btn" type="submit"><span>Siguente Paso</span></button>
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
