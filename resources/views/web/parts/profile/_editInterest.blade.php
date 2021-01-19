@extends('layouts.main')

@section('cabecera')
    @include('web.parts._featurePhoto')
@endsection

@section('content')
    <div class="col-lg-6">
        <div class="central-meta">
            @include('alerts.error')
            <div class="editing-interest">
                <h5 class="f-title"><i class="ti-heart"></i>Mis Intereses</h5>
                {{--  <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti
                    atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate</p>  --}}
                <form method="post" action="{{ route('interest.update') }}">
                    @csrf
                    <label>Agregar Intereses: </label><br>
                    <input type="text" required="required" name="interest" style="width: 60%;" />

                    <button type="submit">Agregar</button>
                    <ol class="interest-added">
                        @forelse ($interestsUser as $interestUser)
                            <li><a href="#" title="">{{ $interestUser->interest }}</a><span class="remove" title="remove"><a href="{{ route('interest.delete', $interestUser) }}" title=""><i
                                        class="fa fa-close"></i></a></span></li>
                        @empty
                            <p>Sin Intereses</p>
                        @endforelse
                    </ol>
                    {{--  <div class="submit-btns">
                        <button type="button" class="mtr-btn"><span>Cancelar</span></button>
                        <button type="button" class="mtr-btn"><span>Actualizar</span></button>
                    </div>  --}}
                </form>
            </div>
        </div>
    </div>
@endsection