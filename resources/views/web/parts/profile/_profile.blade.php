@extends('layouts.main')

@section('cabecera')
    @include('web.parts._featurePhoto')
@endsection

@section('content')
    <div class="col-lg-6">
        <div class="central-meta">
            <div class="about">
                <div class="personal">
                    <h5 class="f-title"><i class="ti-info-alt"></i> Información Personal</h5>
                    @if (!empty($user->profile->about))
                        <p>{{ $user->profile->about }}</p>
                    @else
                        <p><b>{{ $user->name }}</b> todavía no escribe en su perfil</p>
                    @endif
                </div>
                <div class="d-flex flex-row mt-2">
                    <ul class="nav nav-tabs nav-tabs--vertical nav-tabs--left">
                        <li class="nav-item">
                            <a href="#basic" class="nav-link active" data-toggle="tab">Info Básica</a>
                        </li>
                        <li class="nav-item">
                            <a href="#location" class="nav-link" data-toggle="tab">Ubicación</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="#work" class="nav-link" data-toggle="tab">Trabajo y educación</a>
                        </li> --}}
                        <li class="nav-item">
                            <a href="#interest" class="nav-link" data-toggle="tab">Intereses</a>
                        </li>
                        <li class="nav-item">
                            <a href="#writting" class="nav-link" data-toggle="tab">Escribirle</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="basic">
                            <ul class="basics">
                                <li><i class="ti-user"></i>{{ $user->name }}</li>
                                <li><i
                                        class="ti-map-alt"></i>{{ !empty($user->profile->province->name) ? $user->profile->province->name : $user->name . ' todavía no completa su ubicación' }}
                                </li>
                                <li><i
                                        class="ti-facebook"></i>{{ !empty($user->profile->facebook) ? $user->profile->facebook : '-' }}
                                </li>
                                <li><i
                                        class="ti-twitter"></i>{{ !empty($user->profile->twitter) ? $user->profile->twitter : '-' }}
                                </li>
                                <li><i
                                        class="ti-instagram"></i>{{ !empty($user->profile->instagram) ? $user->profile->instagram : '-' }}
                                </li>
                            </ul>
                        </div>

                        @if (!empty($user->profile->province->name))
                            <div class="tab-pane fade" id="location" role="tabpanel">
                                <div class="location-map">
                                    <iframe width="100%" height="450px" frameborder="0" style="border:0"
                                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyD7eUalpQrZ5TA9BrE5XgsudugZC7TIPYo
                                                        &q={{ $user->profile->region->name . $user->profile->province->name }}" allowfullscreen>
                                    </iframe>
                                </div>
                            </div>
                        @else
                            <div class="tab-pane fade" id="location" role="tabpanel">
                                <p style="text-align: center;"><b>{{ $user->name }}</b> todavía no completa su ubicación</p>
                            </div>
                        @endif
                        {{-- <div class="tab-pane fade" id="work" role="tabpanel">
                            <div>

                                <a href="#" title="">Envato</a>
                                <p>work as autohr in envato themeforest from 2013</p>
                                <ul class="education">
                                    <li><i class="ti-facebook"></i> BSCS from Oxford University</li>
                                    <li><i class="ti-twitter"></i> MSCS from Harvard Unversity</li>
                                </ul>
                            </div>
                        </div> --}}
                        <div class="tab-pane fade" id="interest" role="tabpanel">
                            <ul class="basics">

                                @forelse ($interests as $interest)
                                    <li>{{ $interest->interest }}</li>
                                @empty
                                    <li>Sin intereses todavía</li>
                                @endforelse

                            </ul>
                        </div>
                        <div class="tab-pane fade" id="writting" role="tabpanel">
                            <textarea name="message-socio" placeholder="{{ $user->name }} recibirá un email con tu mensaje"
                                rows="5"></textarea>
                            <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
