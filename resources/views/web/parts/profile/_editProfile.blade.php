@extends('layouts.main')

@section('cabecera')
    @include('web.parts._featurePhoto')
@endsection

@section('content')
    <div class="col-lg-6">
        <div class="central-meta">
            <div class="editing-info">
                <h5 class="f-title"><i class="ti-info-alt"></i> Editar Información</h5>
                @include('alerts.error')
                <form method="post" action="{{ route('profile.updateProfile', $user->id) }}">
                    @csrf
                    <input name="_method" type="hidden" value="PUT">

                    <div class="form-group">
                        <h5 class="sender-name">{{ $user->name }} </h5>
                    </div>
                    <div class="form-group half">
                        <input type="text" required="required" name="email" value="{{ $user->email }}" />
                        <label class="control-label" for="input">Email [no se mostrará tu email]</label><i
                            class="mtrl-select"></i>
                    </div>
                    <div class="form-group half">
                        <input type="text" name="nickname" value="{{ old('nickname', $user->nickname) }}" />
                        <label class="control-label" for="input">Apodo</label><i class="mtrl-select"></i>
                    </div>
                    <div class="form-group half">
                        <input type="text" required="required" name="dni" value="{{ old('dni', $user->dni) }}" />
                        <label class="control-label" for="input">D.N.I.</label><i class="mtrl-select"></i>
                    </div>
                    <div class="form-group half">
                        <input type="text" required="required" name="phone" value="{{ old('phone', $user->phone) }}" />
                        <label class="control-label" for="input">Teléfono</label><i class="mtrl-select"></i>
                    </div>

                    <div class="form-group half">
                        <input type="date" required="required" name="birth_date" value="{{ old('birth_date', $user->birth_date) }}" />
                        <label class="control-label" for="input">Fecha Nacimiento</label><i class="mtrl-select"></i>
                    </div>

                    <div class="form-group half">
                        <input type="text" required="required" name="number_member" value="{{ old('number_member', $user->number_member) }}" />
                        <label class="control-label" for="input">Número de Socio</label><i class="mtrl-select"></i>
                    </div>

                    <div class="form-group">
                        <select name="province_id" onchange="window.location.href=this.options[this.selectedIndex].value;">
                            @if (!empty($user->profile->province->name))
                                <option>{{ $user->profile->province->name }}</option>
                                <option disabled>---------------</option>
                            @else
                                <option>Elegir Provincia</option>
                                <option disabled>---------------</option>
                            @endif
                            @foreach ($provinces as $province)
                                <option
                                    value="{{ route('profile.updateProvince', ['provincia' => $province->id, 'usuario' => $user->profile_number]) }}">
                                    {{ $province->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    @if (!empty($regionUser))
                        <div class="form-group">
                            <select name="region_id" required="required">
                                @if (!empty($user->profile->region->name))
                                    <option value="{{ $user->profile->region->id }}">{{ $user->profile->region->name }}</option>
                                    <option disabled>---------------</option>
                                @else
                                    <option>Elegir Localidad</option>
                                    <option disabled>---------------</option>
                                @endif

                                @foreach ($regionUser as $region)
                                    <option value="{{ $region->id }}">{{ $region->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif

                    <div class="form-group">
                        @if (!empty($user->profile->about))
                            <textarea rows="4" id="textarea" name="about" required="required">{{old('about', $user->profile->about) }}</textarea>
                            <label class="control-label" for="textarea">Sobre Mí</label><i class="mtrl-select"></i>
                        @else
                            <textarea rows="4" id="textarea" name="about" required="required"></textarea>
                            <label class="control-label" for="textarea">Sobre Mí</label><i class="mtrl-select"></i>
                        @endif
                    </div>
                    <div class="submit-btns">
                        <button type="submit" class="mtr-btn"><span>Actualizar</span></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
