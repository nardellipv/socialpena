@extends('layouts.main')

@section('cabecera')
    @include('web.parts._featurePhoto')
@endsection

@section('content')
    <div class="col-lg-6">
        <div class="central-meta">
            <div class="editing-info">
                <h5 class="f-title"><i class="ti-sharethis"></i> Mis Redes</h5>
                @include('alerts.error')
                <form method="post" action="{{ route('social.update', $user->id) }}">
                    @csrf
                    <input name="_method" type="hidden" value="PUT">
                    <div class="form-group">
                        <input type="text" name="facebook" value="{{ empty($user->profile->facebook) ? '' : $user->profile->facebook }}" />
                        <label class="control-label" for="input"><i class="ti-facebook"></i> Facebook</label><i
                            class="mtrl-select"></i>
                    </div>
                    <div class="form-group">
                        <input type="text" name="instagram" value="{{ empty($user->profile->instagram) ? '' : $user->profile->instagram }}" />
                        <label class="control-label" for="input"><i class="ti-instagram"></i> Instagram</label><i
                            class="mtrl-select"></i>
                    </div>
                    <div class="form-group">
                        <input type="text" name="twitter" value="{{ empty($user->profile->twitter) ? '' : $user->profile->twitter }}" />
                        <label class="control-label" for="input"><i class="ti-twitter"></i> Twitter</label><i
                            class="mtrl-select"></i>
                    </div>
                    <div class="submit-btns">
                        <button type="submit" class="mtr-btn"><span>Actualizar</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
