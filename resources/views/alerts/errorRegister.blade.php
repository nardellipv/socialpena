@if (Session::has('messageRegister'))
    <div class="alert alert-dismissible alert-warning">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <p class="mb-0">
        <h5 class="alert-heading">{!! Session::get('messageRegister') !!}</h5>
        <h6 style="color: blue;">Muchas Gracias!!!</h6>
        </p>
    </div>
@endif
