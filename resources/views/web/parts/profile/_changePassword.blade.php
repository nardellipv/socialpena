@extends('layouts.main')

@section('cabecera')
    @include('web.parts._featurePhoto')
@endsection

@section('content')
    <div class="col-lg-6">
        <div class="central-meta">
            <div class="editing-info">
                <h5 class="f-title"><i class="ti-lock"></i>Actualizar Contraseña</h5>

                <form method="post" action="{{ route('password.update') }}">
                    @csrf
                    <div class="form-group">
                        <input type="password" id="input" name="password" required="required" />
                        <label class="control-label" for="input">New password</label><i class="mtrl-select"></i>
                    </div>
                    
                    <div class="submit-btns">
                        <button type="submit" class="mtr-btn"><span>Actualizar</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
